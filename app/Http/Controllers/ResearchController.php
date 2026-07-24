<?php

namespace App\Http\Controllers;

use App\Models\Research;

class ResearchController extends Controller
{
    public function index()
    {
        $research = Research::where('is_active', true)
            ->with('scientist')
            ->orderBy('year', 'desc')
            ->paginate(15);

        return view('research.index', compact('research'));
    }

    public function show(Research $research)
    {
        $research->load('scientist');
        return view('research.show', compact('research'));
    }
}
