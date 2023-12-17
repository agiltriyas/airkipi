<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Score;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;

        $scores = Score::with('quiz.question')->where('user_id', $id)->paginate(10);
        return view('user.quiz.index', compact('scores'));
    }
}
