<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVote extends Model
{
    protected $fillable = ['user_id', 'vote_id', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }
}
