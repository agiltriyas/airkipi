<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Comment;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->title) {
            $contents = Content::where('title', 'like', '%' . $request->title . '%')->paginate(10);
        } elseif ($request->kategori) {
            $contents = Content::where('kategori', 'like', '%' . $request->kategori . '%')->paginate(10);
        } else {
            $contents = Content::orderBy('created_at', 'DESC')->paginate(10);
        }
        // dd($request->all(), $contents);

        return view('admin.activities.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentRequest $request)
    {
        $request['tagtitle'] = $request->title;
        $request['slug'] = Str::slug($request->title);
        $request['tagtype'] = 'article';
        $request['tagdescription'] = strip_tags($request->content);
        $request['tagurl'] = url()->current();
        $request['tagsitename'] = "airkipi.com/" . Str::slug($request->title);
        $thumbnail = $request->file('thumb')->storeAs(
            'image/activities/' . $request['slug'],
            $request['slug'] . '-thumb.' . $request->thumb->getClientOriginalExtension(),
            'public'
        );
        $headerimage = $request->file('image')->storeAs(
            'image/activities/' . $request['slug'],
            $request['slug'] . '-image.' . $request->image->getClientOriginalExtension(),
            'public'
        );
        $request['thumbnail'] = $thumbnail;
        $request['headerimage'] = $headerimage;
        $request['tagimage'] = explode('/', $headerimage)[3];
        $request['user_id'] = auth()->user()->id;
        // dd($request->all(), $thumbnail, $headerimage);
        $content = Content::create($request->except('thumb', 'image'));

        toast('New content has been created', 'success');
        return to_route('admin.activities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::with('content')->where('content_id', $id)->paginate(10);

        return view('admin.comment.index', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $content = Content::findOrFail($id);

        return view('admin.activities.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentRequest $request, string $id)
    {
        $content = Content::findOrFail($id);
        $request['tagtitle'] = $request->title;
        $request['slug'] = Str::slug($request->title);
        $request['tagtype'] = 'article';
        $request['tagdescription'] = substr(strip_tags($request->content), 0, 200);
        $request['tagurl'] = url()->current();
        $request['tagsitename'] = "airkipi.com/" . Str::slug($request->title);
        if ($request->file('thumb') !== null) {
            $thumbnail = $request->file('thumb')->storeAs(
                'image/activities/' . $request['slug'],
                $request['slug'] . '-thumb.' . $request->thumb->getClientOriginalExtension(),
                'public'
            );
            $request['thumbnail'] = $thumbnail;
        }
        if ($request->file('image') !== null) {
            $headerimage = $request->file('image')->storeAs(
                'image/activities/' . $request['slug'],
                $request['slug'] . '-image.' . $request->image->getClientOriginalExtension(),
                'public'
            );
            $request['headerimage'] = $headerimage;
            $request['tagimage'] = explode('/', $headerimage)[3];
        }
        $request['user_id'] = auth()->user()->id;
        // dd($request->all(), $thumbnail, $headerimage);
        $content->update($request->except('thumb', 'image'));

        toast('New content has been updated', 'success');
        return to_route('admin.activities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::findOrFail($id);
        $content->delete();

        toast('New content has been deleted', 'success');
        return to_route('admin.activities.index');
    }

    public function destroyComment(string $id)
    {

        $comment = comment::findOrFail($id);
        $comment->delete();

        toast('New comment has been deleted', 'success');
        return redirect()->back();
    }

    public function uploadfile(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('storage/image/activities/uploadeditor'), $fileName);

            $url = url('storage/image/activities/uploadeditor/' . $fileName);
            $msg = 'Image uploaded successfully';
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
