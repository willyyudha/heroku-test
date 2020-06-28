<?php

namespace App\Http\Controllers;

use App\Upvote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UpvoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function upvote($id)
    {
        $check_user = Upvote::where('user_id',Auth::id())->where('reply_id',$id)->first();

        if($check_user == null){
            Upvote::create([
                'reply_id' => $id,
                'user_id' => Auth::id(),
            ]);

            Session::flash('success' , 'Liked Succesfuly.');
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function downvote($id)
    {
        $like = Upvote::where('reply_id' , '=' , $id)->where('user_id' , '=' , Auth::id())->first();
        $like->delete();

        session::flash('success' , 'You unliked this');
        return redirect()->back();
    }
}
