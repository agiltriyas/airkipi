<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\SectionContent;
use Illuminate\Http\Request;

class SectionContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($content)
    {
        $sections = Section::with('sectionContent')->where('name', $content)->first();
        $sectionContents = $sections->sectionContent()->paginate(10);
        return view('admin.section-content.index', compact('sectionContents', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::get();

        return view('admin.section-content.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'section_id' => 'required',
            'name' => 'required',
            'value' => 'required_if:name,title,subtitle,text,feature,icon',
            'image' => 'required_if:name,image,background',
        ]);

        if ($request->file('image') !== null) {

            if ($request->name == "image") {
                $filename = $request['name'] . time() . '.' . $request->image->getClientOriginalExtension();
            } else {
                $filename = $request['name'] . '.' . $request->image->getClientOriginalExtension();
            }

            $image = $request->file('image')->storeAs(
                'image/content/' . $request['section_name'],
                $filename,
                'public'
            );
            $request['value'] = $image;
        }
        // dd($request->all());
        SectionContent::create($request->except('section_name', 'image'));

        toast('New section content has been created', 'success');
        return to_route('admin.section-content.content', $request->section_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sections = Section::get();
        $sectionContent = SectionContent::with('section')->find($id);

        return view('admin.section-content.edit', compact('sections', 'sectionContent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'section_id' => 'required',
            'name' => 'required',
            'value' => 'required_if:name,title,subtitle,text,feature,icon',
        ]);

        if ($request->file('image') !== null) {
            $request->validate([
                'image' => 'required_if:name,image,background',
            ]);

            if ($request->name == "image") {
                $filename = $request['name'] . time() . '.' . $request->image->getClientOriginalExtension();
            } else {
                $filename = $request['name'] . '.' . $request->image->getClientOriginalExtension();
            }

            $image = $request->file('image')->storeAs(
                'image/content/' . $request['section_name'],
                $filename,
                'public'
            );
            $request['value'] = $image;
        }
        // dd($request->all());
        $sectionContent = SectionContent::find($id);
        $sectionContent->update($request->except('section_name', 'image'));

        toast('New section content has been updated', 'success');
        return to_route('admin.section-content.content', $request->section_name);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sectionContent = SectionContent::find($id);
        $sectionContent->delete();

        toast('New section content has been deleted', 'success');
        return redirect()->back();
    }
}
