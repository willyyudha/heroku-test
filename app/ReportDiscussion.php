<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportDiscussion extends Model
{
    protected $fillable = [
        'user_id',
        'discussion_id',
        'video_id',
        'total_report',
        'reason',
    ];

    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }

    public function discussion()
    {
        return $this->belongsTo('App\Discussion' , 'discussion_id');
    }

}
