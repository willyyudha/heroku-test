<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [
        'usercourse_id',
        'file',
        'status',
        'completion_date'
    ];

    public function ucourse()
    {
        return $this->belongsTo('App\UsersCourse','usercourse_id');
    }

}
