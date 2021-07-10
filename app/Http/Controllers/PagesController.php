<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Question;

class PagesController extends Controller
{
    public function index()
    {
        $question = Question::all();  
        return view('layouts/index', ['question' => $question]);
    }

    public function upvote()
    {
        $question = DB::table('questions')
                ->orderBy('id', 'desc')
                ->get();
        return view('layouts/upvote', ['question' => $question]);
    }

    public function downvote()
    {
        $question = DB::table('questions')
                ->orderBy('id', 'ASC')
                ->get();
        return view('layouts/downvote', ['question' => $question]);
    }
}
