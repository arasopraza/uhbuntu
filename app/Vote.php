<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['count'];

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function answer()
    {
        return $this->hasMany(answer::class);
    }

    public function userVote()
    {
        return $this->hasMany(UserVote::class);
    }
}
