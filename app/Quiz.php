<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
      protected $fillable = [
          'video_id',
          'description',
      ];

      public function video()
      {
          return $this->belongsTo('App\Video','video_id');
      }

      public function user_quiz()
      {
          return $this->hasMany('App\UserQuiz' , 'quiz_id');
      }
}
