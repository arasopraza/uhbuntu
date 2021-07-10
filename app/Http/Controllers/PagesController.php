<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('layouts/index');
    }

    public function upvote()
    {
        return view('layouts/upvote');
    }

    public function downvote()
    {
        return view('layouts/downvote');
    }
}
