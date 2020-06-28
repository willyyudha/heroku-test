<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['dob'];

    protected $fillable = [
        'full_name', 'username', 'address' , 'phone', 'dob', 'email', 'password', 'admin' , 'avatar' , 'gender'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function discussions()
    {
        return $this->hasMany('App\Discussion');
    }

    public function report()
    {
        return $this->hasMany('App\Report');
    }

    public function user_course()
    {
        return $this->hasMany('App\UsersCourse','user_id');
    }

//    public function totalview()
//    {
//        return $this->hasMany('App\View');
//    }

    public function report_discuss()
    {
        return $this->hasMany('App\ReportDiscussion','user_id');
    }

    public function reportpayment()
    {
        return $this->hasMany('App\PaymentLog','approved_by');
    }


}
