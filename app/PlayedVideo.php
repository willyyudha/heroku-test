<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayedVideo extends Model
{
    protected $fillable = [
        'video_id',
        'usercourse_id'
    ];

    public function video(){
        return $this->belongsTo('App\Video' , 'video_id');
    }

    public function usercourse(){
        return $this->belongsTo('App\UsersCourse' . 'usercourse_id');
    }
}
