<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $quiz = Quiz::find($id);
        $questions = Question::where('quiz_id', $id)->with(['answer' => function ($q) {
            $q->where('is_true', 1);
        }], 'quiz')->orderBy('created_at', 'DESC')->paginate(10);
        // dd($quiz);
        return view('admin.question.index', compact('questions', 'quiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);

        return view('admin.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());


        $question = Question::create([
            'quiz_id' => $request->quiz_id,
            'question' => $request->question
        ])->id;

        if ($request->file('image') !== null) {
            $quizimage = $request->file('image')->storeAs(
                'image/quiz/' . $request->quiz_id,
                $question . "." . $request->image->getClientOriginalExtension(),
                'public'
            );
        }

        $rowquestion = Question::find($question);
        $rowquestion->update(['image' => $quizimage]);


        foreach ($request->answer as $key => $answer) {
            if ($answer != null) {
                Answer::create([
                    'question_id' => $question,
                    'answer' => $answer,
                    'is_true' => $request->is_true[$key]
                ]);
            }
        }

        toast('New question has been updated', 'success');
        return to_route('admin.question.index', $request->quiz_id);
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
        $question = Question::with('answer')->find($id);

        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $question = Question::find($id);
        if ($request->file('image') !== null) {
            $quizimage = $request->file('image')->storeAs(
                'image/quiz/' . $question->quiz_id,
                $id . "." . $request->image->getClientOriginalExtension(),
                'public'
            );
            $question->update([
                'image' => $quizimage
            ]);
        }

        $question->update([
            'question' => $request->question
        ]);

        foreach ($request->answer_id as $key => $answer) {
            $answer = Answer::find($answer);
            $answer->update([
                'answer' => $request->answer[$key],
                'is_true' => $request->is_true[$key]
            ]);
        }

        toast('New question has been updated', 'success');
        return to_route('admin.question.index', $question->quiz_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
