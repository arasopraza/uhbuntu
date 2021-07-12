<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['user_id', 'vote_id', 'view_id', 'title', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vote()
    {
        return $this->belongsTo(Vote::class);
    }


    public function view()
    {
        return $this->belongsTo(View::class);
    }

    public function answer()
    {
        return $this->hasMany(Answer::class);
    }
}
