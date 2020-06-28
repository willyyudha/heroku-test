<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportVideo extends Model
{
    protected $fillable = ['user_id','video_id','reason'];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function video()
    {
        return $this->belongsTo('App\Video','video_id');
    }
}
