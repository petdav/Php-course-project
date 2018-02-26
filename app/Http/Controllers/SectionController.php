<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller{
	public function index()
    {
        $posts = Section::all();
        return view('section.index', compact('sections'));
    }
    public function show(Section $section)
    {
        return view('section.show', compact('section'));
    }
    public function create()
    {
        return view('section.create');
    }
    public function save(SectionFormRequest $request)
    {
        $request->persist();
        return back()->with('status', 'Section was created');
    }
}