<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    public function custom_store(Request $request,$id){


        $task = Task::find($id);
        $file =  $request->file('file');

        if($task->file == null){
//            $name = $file->getClientOriginalName();
            $newname = $file->getClientOriginalName();
            $task->file = $newname;
            $file->move('task',$newname);
            $task->save();
        }else{
//            $name = $file->getClientOriginalName();
            $newname = $file->getClientOriginalName();
            File::delete(public_path('task/'.$task->file));
            $task->file = $newname;
            $file->move('task',$newname);
            $task->save();
        }

        Session::flash('Sukses','Tugas berhasil dikirim');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $f = Task::where('usercourse_id', $id)->first();
        return view('pagesiswa.course.finaltaskrule')->with('f' , $f);
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
    public function update(Request $request, $id)
    {
        //
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

    public function customdelete($id)
    {
        $t = Task::find($id);
        File::delete(public_path('task/'.$t->file));
        $t->file = "";
        $t->save();

        Session::flash('Sukses','Tugas berhasil dihapus');
        return redirect()->back();
    }
}
