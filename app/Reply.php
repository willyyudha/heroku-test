<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Reply extends Model
{
    protected $fillable = [

        'conten' ,
        'user_id' ,
        'discussion_id'

    ];

    public function discussion()
    {
        return $this->belongsTo('App\Discussion' , 'discussion_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User' , 'user_id');
    }


    public function upvote()
    {
        return $this->hasMany('App\Upvote','reply_id');
    }

    public function is_voted_by_user()
    {
        $id = Auth::id();

        $upvoters = array();

        foreach($this->upvote as $upvotes):
            array_push($upvoters, $upvotes->user_id);
        endforeach;

        if(in_array($id , $upvoters))
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}
