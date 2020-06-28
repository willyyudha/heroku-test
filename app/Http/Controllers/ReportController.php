<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use App\ReportDiscussion;
use App\ReportVideo;
use App\Video;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Session;

class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function report_page_discuss($id)
    {
        $d = Discussion::find($id);
        return view('pagesiswa.report.reportpagediscuss')->with('d',$d);
    }

    public function store_report_discuss(Request $req , $id)
    {
          $discussion =  Discussion::find($id);
          $report_check = ReportDiscussion::where('discussion_id' , '=' , $discussion->id)->where('user_id',Auth::id())->first();
          $report_discuss = new ReportDiscussion();

          if($report_check == null)
          {
                $report_discuss->user_id = Auth::id();
                $report_discuss->discussion_id = $discussion->id;
                $report_discuss->reason = $req->reason;
                $report_discuss->save();

                Session::flash('Sukses','Report telah terkirim');
                return redirect()->back();
          }
          else
          {
                Session::flash('Gagal','Anda hanya bisa mengirim satu report untuk satu diskusi');
                return redirect()->back();
          }
    }

    public function report_page_videos($id)
    {
        $video = Video::find($id);
        return view('pagesiswa.report.reportpagevideo')->with('video',$video);

    }

    public function store_report_videos(Request $req,$id)
    {
        $video = Video::find($id);
        $report_check = ReportVideo::where('video_id',$id)->where('user_id',Auth::id())->first();
        $report_video = new ReportVideo();
//        dd($report_check);

        if($report_check == null)
        {
            $report_video->user_id = Auth::id();
            $report_video->video_id = $video->id;
            $report_video->reason = $req->reason;
            $report_video->save();
            Session::flash('Sukses','Report telah terkirim');
            return redirect()->back();
        }
        else
        {
            Session::flash('Gagal','Anda hanya bisa mengirim satu report untuk satu video');
            return redirect()->back();
        }
    }





}
