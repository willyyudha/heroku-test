<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [

        'title' ,
        'content',
        'category_id',
        'user_id',
        'channel_id',
        'images',

    ];

    public function channels()
    {
        return $this->belongsTo('App\Channel' , 'channel_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Category' , 'category_id');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

//    public function replies_the_replies()
//    {
//        return $this->hasMany('App\ReplyTheReply');
//    }

    public function report_discuss()
    {
        return $this->hasMany('App\ReportDiscussion','discussion_id');
    }

    public function totalview()
    {
        return $this->hasMany('App\Totalview');
    }

}

