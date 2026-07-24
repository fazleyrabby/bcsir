<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Department;
use App\Models\Employee;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Research;
use App\Models\VisitorCount;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImportLegacyData extends Command
{
    protected $signature = 'import:legacy';
    protected $description = 'Import data from legacy (old_*) tables into the new schema';

    protected array $deptIdMap = [];
    protected array $designationCache = [];

    public function handle(): int
    {
        $this->info('Importing legacy data...');

        $this->importDepartments();
        $this->importEmployees();
        $this->importNews();
        $this->importNotices();
        $this->importResearch();
        $this->importGallery();
        $this->importPages();
        $this->importVisitors();
        $this->importAdmins();

        $this->info('All data imported successfully!');
        return Command::SUCCESS;
    }

    protected function importDepartments(): void
    {
        $this->info('Importing departments...');
        $rows = DB::table('old_departments')->where('department_st', 1)->get();
        $index = 0;
        foreach ($rows as $row) {
            $baseSlug = Str::slug($row->department_name ?? 'unnamed');
            $slug = $baseSlug;
            while (Department::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . (++$index);
            }
            $dept = Department::create([
                'name' => $row->department_name ?? 'Unnamed',
                'slug' => $slug,
                'description' => null,
                'sort_order' => $row->serial ?? 0,
                'type' => $row->type,
                'is_active' => true,
            ]);
            $this->deptIdMap[$row->id] = $dept->id;
        }
        $this->info('  -> ' . $rows->count() . ' departments imported');
    }

    protected function importEmployees(): void
    {
        $this->info('Importing employees...');
        $typeMap = [
            1 => 'employee',
            2 => 'scientist',
            3 => 'director',
        ];
        $rows = DB::table('old_employees')->where('employee_st', 1)->get();
        foreach ($rows as $row) {
            $oldDeptId = $row->employee_department;
            $newDeptId = $oldDeptId ? ($this->deptIdMap[$oldDeptId] ?? null) : null;
            Employee::create([
                'name' => $row->employee_name ?? 'Unnamed',
                'designation' => $this->getDesignationName($row->designation),
                'department_id' => $newDeptId,
                'photo' => $row->images,
                'email' => $row->email,
                'phone' => $row->contact_no,
                'bio' => $row->employee_details_other,
                'cv_file' => $row->cv_file,
                'type' => $typeMap[$row->employee_type] ?? 'employee',
                'sort_order' => $row->employee_serial ?? 0,
                'is_active' => true,
            ]);
        }
        $this->info('  -> ' . $rows->count() . ' employees imported');
    }

    protected function importNews(): void
    {
        $this->info('Importing news...');
        $rows = DB::table('old_news')->where('news_st', 1)->get();
        foreach ($rows as $row) {
            $title = mb_substr($row->news_title ?? 'Untitled', 0, 950);
            $baseSlug = Str::slug(mb_substr($title, 0, 200));
            $slug = $baseSlug;
            $counter = 0;
            while (News::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . (++$counter);
            }
            News::create([
                'title' => $title,
                'slug' => $slug,
                'body' => $row->news_des,
                'image' => $row->image,
                'category_id' => null,
                'published_at' => $row->created_at,
                'is_active' => true,
                'added_by' => $row->add_by ?? 'legacy',
            ]);
        }
        $this->info('  -> ' . $rows->count() . ' news imported');
    }

    protected function importNotices(): void
    {
        $this->info('Importing notices...');
        $rows = DB::table('old_notice')->get();
        foreach ($rows as $row) {
            $title = mb_substr($row->notice_title ?? 'Untitled', 0, 950);
            $baseSlug = Str::slug(mb_substr($title, 0, 200));
            $slug = $baseSlug;
            $counter = 0;
            while (Notice::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . (++$counter);
            }
            Notice::create([
                'title' => $title,
                'slug' => $slug,
                'body' => $row->notice_des,
                'file' => $row->media_file,
                'type' => $row->type,
                'is_active' => true,
                'added_by' => $row->add_by ?? 'legacy',
            ]);
        }
        $this->info('  -> ' . $rows->count() . ' notices imported');
    }

    protected function importResearch(): void
    {
        $this->info('Importing research...');
        $rows = DB::table('old_research')->where('research_st', 1)->get();
        foreach ($rows as $row) {
            Research::create([
                'title' => $row->research_name ?? 'Untitled',
                'scientist_id' => $row->employee_details_id ?: null,
                'abstract' => $row->research_details,
                'file' => $row->research_media ?? $row->other_files,
                'year' => $row->publish_date ? date('Y', strtotime($row->publish_date)) : null,
                'is_active' => true,
            ]);
        }
        $this->info('  -> ' . $rows->count() . ' research imported');
    }

    protected function importGallery(): void
    {
        $this->info('Importing gallery...');
        // Create a default album
        $album = GalleryAlbum::create([
            'name' => 'General Gallery',
            'description' => 'Imported from legacy gallery',
            'is_active' => true,
        ]);

        $rows = DB::table('old_gallery')->where('gallery_st', 1)->get();
        foreach ($rows as $row) {
            GalleryItem::create([
                'album_id' => $album->id,
                'title' => null,
                'file' => $row->gallery_file,
                'type' => $row->gallery_type == 2 ? 'video' : 'image',
                'is_active' => true,
                'added_by' => $row->add_by ?? 'legacy',
            ]);
        }
        $this->info('  -> ' . $rows->count() . ' gallery items imported');
    }

    protected function importPages(): void
    {
        $this->info('Importing pages...');
        $rows = DB::table('old_pages')->where('content_st', 1)->get();
        foreach ($rows as $row) {
            $title = mb_substr($row->content_title ?? 'Untitled', 0, 950);
            $baseSlug = Str::slug(mb_substr($title, 0, 200));
            $slug = $baseSlug;
            $counter = 0;
            while (Page::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . (++$counter);
            }
            Page::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $row->content_des,
                'type' => $row->content_type,
                'is_published' => true,
                'added_by' => $row->add_by ?? 'legacy',
            ]);
        }
        $this->info('  -> ' . $rows->count() . ' pages imported');
    }

    protected function importVisitors(): void
    {
        $this->info('Importing visitor counts...');
        $row = DB::table('counter')->first();
        if ($row) {
            // Store as a single aggregate visitor count record
            VisitorCount::create([
                'ip' => 'legacy',
                'page' => '/',
                'user_agent' => 'legacy-import',
                'visited_at' => now()->subYear(),
            ]);
        }
        $this->info('  -> visitor aggregate imported');
    }

    protected function importAdmins(): void
    {
        $this->info('Importing admins...');
        $rows = DB::table('old_admins')->get();
        $index = 0;
        foreach ($rows as $row) {
            $baseEmail = ($row->username ?? 'admin') . '@bcsir.gov.bd';
            $email = $baseEmail;
            $counter = 0;
            while (Admin::where('email', $email)->exists()) {
                $email = str_replace('@', (++$counter) . '@', $baseEmail);
            }
            Admin::create([
                'name' => trim(($row->firstname ?? '') . ' ' . ($row->lastname ?? '')),
                'email' => $email,
                'password' => $row->password ?? bcrypt('password'),
                'role' => 'admin',
                'photo' => $row->photo ?? null,
            ]);
        }
        $this->info('  -> ' . $rows->count() . ' admins imported');
    }

    protected function getDesignationName($id): ?string
    {
        static $designations = [];
        if (empty($designations)) {
            try {
                $rows = DB::table('all_designation')->get();
                foreach ($rows as $row) {
                    $designations[$row->id] = $row->designation_name ?? '';
                }
            } catch (\Exception $e) {
                return null;
            }
        }
        return $designations[$id] ?? null;
    }
}
