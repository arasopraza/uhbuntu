<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = ['count'];

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function userView()
    {
        return $this->hasMany(UserView::class);
    }
}
