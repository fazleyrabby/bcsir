<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Department;
use App\Models\Employee;
use App\Models\News;
use App\Models\Notice;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'departments' => Department::count(),
            'employees' => Employee::count(),
            'news' => News::count(),
            'notices' => Notice::count(),
            'messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $recentNews = News::latest()->take(5)->get();
        $recentMessages = ContactMessage::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentNews', 'recentMessages'));
    }
}
