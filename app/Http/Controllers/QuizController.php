<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\UserQuiz;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Quiz::all();
        return view('admin.task.othertask.index');
    }

    public function filter_lolos()
    {
        $qz = UserQuiz::where('status' , 1)->get();
        return view('admin.task.othertask.lolos')->with('qz',$qz);
    }

    public function filter_belumlolos()
    {
        $qz = UserQuiz::where('status' , 0)->get();

        return view('admin.task.othertask.belumlolos')->with('qz',$qz);
    }

    public function search_lolos(Request $r)
    {
        $cari = $r->cari;
        $qz = UserQuiz::where('status' , 1)->whereHas('user' , function ($qz) use ($cari){
            $qz
                ->where('full_name','LIKE','%'.$cari.'%')
                ->orWhere('email','LIKE','%'.$cari.'%')
                ->orWhere('phone','LIKE','%'.$cari.'%');
        })
            ->orWhereHas('quiz' , function ($qz) use ($cari){
                $qz
                    ->whereHas('video' , function ($qz) use ($cari){
                        $qz->whereHas('coursepackage' , function ($qz) use ($cari){
                             $qz->where('title','LIKE','%'.$cari.'%');
                        });
                });
            })
            ->get();
        return view('admin.task.othertask.lolos')->with('qz',$qz);
    }

    public function search_belum_lolos(Request $r)
    {
        $cari = $r->cari;
        $qz = UserQuiz::where('status' , 0)->whereHas('user' , function ($qz) use ($cari){
            $qz
                ->where('full_name','LIKE','%'.$cari.'%')
                ->orWhere('email','LIKE','%'.$cari.'%')
                ->orWhere('phone','LIKE','%'.$cari.'%');
        })
            ->orWhereHas('quiz' , function ($qz) use ($cari){
                $qz
                    ->whereHas('video' , function ($qz) use ($cari){
                        $qz->whereHas('coursepackage' , function ($qz) use ($cari){
                            $qz->where('title','LIKE','%'.$cari.'%');
                        });
                    });
            })
            ->get();
        return view('admin.task.othertask.belumlolos')->with('qz',$qz);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function create_custom($idvideo)
    {
         $video = Video::find($idvideo);
         return view('admin.task.othertask.create')
             ->with('v',$video);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quiz = new Quiz();
        $check = Quiz::where('video_id',$request->video)->first();

        if($check == null)
        {
            $quiz->video_id = $request->video;
            $quiz->description = $request->descript;
            $quiz->save();
            Session::flash('Sukses','Berhasil menambah kursus');
            $video = Video::where('id',$request->video)->first();
            return redirect()->route('video.index2',['id'=>$video->coursepackage->id]);
        }

        $video = Video::where('id',$request->video)->first();
        return redirect()->route('video.index2',['id'=>$video->coursepackage->id]);


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $q = Quiz::where('video_id',$id)->first();
        $v = Video::find($id);
        return view('admin.task.othertask.detail')
            ->with('q',$q)
            ->with('v',$v);
    }

    public function show_userquiz($id)
    {
        $qz = UserQuiz::find($id);
        return view('admin.task.othertask.detailfile')->with('qz',$qz);
    }

    public function download($id)
    {
        $qz = UserQuiz::find($id);
        $filepath = public_path('task/'.$qz->file);
        return Response::download($filepath);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $q = Quiz::find($id);
        $q->description = $r->descript;
        $q->save();

        $video = Video::where('id',$q->video_id)->first();

        Session::flash('Sukses','Berhasil menyimpan perubahan');
        return redirect()->route('video.index2',['id'=>$video->coursepackage->id]);
    }

    public function statuschange(Request $r,$id)
    {
        $qz = UserQuiz::find($id);

        if($r->status == 1){
            $time = Carbon::now();
            $qz->status = $r->status;
            $qz->completion_date = $time->toDateString();
            Session::flash('Sukses','Berhasil merubah status menjadi lolos');
            $qz->save();
        }
        if($r->status == 0){
            $qz->status = $r->status;
            $qz->completion_date = null;

            Session::flash('Sukses','Berhasil merubah status menjadi tidak lolos');
            $qz->save();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $q = Quiz::find($id);
        dd($q);
//        return redirect()->back();
    }

    public function destroy_custom($id,$idvideo)
    {
        $q = Quiz::find($id);
        UserQuiz::where('quiz_id',$id)->delete();
        $q->delete();

        $video = Video::where('id',$idvideo)->first();

        Session::flash('Sukses','Tugas berhasil dihapus');

        return redirect()->route('video.index2',['id'=>$video->coursepackage->id]);
    }
}
