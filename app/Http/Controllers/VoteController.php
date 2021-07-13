<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\UserVote;
use App\Vote;

class VoteController extends Controller
{
    private function setVote($s_vote, $id){
        $vote_status = [];
        if($s_vote == 'upvote'){
            $vote_status = ['upvote', 'downvote'];
        }else if($s_vote == 'downvote'){
            $vote_status = ['downvote', 'upvote'];
        }

        $vote = Vote::findOrFail($id);
        $userVote = UserVote::where('vote_id',$id)
                    ->where('user_id', Auth::id())
                    ->first();
        $voteCheck = true;
        if($userVote == null){
                UserVote::create([
                    'user_id' => Auth::id(),
                    'vote_id' => $id,
                    'status' => $vote_status[0]
                ]);
        }else if($userVote->status == $vote_status[1]){
            $userVoteUpdate = UserVote::findOrFail($userVote->id);
            $userVoteUpdate->status = 'reset';
            $userVoteUpdate->save();
        }else if($userVote->status == 'reset'){
            $userVoteUpdate = UserVote::findOrFail($userVote->id);
            $userVoteUpdate->status = $vote_status[0];
            $userVoteUpdate->save();

        }else{
            $voteCheck = false;
        }

        if($voteCheck){
            if($s_vote == 'upvote'){
                $vote->count += 1;
            }else if($s_vote == 'downvote'){
                $vote->count -= 1;
            }
            $vote->save();
            $userVote = $vote->count;
        }else{
            $userVote = $voteCheck;
        }
        return $userVote;
    }

    public function upvote($id){
        $userVote = $this->setVote('upvote', $id);
        return response()->json($userVote);
    }

    public function downvote($id){
        $userVote = $this->setVote('downvote', $id);
        return response()->json($userVote);
    }
}

