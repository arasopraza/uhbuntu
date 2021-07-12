<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserView extends Model
{
    protected $fillable = ['user_id', 'view_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function View()
    {
        return $this->belongsTo(View::class);
    }
}
