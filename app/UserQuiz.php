<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    protected $fillable = [
        'quiz_id',
        'file',
        'user_id',
        'status',
        'completion_date'
    ];

    public function quiz()
    {
        return $this->belongsTo('App\Quiz','quiz_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
