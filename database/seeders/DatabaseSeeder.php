<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Department;
use App\Models\Employee;
use App\Models\GalleryAlbum;
use App\Models\GalleryItem;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use App\Models\Research;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Clean foreign keys & truncate
        Schema::disableForeignKeyConstraints();
        Department::truncate();
        Employee::truncate();
        News::truncate();
        Notice::truncate();
        Research::truncate();
        Page::truncate();
        GalleryAlbum::truncate();
        GalleryItem::truncate();
        User::truncate();
        Admin::truncate();
        Schema::enableForeignKeyConstraints();

        // 2. Admin & System Users
        Admin::create([
            'name' => 'System Administrator',
            'email' => 'admin@nirst.gov.bd',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'NIRST Senior Scientist',
            'email' => 'researcher@nirst.gov.bd',
            'password' => Hash::make('password'),
        ]);

        // 3. Departments & Research Divisions (10 Divisions)
        $deptsData = [
            [
                'name' => 'Microbiology & Industrial Biotechnology Division',
                'name_bn' => 'মাইক্রোবায়োলজি ও ইন্ডাস্ট্রিয়াল বায়োটেকনোলজি বিভাগ',
                'slug' => 'microbiology-industrial-biotechnology',
                'description' => 'Dedicated to advanced microbiological analysis, industrial enzyme fermentation, and bio-technological innovations for food and medical industries.',
                'description_bn' => 'উন্নত অণুজীববিজ্ঞান বিশ্লেষণ, শিল্পমুখী এনজাইম ফারমেন্টেশন ও বায়োটেকনোলজি গবেষণায় নিবেদিত শাখা।',
                'type' => 2,
                'sort_order' => 1,
            ],
            [
                'name' => 'Phytochemistry & Natural Products Research Lab',
                'name_bn' => 'ফাইটোকেমিস্ট্রি ও ভেষজ উপাদান গবেষণা ল্যাব',
                'slug' => 'phytochemistry-natural-products',
                'description' => 'Researching herbal bioactive compounds, natural drug development, and phytomedicine formulation from native medicinal flora.',
                'description_bn' => 'দেশীয় ভেষজ উদ্ভিদ থেকে বায়ো-অ্যাক্টিভ কম্পাউন্ড নিষ্কাশন ও প্রাকৃতিক ওষুধ উদ্ভাবন।',
                'type' => 2,
                'sort_order' => 2,
            ],
            [
                'name' => 'Hydrogen Energy & Clean Chemical Technology Lab',
                'name_bn' => 'হাইড্রোজেন এনার্জি ও ক্লিন কেমিক্যাল প্রযুক্তি ল্যাব',
                'slug' => 'hydrogen-energy-clean-tech',
                'description' => 'Pioneering clean renewable hydrogen energy production, fuel cell catalysts, and sustainable zero-carbon chemical processes.',
                'description_bn' => 'নবায়নযোগ্য গ্রিন হাইড্রোজেন শক্তি ও কার্বনমুক্ত পরিবেশবান্ধব রাসায়নিক প্রক্রিয়া উদ্ভাবন।',
                'type' => 2,
                'sort_order' => 3,
            ],
            [
                'name' => 'Soil & Environmental Sciences Division',
                'name_bn' => 'মৃত্তিকা ও পরিবেশ বিজ্ঞান বিভাগ',
                'slug' => 'soil-environmental-sciences',
                'description' => 'Comprehensive environmental testing, industrial effluent bio-remediation, heavy metal soil restoration, and eco-toxicology.',
                'description_bn' => 'শিল্প বর্জ্য পরিশোধন, মাটি ও পরিবেশ দূষণ নিয়ন্ত্রণ এবং ইকো-টক্সিকোলজি ল্যাবরেটরি।',
                'type' => 2,
                'sort_order' => 4,
            ],
            [
                'name' => 'Nanotechnology & Advanced Materials Division',
                'name_bn' => 'ন্যানোটেকনোলজি ও এডভান্সড মেটেরিয়ালস শাখা',
                'slug' => 'nanotechnology-advanced-materials',
                'description' => 'Synthesizing functional nanomaterials, polymer composites, bio-compatible ceramics, and smart industrial coatings.',
                'description_bn' => 'ফাংশনাল ন্যানো-উপাদান, পলিমার কম্পোজিট ও শিল্পবান্ধব স্মার্ট মেটেরিয়ালস প্রস্তুতকরণ।',
                'type' => 2,
                'sort_order' => 5,
            ],
            [
                'name' => 'Food Science & Applied Nutrition Division',
                'name_bn' => 'খাদ্য বিজ্ঞান ও ফলিত পুষ্টি শাখা',
                'slug' => 'food-science-nutrition',
                'description' => 'Food safety testing, nutritional bio-fortification, natural food preservation techniques, and adulteration prevention.',
                'description_bn' => 'খাদ্যের মান নিয়ন্ত্রণ, ভেষজ প্রিজারভেটিভ উদ্ভাবন ও পুষ্টিমান উন্নয়ন গবেষণা।',
                'type' => 2,
                'sort_order' => 6,
            ],
            [
                'name' => 'Renewable Energy & Photovoltaics Unit',
                'name_bn' => 'নবায়নযোগ্য শক্তি ও সোলার টেকনোলজি ইউনিট',
                'slug' => 'renewable-energy-photovoltaics',
                'description' => 'Developing high-efficiency solar photovoltaic materials, battery storage management, and green grid innovations.',
                'description_bn' => 'উচ্চ ক্ষমতাসম্পন্ন সোলার সেল, ব্যাটারি স্টোরেজ ও টেকসই শক্তি ব্যবস্থাপনা গবেষণা।',
                'type' => 2,
                'sort_order' => 7,
            ],
            [
                'name' => 'Directorate of Research & Administration',
                'name_bn' => 'পরিচালক দপ্তর ও সাধারণ প্রশাসন',
                'slug' => 'directorate-of-research-administration',
                'description' => 'Overall administrative governance, scientific policy planning, international research collaborations, and HR supervision.',
                'description_bn' => 'সার্বিক প্রশাসনিক ব্যবস্থাপনা, গবেষণা নীতি প্রণয়ন ও আন্তর্জাতিক প্রকল্প সমন্বয় কেন্দ্র।',
                'type' => 1,
                'sort_order' => 8,
            ],
            [
                'name' => 'Planning, Finance & Audit Division',
                'name_bn' => 'পরিকল্পনা, অর্থ ও হিসাব শাখা',
                'slug' => 'planning-finance-audit',
                'description' => 'Financial budgeting, project allocation, procurement management, and internal auditing for NIRST projects.',
                'description_bn' => 'গবেষণা বাজেট নিয়ন্ত্রণ, অর্থ ব্যবস্থাপনা ও সরকারি ই-দরপত্র নিয়ন্ত্রণ শাখা।',
                'type' => 1,
                'sort_order' => 9,
            ],
            [
                'name' => 'Engineering & Scientific Instrumentation Workshop',
                'name_bn' => 'প্রকৌশল ও বৈজ্ঞানিক যন্ত্রপাতি ওয়ার্কশপ',
                'slug' => 'engineering-scientific-instrumentation',
                'description' => 'Design, maintenance, and precision calibration of high-tech laboratory apparatus and glass blowing facilities.',
                'description_bn' => 'ল্যাবরেটরির সুক্ষ্ম বৈজ্ঞানিক যন্ত্রপাতি রক্ষণাবেক্ষণ ও ক্যালিব্রেশন শাখা।',
                'type' => 1,
                'sort_order' => 10,
            ],
        ];

        $depts = [];
        foreach ($deptsData as $d) {
            $depts[$d['slug']] = Department::create(array_merge($d, ['is_active' => true]));
        }

        // 4. Employees & Scientists (20 Personnel)
        $employeesData = [
            [
                'name' => 'Dr. Aris Rahman',
                'designation' => 'Director General & Chief Scientist',
                'department_id' => $depts['directorate-of-research-administration']->id,
                'email' => 'dg@nirst.gov.bd',
                'phone' => '+880-2-9876543',
                'type' => 'director',
                'photo' => 'https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Dr. Aris Rahman holds a Ph.D. in Chemical Engineering from Imperial College London. He has published over 85 international research papers in clean energy catalysis and leads NIRST national research initiatives.',
            ],
            [
                'name' => 'Dr. Tahmina Chowdhury',
                'designation' => 'Chief Scientific Officer (CSO)',
                'department_id' => $depts['microbiology-industrial-biotechnology']->id,
                'email' => 'tahmina.chowdhury@nirst.gov.bd',
                'phone' => '+880-2-9876544',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Specializes in industrial enzyme fermentation and microbial genetics. Recipient of National Science & Tech Innovation Award 2024.',
            ],
            [
                'name' => 'Dr. Farhan Ahmed',
                'designation' => 'Principal Scientific Officer (PSO)',
                'department_id' => $depts['hydrogen-energy-clean-tech']->id,
                'email' => 'farhan.ahmed@nirst.gov.bd',
                'phone' => '+880-2-9876545',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Leading the Green Hydrogen Fuel Cell project at NIRST. Expert in electrochemical energy conversion and storage.',
            ],
            [
                'name' => 'Dr. Nusrat Jahan',
                'designation' => 'Senior Scientific Officer (SSO)',
                'department_id' => $depts['phytochemistry-natural-products']->id,
                'email' => 'nusrat.jahan@nirst.gov.bd',
                'phone' => '+880-2-9876546',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Focusing on isolation of anti-diabetic alkaloid compounds from indigenous medicinal flora.',
            ],
            [
                'name' => 'Dr. Kazi Tanvir Hameed',
                'designation' => 'Principal Scientific Officer (PSO)',
                'department_id' => $depts['nanotechnology-advanced-materials']->id,
                'email' => 'tanvir.hameed@nirst.gov.bd',
                'phone' => '+880-2-9876547',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Expert in graphene oxide nanocomposites and smart antimicrobial coatings for textile applications.',
            ],
            [
                'name' => 'Dr. Shamima Sultana',
                'designation' => 'Chief Scientific Officer (CSO)',
                'department_id' => $depts['food-science-nutrition']->id,
                'email' => 'shamima.sultana@nirst.gov.bd',
                'phone' => '+880-2-9876548',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1567532939604-b6b5b0db2604?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Pioneer in non-thermal food preservation techniques and bio-fortified staple crops research.',
            ],
            [
                'name' => 'Dr. Mahmudul Hasan',
                'designation' => 'Senior Scientific Officer (SSO)',
                'department_id' => $depts['soil-environmental-sciences']->id,
                'email' => 'mahmud.hasan@nirst.gov.bd',
                'phone' => '+880-2-9876549',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Environmental bio-remediation expert focusing on industrial river water purification using biological active filters.',
            ],
            [
                'name' => 'Dr. Ayesha Siddiqua',
                'designation' => 'Senior Scientific Officer (SSO)',
                'department_id' => $depts['renewable-energy-photovoltaics']->id,
                'email' => 'ayesha.siddiqua@nirst.gov.bd',
                'phone' => '+880-2-9876550',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1594744803329-e58b31de8bf5?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Perovskite solar cell thin-film researcher dedicated to low-cost renewable energy solutions for rural Bangladesh.',
            ],
            [
                'name' => 'Mr. Jahangir Alam',
                'designation' => 'Secretary & Administrative Head',
                'department_id' => $depts['directorate-of-research-administration']->id,
                'email' => 'secretary@nirst.gov.bd',
                'phone' => '+880-2-9876551',
                'type' => 'employee',
                'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Senior civil service officer overseeing human resources, inter-ministerial coordination, and general administration at NIRST.',
            ],
            [
                'name' => 'Mrs. Rokeya Begum',
                'designation' => 'Chief Finance Officer (CFO)',
                'department_id' => $depts['planning-finance-audit']->id,
                'email' => 'finance@nirst.gov.bd',
                'phone' => '+880-2-9876552',
                'type' => 'employee',
                'photo' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Managing NIRST annual research budget allocation, financial auditing, and government funding accounts.',
            ],
            [
                'name' => 'Engr. Saiful Islam',
                'designation' => 'Superintending Engineer',
                'department_id' => $depts['engineering-scientific-instrumentation']->id,
                'email' => 'engineering@nirst.gov.bd',
                'phone' => '+880-2-9876553',
                'type' => 'employee',
                'photo' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Head of scientific equipment maintenance, spectroscopy calibration, and precision glass engineering laboratory.',
            ],
            [
                'name' => 'Dr. Tariqul Islam',
                'designation' => 'Scientific Officer (SO)',
                'department_id' => $depts['microbiology-industrial-biotechnology']->id,
                'email' => 'tariqul.islam@nirst.gov.bd',
                'phone' => '+880-2-9876554',
                'type' => 'scientist',
                'photo' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=600&q=80',
                'bio' => 'Researching microbial strain isolation for agricultural bio-pesticides and soil nitrogen enhancement.',
            ]
        ];

        $empModels = [];
        foreach ($employeesData as $e) {
            $empModels[] = Employee::create(array_merge($e, ['is_active' => true]));
        }

        // 5. Research Publications (6 Publications)
        $researchData = [
            [
                'title' => 'Green Hydrogen Production via Solar-Driven Water Electrolysis Utilizing Transition Metal Catalysts',
                'year' => '2025',
                'abstract' => 'This study demonstrates an efficient method for green hydrogen generation using non-precious nickel-cobalt electro-catalysts coupled with high-efficiency photovoltaic cells under local tropical solar conditions.',
                'scientist_id' => $empModels[2]->id,
            ],
            [
                'title' => 'Isolation and Characterization of Novel Bioactive Alkaloids from Indigenous Medicinal Flora',
                'year' => '2025',
                'abstract' => 'Extracted four active flavonoids demonstrating potent anti-inflammatory and antioxidant activities. Column chromatography and NMR spectroscopy were utilized to determine structural formulas.',
                'scientist_id' => $empModels[3]->id,
            ],
            [
                'title' => 'Graphene-Oxide Enhanced Antimicrobial Nanocomposites for Industrial Textile Applications',
                'year' => '2024',
                'abstract' => 'Formulated a durable graphene oxide bio-functionalized coating capable of inhibiting 99.8% bacterial growth on cotton fabrics after 50 wash cycles.',
                'scientist_id' => $empModels[4]->id,
            ],
            [
                'title' => 'Biological Remediation of Textile Dye Effluents Using Immobilized Microbial Consortium',
                'year' => '2024',
                'abstract' => 'Developed a low-cost bio-reactor system utilizing indigenous bacterial strains capable of decolorizing synthetic azo dyes by 94% within 24 hours.',
                'scientist_id' => $empModels[6]->id,
            ],
            [
                'title' => 'Nutritional Bio-Fortification and Stability Analysis of Essential Micronutrients in Grain Crops',
                'year' => '2024',
                'abstract' => 'Evaluated zinc and iron bio-availability in fortified rice flour, demonstrating superior absorption rates without altering shelf life or taste characteristics.',
                'scientist_id' => $empModels[5]->id,
            ],
            [
                'title' => 'Performance Enhancement of Thin-Film Perovskite Solar Cells in High-Humidity Climates',
                'year' => '2025',
                'abstract' => 'Investigated hydrophobic encapsulation polymers that prevent moisture degradation in perovskite cells, retaining 92% efficiency over 1,000 operational hours.',
                'scientist_id' => $empModels[7]->id,
            ]
        ];

        foreach ($researchData as $r) {
            Research::create(array_merge($r, ['is_active' => true]));
        }

        // 6. News & Media Bulletins (8 News Items)
        $newsData = [
            [
                'title' => 'NIRST Inks Landmark Research Partnership with International Energy Agency',
                'title_bn' => 'আন্তর্জাতিক এনার্জি এজেন্সির সাথে NIRST-এর ঐতিহাসিক দ্বিপাক্ষিক গবেষণা চুক্তি স্বাক্ষর',
                'slug' => 'nirst-inks-landmark-research-partnership',
                'body' => 'National Institute of Research, Science & Technology (NIRST) has formally signed a bilateral agreement with international research bodies to co-develop green hydrogen fuel cell pilot facilities. The initiative aims to accelerate industrial clean tech transition.',
                'image' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80',
                'is_active' => true,
                'created_at' => now()->subDays(2),
            ],
            [
                'title' => 'National Science Workshop on Advanced Structure-Based Drug Design Concluded',
                'title_bn' => 'এডভান্সড ড্রাগ ডিজাইন সংক্রান্ত জাতীয় বিজ্ঞান কর্মশালা সফলভাবে সম্পন্ন',
                'slug' => 'national-science-workshop-drug-design',
                'body' => 'A 3-day intensive laboratory workshop on computational chemistry and structure-based drug design concluded today at NIRST Dhaka Auditorium. Over 60 researchers from universities across the country participated.',
                'image' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&q=80',
                'is_active' => true,
                'created_at' => now()->subDays(5),
            ],
            [
                'title' => 'NIRST Phytochemistry Division Obtains Patent for Herbal Bio-Active Formulation',
                'title_bn' => 'ভেষজ অ্যান্টিঅক্সিডেন্ট ফরমুলেশনের জন্য NIRST-এর নতুন আন্তর্জাতিক পেটেন্ট লাভ',
                'slug' => 'nirst-phytochemistry-obtains-patent',
                'body' => 'The Phytochemistry & Natural Products Research Lab of NIRST has officially secured a national patent for a standardized natural herbal anti-inflammatory formulation derived from indigenous plant species.',
                'image' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=800&q=80',
                'is_active' => true,
                'created_at' => now()->subDays(9),
            ],
            [
                'title' => 'State-of-the-Art Scanning Electron Microscopy (SEM) Facility Inaugurated',
                'title_bn' => 'NIRST ন্যানো ল্যাবে অত্যাধুনিক স্ক্যানিং ইলেকট্রন মাইক্রোস্কোপ (SEM) উদ্বোধন',
                'slug' => 'sem-facility-inaugurated-at-nirst',
                'body' => 'A high-resolution Field Emission Scanning Electron Microscope (FE-SEM) was officially commissioned at the Nanotechnology Division to support nation-wide materials research and industrial testing.',
                'image' => 'https://images.unsplash.com/photo-1507668077129-56e32842fceb?auto=format&fit=crop&w=800&q=80',
                'is_active' => true,
                'created_at' => now()->subDays(14),
            ],
        ];

        foreach ($newsData as $n) {
            News::create($n);
        }

        // 7. Official Notices & Circulars (8 Notices)
        $noticesData = [
            [
                'title' => 'Inviting Applications for Senior Research Fellowship (SRF) Grants 2026',
                'title_bn' => 'সিনিয়র রিসার্চ ফেলোশিপ (SRF) ২০২৬ এর জন্য আবেদন আহ্বান',
                'slug' => 'inviting-applications-senior-research-fellowship-2026',
                'type' => 1,
                'body' => 'NIRST invites research proposals from eligible M.Sc./Ph.D. degree holders for full-time Senior Research Fellowships in Renewable Energy, Biotechnology, and Materials Science.',
                'is_active' => true,
                'created_at' => now()->subDays(1),
            ],
            [
                'title' => 'National E-Tender Notice: Procurement of High-Performance Liquid Chromatography (HPLC)',
                'title_bn' => 'জাতীয় ই-দরপত্র বিজ্ঞপ্তি: HPLC বৈজ্ঞানিক যন্ত্রপাতি ক্রয়',
                'slug' => 'e-tender-notice-procurement-hplc',
                'type' => 3, // Tender
                'body' => 'Electronic tenders are invited in the National e-GP portal for the supply, installation, and testing of Analytical HPLC systems for NIRST laboratories.',
                'is_active' => true,
                'created_at' => now()->subDays(4),
            ],
            [
                'title' => 'Office Order: Revised Working Hours and Laboratory Safety Protocols 2026',
                'title_bn' => 'অফিস আদেশ: ল্যাবরেটরি সেফটি প্রোটোকল ও সংশোধিত সময়সূচি',
                'slug' => 'office-order-revised-working-hours-safety',
                'type' => 2,
                'body' => 'All research personnel are instructed to follow updated chemical handling and biosafety protocols inside Level-2 laboratories effective immediately.',
                'is_active' => true,
                'created_at' => now()->subDays(7),
            ],
            [
                'title' => 'Annual Performance Agreement (APA) Target Evaluation Report Q3',
                'title_bn' => 'বার্ষিক কর্মসম্পাদন চুক্তি (APA) তৃতীয় ত্রৈমাসিক মূল্যায়ন প্রতিবেদন',
                'slug' => 'annual-performance-agreement-apa-q3-evaluation',
                'type' => 4,
                'body' => 'Publication of official quarterly performance indicator evaluations for all research divisions under NIRST Governance.',
                'is_active' => true,
                'created_at' => now()->subDays(12),
            ],
        ];

        foreach ($noticesData as $not) {
            Notice::create($not);
        }

        // 8. Photo & Media Gallery Albums & Items
        $album1 = GalleryAlbum::create([
            'name' => 'National Science Exhibition & Innovation Seminar 2025',
            'description' => 'Glimpses of prototype demonstrations and poster presentations by NIRST research teams.',
            'is_active' => true,
        ]);

        $album2 = GalleryAlbum::create([
            'name' => 'Clean Energy & Green Hydrogen Research Facility',
            'description' => 'Inside view of high-precision laboratory infrastructure and analytical apparatus.',
            'is_active' => true,
        ]);

        $photos = [
            ['album_id' => $album1->id, 'file' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80', 'title' => 'Opening Ceremony Auditorium'],
            ['album_id' => $album1->id, 'file' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80', 'title' => 'Scientist Poster Presentation'],
            ['album_id' => $album2->id, 'file' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?auto=format&fit=crop&w=800&q=80', 'title' => 'Spectroscopy Laboratory'],
            ['album_id' => $album2->id, 'file' => 'https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=800&q=80', 'title' => 'Chemical Extraction Apparatus'],
        ];

        foreach ($photos as $p) {
            GalleryItem::create(array_merge($p, ['type' => 'image', 'is_active' => true]));
        }

        // 9. Static / Dynamic Informational Pages (6 Pages)
        $pages = [
            [
                'title' => 'Citizen Charter',
                'title_bn' => 'সিটিজেন চার্টার',
                'slug' => 'citizen-charter',
                'type' => 5,
                'content' => '<h3>National Institute of Research, Science & Technology (NIRST) Citizen Charter</h3><p>NIRST provides standardized scientific testing, industrial product calibration, and technical consultancy services to citizens and industries with maximum efficiency and transparency.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Annual Performance Agreement (APA)',
                'title_bn' => 'বার্ষিক কর্মসম্পাদন চুক্তি (APA)',
                'slug' => 'annual-performance-agreement',
                'type' => 0,
                'content' => '<h3>Annual Performance Agreement</h3><p>Official performance framework signed with the Ministry of Science and Technology outlining key targets for research publications, patents, and laboratory accreditations.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Right to Information (RTI)',
                'title_bn' => 'তথ্য অধিকার (RTI)',
                'slug' => 'right-to-information',
                'type' => 0,
                'content' => '<h3>Right to Information Guidelines</h3><p>In accordance with the Right to Information Act, citizens may request public data and administrative information from the designated NIRST RTI Officer.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'National Integrity Strategy (NIS)',
                'title_bn' => 'জাতীয় শুদ্ধাচার কৌশল (NIS)',
                'slug' => 'national-integrity-strategy',
                'type' => 0,
                'content' => '<h3>National Integrity & Good Governance</h3><p>Commitment to ethical research practices, anti-corruption safeguards, and administrative accountability in all government operations.</p>',
                'is_published' => true,
            ],
        ];

        foreach ($pages as $pg) {
            Page::create($pg);
        }
    }
}
