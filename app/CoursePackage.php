<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursePackage extends Model
{
    protected $fillable = [

        'title' ,
        'channels_id',
        'description',
        'price',
        'image',
        'month_expired',
        'preview_link',
        'final_taskdescript'


    ];

    public function users_course()
    {
        return $this->hasMany('App\UsersCourse','package_id');
    }

    public function video()
    {
        return $this->hasMany('App\Video','package_id');
    }

    public function channel()
    {
        return$this->belongsTo('App\Channel' , 'channels_id');
    }

}
