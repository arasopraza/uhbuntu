<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['question_id', 'tags'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
