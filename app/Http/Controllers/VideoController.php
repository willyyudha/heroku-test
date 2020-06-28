<?php

namespace App\Http\Controllers;

use App\CoursePackage;
use App\Quiz;
use App\ReportVideo;
use App\UserQuiz;
use App\Video;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
         $video = Video::all();
         return view('admin.video.index')->with('v' , $video);
    }

    public function index2($id){
        $video = Video::where('package_id',$id)->orderBy('step')->get();
        return view('admin.video.index')->with('v' , $video);
    }

    public function filtervideo(){
        $pc = CoursePackage::all();
        return view('admin.video.filtervideo')->with('pc',$pc);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $package = CoursePackage::all();
        return view('admin.video.create')->with('pk' , $package);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
            Validator::make($r->input(),[
                'name' => 'required',
                'paket' => 'required',
                'tahap' => 'required',
                'link' => 'required',
            ]);

            Video::create([
                'name' => $r->name,
                'package_id' => $r->paket,
                'step' => $r->tahap,
                'link' => $r->link
            ]);

            Session::flash('Sukses' , 'video berhasil ditambahkan');
            return redirect()->route('video.index2' , ['id'=>$r->paket]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $video = Video::find($id);
        $pk = CoursePackage::all();
        return view('admin.video.edit')->with('v' , $video)->with('pk' , $pk);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, $id)
    {
        $video = Video::find($id);

        $video->name = $r->name;
        $video->package_id = $r->paket;
        $video->step = $r->tahap;
        $video->link = $r->link;
        $video->save();

        Session::flash('Sukses' , 'Video Berhasil Diubah');
        return $this->index();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $quiz = Quiz::where('video_id',$id)->first();
         $get_reportvideo = ReportVideo::where('video_id',$id)->delete();
         if($get_reportvideo !== null)
         {
            ReportVideo::where('video_id',$id)->delete();
         }

         if($quiz !== null)
         {
             $got_userquiz = UserQuiz::where('quiz_id',$quiz->id)->delete();
             if($got_userquiz !== null)
             {
                 UserQuiz::where('quiz_id',$quiz->id)->delete();
             }
         }

         $got_quiz = Quiz::where('video_id',$id)->delete();
         if($got_quiz !== null)
         {
             Quiz::where('video_id',$id)->delete();
         }

         Video::where('id',$id)->delete();

         Session::flash('Sukses' , 'Video Berhasil Dihapus');
         return redirect()->back();
    }
}
