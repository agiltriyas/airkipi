<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaticRequest;
use App\Models\About;
use App\Models\StaticContent;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::get();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        About::create($request->all());

        toast('New question has been created', 'success');
        return to_route('admin.about.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $about = About::findOrFail($id);

        return view('admin.about.show', compact('about'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $about = About::findOrFail($id);

        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $about = About::findOrFail($id);
        if ($request->file('imagelogo') !== null) {
            $imagelogo = $request->file('imagelogo')->storeAs(
                'image/landingpage',
                'logo-sejarahlokalsumut.' . $request->imagelogo->getClientOriginalExtension(),
                'public'
            );
            $request['image'] = $imagelogo;
        }
        $about->update($request->except('imagelogo'));
        toast('New question has been updated', 'success');
        return to_route('admin.about.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }

    public function static($name)
    {
        $staticContent = StaticContent::where('name', $name)->first();
        return view('admin.static.' . $name . '.edit', compact('staticContent'));
    }

    public function staticUpdate(StaticRequest $request, $id)
    {
        $staticContent = StaticContent::find($id);
        $staticContent->update($request->all());

        toast('Data static has been updated', 'success');
        return redirect()->back();
    }
}
