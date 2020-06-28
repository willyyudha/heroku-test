<?php

namespace App\Http\Controllers;

use App\UserQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UserQuizController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function custom_store(Request $request,$id){


        $qz = UserQuiz::find($id);
        $file =  $request->file('file');

        if($qz->file == null){
            $newname = $file->getClientOriginalName();
            $qz->file = $newname;
            $file->move('task',$newname);
            $qz->save();
            Session::flash('Sukses','Tugas berhasil dikirim');
            return redirect()->back();
        }else{
            $newname = $file->getClientOriginalName();
            File::delete(public_path('task/'.$qz->file));
            $qz->file = $newname;
            $qz->move('task',$newname);
            $qz->save();
        }

        return redirect()->back();
    }

    public function show_custom($id)
    {
        $qz = UserQuiz::where('id', $id)->where('user_id',Auth::id())->first();
//        dd($qz);
        return view('pagesiswa.course.othertaskrule')->with('qz' , $qz);
    }


    public function customdelete($id)
    {
        $t = UserQuiz::find($id);
        File::delete(public_path('task/'.$t->file));
        $t->file = "";
        $t->save();

        Session::flash('Sukses','Tugas berhasil dihapus');
        return redirect()->back();
    }
}
