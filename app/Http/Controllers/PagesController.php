<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;
use App\Answer;
use Auth;
use App\UserView;
use App\View;
class PagesController extends Controller
{
    public function index()
    {
        $question = Question::all();
        return view('layouts.index', compact('question'));
    }

    public function upvote()
    {
        $question = Question::join('votes', 'votes.id', '=', 'vote_id')
        ->orderBy('votes.count', 'DESC')
        ->select('questions.*')
        ->get();

        return view('layouts.upvote', compact('question'));
    }

    public function downvote()
    {
        $question = Question::join('votes', 'votes.id', '=', 'vote_id')
        ->orderBy('votes.count', 'ASC')
        ->select('questions.*')
        ->get();

        return view('layouts.downvote', compact('question'));
    }
}
