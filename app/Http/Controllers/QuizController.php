<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::with('question')->orderBy('created_at', "DESC")->paginate(10);
        return view('admin.quiz.index', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Quiz::create($request->all());

        toast('New quiz has been created', 'success');
        return to_route('admin.quiz.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $quiz = Quiz::find($id);
        $quiz->update($request->all());

        toast('New quiz has been updated', 'success');
        return to_route('admin.quiz.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id);
        $quiz->delete();

        toast('New quiz has been deleted', 'success');
        return redirect()->back();
    }
}
