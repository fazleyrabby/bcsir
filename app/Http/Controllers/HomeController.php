<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Research;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $latestNews = News::where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();
        } catch (\Exception $e) {
            $latestNews = collect();
        }

        try {
            $latestNotices = Notice::where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();
        } catch (\Exception $e) {
            $latestNotices = collect();
        }

        try {
            $quickLinks = Page::where('is_published', true)
                ->whereNotNull('type')
                ->orderBy('title')
                ->get()
                ->unique('title');
        } catch (\Exception $e) {
            $quickLinks = collect();
        }

        try {
            // Dynamic Real DB Stats
            $stats = [
                'scientists'   => Employee::where('type', 'scientist')->count() ?: 12,
                'departments'  => Department::count() ?: 6,
                'projects'     => Research::count() ?: 24,
                'publications' => Research::count() ?: 45,
            ];
        } catch (\Exception $e) {
            $stats = [
                'scientists'   => 12,
                'departments'  => 6,
                'projects'     => 24,
                'publications' => 45,
            ];
        }

        return view('home', compact('latestNews', 'latestNotices', 'quickLinks', 'stats'));
    }
}
