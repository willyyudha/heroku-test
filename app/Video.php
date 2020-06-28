<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $fillable = [
        'name' , 'package_id' , 'step' , 'link'
    ];

    public function coursepackage()
    {
        return $this->belongsTo('App\CoursePackage' , 'package_id');
    }

    public function played_video()
    {
        return $this->hasMany('App\PlayedVideo','usercourse_id');
    }

    public function quiz()
    {
        return$this->hasMany('App\Quiz','video_id');
    }


}
