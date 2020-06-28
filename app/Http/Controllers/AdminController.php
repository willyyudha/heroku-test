<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\ReportDiscussion;
use App\ReportVideo;
use App\Task;
use App\User;
use App\Channel;
use App\UsersCourse;
use App\Video;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
//        $this->middleware('superadmin');
    }

    public function index()
    {
        $user = User::where('super_admin' , '=', 0)->where('admin' , '=' , 0)->get();
        $report = ReportDiscussion::all();
        $video = Video::all();
        $usercourselunas = UsersCourse::where('payment_status',1)->get();
        $usercoursebelumlunas = UsersCourse::where('payment_status',0)->get();
        $task = Task::all();

        return view('admin.index' , compact('user',$user))
            ->with('r',$report)
            ->with('v',$video)
            ->with('lunas',$usercourselunas)
            ->with('belumlunas',$usercoursebelumlunas)
            ->with('t',$task);
    }


    public function viewuserlist()
    {
        $user = User::where('super_admin' , '=', 0)->where('admin' , '=' , 0)->get();
        return view('admin.user.index')->with('user' , $user);
    }

    public function searchuser(Request $r){
        $user = User::where('super_admin' , '=', 0)
            ->where('admin' , '=' , 0)
            ->where('full_name','LIKE','%'.$r->cari.'%')
            ->orWhere('username','LIKE','%'.$r->cari.'%')
            ->orWhere('address','LIKE','%'.$r->cari.'%')
            ->orWhere('gender','LIKE','%'.$r->cari.'%')
            ->orWhere('phone','LIKE','%'.$r->cari.'%')
            ->orWhere('dob','LIKE','%'.$r->cari.'%')
            ->orWhere('email','LIKE','%'.$r->cari.'%')
            ->get();

        return view('admin.user.index' , compact('user',$user));
    }



    public function pageadduserlist()
    {
        return view('admin.user.create');
    }

    public function storeadduserlist(Request $request)
    {

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        session::flash('success' , 'User Created.');
        return redirect()->route('page.userlist');
    }

    public function editpageuser($id)
    {
        $user = User::find($id);

        return view('admin.user.edit')->with('user' , $user , 'unhash');
    }

    public function storeeditpageuser(Request  $r , $id)
    {
        $user = User::find($id);
        if($r->name)
        {
            $user -> name = $r->name;
        }
        if($r->email)
        {
            $user -> email = $r->email;
        }
        if($r->password)
        {
            $user -> password = Hash::make($r->password);
        }

        $user -> save();
        session::flash('succes' , 'User edited succesfully.');
        return $this->index();
    }

    public function detail_user($id)
    {
        $users = User::find($id);

        return view('admin.user.detail')->with('users' , $users);
    }

    public function destroy_user($id)
    {
        User::find($id)->delete();
        
        session::flash('Sukses' , 'User berhasil dihapus');
        return $this->viewuserlist();
    }

    public function destroy_disquss($id)
    {
        Discussion::find($id)->delete();
        ReportDiscussion::where('discussion_id' , $id)->delete();

        session::flash('succes' , 'Discussion deleted succesfully.');


    }

    //report func
    public function searchreport_discuss(Request $r){

        $cari = $r->cari;
        $report_discuss = ReportDiscussion::
            where('reason','LIKE','%'.$cari.'%')
            ->orWhereHas('user',function ($report_discuss) use ($cari){
                $report_discuss
                    ->where('full_name','LIKE','%'.$cari.'%');
            })
            ->orWhereHas('discussion',function ($report_discuss) use ($cari){
                $report_discuss->where('title','LIKE','%'.$cari.'%')
                ->orWhereHas('categories',function ($report_discuss) use ($cari){
                    $report_discuss->where('title','LIKE','%'.$cari.'%');
                });
            })
            ->get();

        return view('admin.discuss.index')->with('report_discuss' , $report_discuss);
    }


    public function viewdiscusslistreport()
    {
        $report_discuss = ReportDiscussion::all();

        return view('admin.discuss.index')->with('report_discuss' , $report_discuss);
    }

    public function deleteallreportdiscuss($id)
    {
        ReportDiscussion::where('discussion_id',$id)->delete();
        $report_discuss =  ReportDiscussion::all();

        Session::flash('Sukses','Berhasil menghapus semua report di diskusi ini');
        return view('admin.discuss.index')->with('report_discuss' , $report_discuss);
    }


    public function report_discussdetail($discussId , $reportId)
    {
        if (ReportDiscussion::find($reportId) == null)
        {
            return $this->viewdiscusslistreport();
        }
        $discuss = Discussion::find($discussId);
        $report = ReportDiscussion::find($reportId);
        return view('admin.discuss.detail')->with('discuss' , $discuss)->with('report' , $report);

    }

    public function destroy_report($id)
    {
        ReportDiscussion::where('id',$id)->delete();

        $report_discuss =  ReportDiscussion::all();
        Session::flash('Sukses' , 'report berhasil di hapus');
        return view('admin.discuss.index')->with('report_discuss' , $report_discuss);
    }

    public function delete_discussion($discussId , $reportId)
    {
        Discussion::destroy($discussId);
        ReportDiscussion::where('discussion_id',$discussId)->delete();
        $report_discuss =  ReportDiscussion::all();

        session::flash('Sukses' , 'Diskusi berhasil dihapus');
        return view('admin.discuss.index')->with('report_discuss' , $report_discuss);
    }

//    func report video
    public function viewvideoslistreport()
    {
        $report_video = ReportVideo::all();
        return view('admin.video.reportvideo')->with('report_video' , $report_video);
    }

    public function reportvideodetail($id)
    {
        if(ReportVideo::find($id) == null){
            return $this->viewvideoslistreport();
        }
        $report_video = ReportVideo::find($id);
        return view('admin.video.reportdetail')->with('report_video' , $report_video);
    }

    public function deletereportvideo($id)
    {
        $report = ReportVideo::find($id);
        $report->delete();
        $report_video = ReportVideo::all();

        Session::flash('Sukses','Berhasil hapus report');
        return view('admin.video.reportvideo')->with('report_video' , $report_video);
    }

    public function deleteasllreportvideo($id)
    {
        $report_video_find = ReportVideo::find($id);
        $report = ReportVideo::where('video_id',$report_video_find->video_id)->delete();
        $report_video = ReportVideo::all();

        Session::flash('Sukses','Berhasil menghapus semua report di video ini');
        return view('admin.video.reportvideo')->with('report_video' , $report_video);

    }

    public function searchreportvideo(Request $req)
    {
        $cari = $req->cari;
        $report_video = ReportVideo::whereHas('user',function ($report_video) use ($cari){
             $report_video->where('full_name','LIKE','%'.$cari.'%');
        })
        ->orWhereHas('video',function ($report_video) use ($cari){
            $report_video->where('name','LIKE','%'.$cari.'%')
                ->orWhereHas('coursepackage',function ($report_video) use ($cari){
                    $report_video->where('title','LIKE','%'.$cari.'%');
                });;
        })
        ->orWhere('reason','LIKE','%'.$cari.'%')->get();

        return view('admin.video.reportvideo')->with('report_video' , $report_video);

    }
}
