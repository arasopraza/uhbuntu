<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\View;
use App\Vote;
use App\Tag;
use App\Answer;
use carbon\carbon;
use App\UserView;
use Auth;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $view = new View;
        $view->count = 0;
        $view->save();

        $vote = new Vote;
        $vote->count = 0;
        $vote->save();

        $question = new Question;
        $question->user_id = Auth::id();
        $question->vote_id = $vote->id;
        $question->view_id = $view->id;
        $question->title = $request->title;
        $question->content = $request->content;
        $question->save();

        foreach (explode(',', $request->tags) as $tag) {
            Tag::create([
                'question_id' => $question->id,
                'tags' => $tag
            ]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        $answer = Answer::where('question_id', $question->id)->get();
        if(Auth::check()){
            if(UserView::where('view_id',$question->view->id)
            ->where('user_id', Auth::id())
            ->get()->count() == 0){
                UserView::create([
                    'user_id' => Auth::id(),
                    'view_id' => $question->view->id
                ]);

                $view = View::findOrFail($question->view->id);
                $view->count += 1;
                $view->save();
            }
        }
        return view('layouts.detail', compact('question', 'answer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return redirect('/');
    }
}
