<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\ContentRequest;
use App\Models\Comment;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $contents = Content::title('title', $request->search)->where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $contents = Content::orderBy('created_at', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);
        }

        return view('user.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.content.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentRequest $request)
    {
        $request['tagtitle'] = $request->title;
        $request['slug'] = Str::slug($request->kategori) . "/" . Str::slug($request->title);
        $request['tagtype'] = 'article';
        $request['tagdescription'] = strip_tags($request->content);
        $request['tagurl'] = url()->current();
        $request['tagsitename'] = "sejarahlokalsumut.org/" . Str::slug($request->title);
        $thumbnail = $request->file('thumb')->storeAs(
            'image/content/' . $request['slug'],
            $request['slug'] . '-thumb.' . $request->thumb->getClientOriginalExtension(),
            'public'
        );
        $headerimage = $request->file('image')->storeAs(
            'image/content/' . $request['slug'],
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
        return to_route('user.content.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::with('content')->where('user_id', auth()->user()->id)->where('content_id', $id)->paginate(10);

        return view('user.comment.index', compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $content = Content::where('user_id', auth()->user()->id)->findOrFail($id);

        return view('user.content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentRequest $request, string $id)
    {
        $content = Content::where('user_id', auth()->user()->id)->findOrFail($id);
        $request['tagtitle'] = $request->title;
        $request['slug'] = Str::slug($request->kategori) . '/' . Str::slug($request->title);
        $request['tagtype'] = 'article';
        $request['tagdescription'] = substr(strip_tags($request->content), 0, 200);
        $request['tagurl'] = url()->current();
        $request['tagsitename'] = "sejarahlokalsumut.org/" . Str::slug($request->title);
        if ($request->file('thumb') !== null) {
            $thumbnail = $request->file('thumb')->storeAs(
                'image/content/' . $request['slug'],
                $request['slug'] . '-thumb.' . $request->thumb->getClientOriginalExtension(),
                'public'
            );
            $request['thumbnail'] = $thumbnail;
        }
        if ($request->file('image') !== null) {
            $headerimage = $request->file('image')->storeAs(
                'image/content/' . $request['slug'],
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
        return to_route('user.content.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::where('user_id', auth()->user()->id)->findOrFail($id);
        $content->delete();

        toast('New content has been deleted', 'success');
        return to_route('user.content.index');
    }

    public function destroyComment(string $id)
    {

        $comment = comment::findOrFail($id);
        $comment->delete();

        toast('New comment has been deleted', 'success');
        return redirect()->back();
    }
}
