<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upvote extends Model
{
    protected $fillable = [
        'user_id',
        'reply_id',
    ];


    public function user()
    {
        $this->belongsTo('App\User' , 'user_id');
    }

    public function reply()
    {
        $this->belongsTo('App\Reply' , 'reply_id');
    }
}
