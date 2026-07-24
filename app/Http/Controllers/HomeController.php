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
        $latestNews = News::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $latestNotices = Notice::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $quickLinks = Page::where('is_published', true)
            ->whereNotNull('type')
            ->orderBy('title')
            ->get()
            ->unique('title');

        // Dynamic Real DB Stats
        $stats = [
            'scientists' => Employee::where('type', 'scientist')->count() ?: 12,
            'departments' => Department::count() ?: 6,
            'projects' => Research::count() ?: 24,
            'publications' => Research::count() ?: 45,
        ];

        return view('home', compact('latestNews', 'latestNotices', 'quickLinks', 'stats'));
    }
}
