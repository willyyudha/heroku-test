<?php

namespace App\Http\Controllers;

use App\Discussion;
use Auth;
use App\Reply;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discussion = Discussion::orderBy('created_at' , 'desc')->paginate(6);
        return view('pagesiswa.index' , compact('discussion'));
    }


    public function cari(Request $request)
    {
        $cari = $request->cari;
        $discussion = Discussion::where('title','like','%'.$cari.'%')->orWhere('content','like','%'.$cari.'%')->paginate(6);

        return view('pagesiswa.index' , compact('discussion'));

    }


    public function sortbyuser()
    {
        $u = Discussion::orderBy('created_at' , 'desc')->where('user_id' , '=' , Auth::id())->paginate(6);
        return view('pagesiswa.sortbyuser')->with('u' , $u);
    }

    public function allmytopic(){
        $discussion = Discussion::where('user_id',Auth::id())->orderBy('created_at' , 'desc')->paginate(6);
        return view('pagesiswa.index' , compact('discussion'));
    }
}
