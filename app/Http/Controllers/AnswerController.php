<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use App\Vote;
use Auth;

class AnswerController extends Controller
{
    public function store(Request $request){
        $vote = new Vote;
        $vote->count = 0;
        $vote->save();

        Answer::create([
            'vote_id' => $vote->id,
            'user_id' => Auth::id(),
            'question_id' => $request->question_id,
            'content' => $request->answer
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id){
        $answer = Answer::findOrFail($id);
        $answer->content = $request->content;
        $answer->save();
        return redirect()->back();
    }

    public function destroy($id){
        Answer::findOrFail($id)->delete();
        return redirect()->back();
    }
}
