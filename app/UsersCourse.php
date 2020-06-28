<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersCourse extends Model
{
    protected $fillable = [

        'user_id' ,
        'package_id',
        'payment_status',
        'start_date',
        'expired_date',

    ];

    protected $dates = [
        'expired_date'
    ];


    public function package()
    {
        return $this->belongsTo('App\CoursePackage' , 'package_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function task()
    {
        return $this->hasMany('App\Task','usercourse_id');
    }

    public function playedvideo(){
        return $this->hasOne('App\PlayedVideo', 'usercourse_id');
    }

    public function approvedby()
    {
        return $this->belongsTo('App\User' , 'approved_by');
    }

    public function paymentlog()
    {
        return $this->hasMany('App\PaymentLog','usercourse_id');
    }

}
