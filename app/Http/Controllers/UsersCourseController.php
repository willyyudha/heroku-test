<?php

namespace App\Http\Controllers;

use App\CoursePackage;
use App\FinalWork;
use App\Task;
use App\UsersCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersCourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function my_course($id)
    {
        $cari = UsersCourse::where('user_id' , $id)->paginate(6);

        return view('pagesiswa.course.mycourse')->with('cari' , $cari);
    }

    public function see_all()
    {
        $seeall = CoursePackage::orderBy('created_at' , 'desc')->paginate(6);

        return view('pagesiswa.course.allcourses')->with('s' , $seeall);
    }

    public function show($id)
    {
        $pc = CoursePackage::find($id);
        $checkimages = $pc->image > 0;
        $c = CoursePackage::find($id);
        return view('pagesiswa.course.showcourse')->with('c' , $c)->with('ci' , $checkimages);
    }

    public function search_allcourse(Request $request){

        $cari = $request->cari;

        $cp = CoursePackage::where('title' ,'like', '%'.$cari.'%')->orWhere('description' ,'like', '%'.$cari.'%')->paginate(6);

        return view('pagesiswa.course.searchallcourse')->with('cp' , $cp);

    }

    public function search_coursebychannel($id){
        $cp = CoursePackage::where('channels_id',$id)->paginate(6);
        return view('pagesiswa.course.searchallcourse')->with('cp' , $cp);
    }

    public function search_mycourse(Request $request){
        $cari = $request->cari;

        $uc = UsersCourse::whereHas('package' , function ($uc) use($cari){
            $uc->where('title', 'like', '%'.$cari.'%');
        })->paginate(6);

        return view('pagesiswa.course.searchmycourse')->with('uc' , $uc);

    }


    public function prepay($id)
    {
        $check = UsersCourse::where('user_id' ,'=' , Auth::id())->where('package_id' , '=' , $id)->first();

        if($check === null)
        {
            $uc = new UsersCourse();
            $uc->user_id = Auth::id();
            $uc->package_id = $id;

            $uc->payment_status = 0;
            $uc->save();

            $task = new Task();
            $task->usercourse_id = $uc->id;
            $task->status = 0;
            $task->save();

            Session::flash('Sukses','Sukses menambah kursus, silahkan Hubungi Admin Untuk Pembayaran di button info');
            return redirect()->route('mycourse',['id'=>Auth::id()]);
        }
        else{
            return redirect()->back();
        }

    }

//    public function finaltask($id){
//
//        $f = Task::where('usercourse_id', $id)->first();
//
//        return view('pagesiswa.course.taskrule')->with('f' , $f);
//    }

    public function destroy($id)
    {
        $uc = UsersCourse::find($id);
        $f = Task::where('usercourse_id', $uc->id)->first();

        if($f !== null)
        {
            $f->delete();
        }

        $uc->delete();

        Session::flash('Sukses','Berhasil menghapus kursus');
        return redirect()->route('mycourse',['id'=>Auth::id()]);
    }
}





















