<?php

namespace App\Http\Controllers;

use App\CoursePackage;
use App\Task;
use App\UsersCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class TaskUserController extends Controller
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

    public function index(){

    }

    public function filter_lolos()
    {
        $tu = Task::where('status' , 1)->get();
        return view('admin.task.lolos')->with('tu',$tu);
    }

    public function filter_belumlolos()
    {
        $tu = Task::where('status' , 0)->get();
        return view('admin.task.belumlolos')->with('tu',$tu);
    }

    public function search_lolos(Request $r)
    {
        $cari = $r->cari;
        $tu = Task::where('status' , 1)->whereHas('ucourse' , function ($tu) use ($cari){
            $tu->whereHas('user',function ($tu) use ($cari){
                $tu
                    ->where('full_name','LIKE','%'.$cari.'%')
                    ->orWhere('email','LIKE','%'.$cari.'%')
                    ->orWhere('phone','LIKE','%'.$cari.'%');
            });
            $tu->orWhereHas('package',function ($tu) use ($cari){
                $tu->where('title','LIKE','%'.$cari.'%');
            });
        })
            ->get();
        return view('admin.task.lolos')->with('tu',$tu);
    }

    public function search_belumlolos(Request $r)
    {
        $cari = $r->cari;
        $tu = Task::where('status' , 0)->whereHas('ucourse' , function ($tu) use ($cari){
                    $tu->whereHas('user',function ($tu) use ($cari){
                        $tu
                            ->where('full_name','LIKE','%'.$cari.'%')
                            ->orWhere('email','LIKE','%'.$cari.'%')
                            ->orWhere('phone','LIKE','%'.$cari.'%');
                    });
                    $tu->orWhereHas('package',function ($tu) use ($cari){
                        $tu->where('title','LIKE','%'.$cari.'%');
                    });
                })
                ->get();

        return view('admin.task.belumlolos')->with('tu',$tu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function create_custom($id)
    {
            $cp  = CoursePackage::find($id);
            return view('admin.task.create')->with('cp',$cp);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r,$id)
    {
        $cp  = CoursePackage::find($id);
        $cp->final_taskdescript = $r->descript;
        $cp->save();

        return redirect()->route('video.index2',['id'=>$cp->id]);
    }

    public function custom_store(Request $r,$id)
    {
        $cp  = CoursePackage::find($id);
        $cp->final_taskdescript = $r->descript;
        $cp->save();

        Session::flash('Sukses','Berhasil menambah tugas akhir');
        return redirect()->route('video.index2',['id'=>$cp->id]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tu = Task::find($id);
        return view('admin.task.detail')->with('tu',$tu);
    }

    public function show_the_descript($id)
    {
        $cp = CoursePackage::find($id);
        return view('admin.task.detail_task_user')->with('cp',$cp);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $tu = Task::find($id);
//        dd($tu);
        $filepath = public_path('task/'.$tu->file);
        return Response::download($filepath);
    }

    public function statuschange(Request $r,$id)
    {
        $tu = Task::find($id);

        if($r->status == 1){
            $time = Carbon::now();
            $tu->status = $r->status;
            $tu->completion_date = $time->toDateString();
            Session::flash('Sukses','Berhasil merubah status menjadi lolos');
            $tu->save();
        }
        if($r->status == 0){
            $tu->status = $r->status;
            $tu->completion_date = null;

            Session::flash('Sukses','Berhasil merubah status menjadi tidak lolos');
            $tu->save();
        }
        return redirect()->back();
    }

    public function edit($id)
    {

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
        $cp =  CoursePackage::find($id);
        $cp->final_taskdescript = $r->descript;
        $cp->save();

        Session::flash('Sukses','Berhasil merubah tugas akhir');
        return redirect()->route('video.index2',['id'=>$cp->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function custom_destroy($id)
    {
        $cp = CoursePackage::find($id);
        $cp->final_taskdescript = null;
        $cp->save();

        Session::flash('Sukses','Berhasil menghapus tugas akhir');
        return redirect()->route('video.index2',['id'=>$id]);
    }
}
