<?php

namespace App\Http\Controllers;

use App\Models\Notice;

class NoticeController extends Controller
{
    public function index()
    {
        $notices = Notice::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('notices.index', compact('notices'));
    }

    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }
}
