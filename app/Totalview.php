<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Totalview extends Model
{
    protected $fillable = [

        'user_id',
        'discussion_id',

    ];

    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function diskusi()
    {
        return $this->belongsTo('App\Discussion' , 'discussion_id');
    }
}
