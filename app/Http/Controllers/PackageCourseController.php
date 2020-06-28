<?php

namespace App\Http\Controllers;

use App\CoursePackage;
use App\UsersCourse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Validator;
use Session;
use App\Channel;

class PackageCourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $c = CoursePackage::all();

        return view('admin.coursepackage.index')->with('c' , $c);
    }

    public function searchpackage(Request $r)
    {
        $cari = $r->cari;
        $c = CoursePackage::where('title','LIKE','%'.$cari.'%')
            ->orWhere('price','LIKE','%'.$cari.'%')
            ->orWhere('preview_link','%'.$cari.'%')
            ->orWhereHas('channel' , function ($c) use ($cari){
                $c->where('title','LIKE','%'.$cari.'%');
            })
            ->get();
        return view('admin.coursepackage.index')->with('c' , $c);
    }

    public function create()
    {
        $channel = Channel::all();
        return view('admin.coursepackage.create')->with('c' , $channel);
    }

    public function store(Request $r)
    {
            $file = $r->file('image');
            $name = $file->getClientOriginalName();
            $newname = rand(100000, 1001238912).".".$name;

            Validator::make($r->input(),[
                'title' => 'required',
                'description' => 'required',
                'month_expired' => 'required',
                'image' => 'required',
                'link' => 'required',
                'price' => 'required',
            ]);

            CoursePackage::create([
                'title' => $r->title,
                'description' => $r->description,
                'price' => $r->price,
                'month_expired' => $r->month_expired,
                'preview_link' => $r->link,
                'image' => $newname,
                'channels_id' => $r->channel,
            ]);

            Session::flash('Sukses','Paket kursus berhasil dibuat');
            $file->move('images/course' , $newname);

            return $this->index();

    }

    public function show($id)
    {
        $cp = CoursePackage::find($id);
        $channel = Channel::all();
        return view('admin.coursepackage.edit')->with('cp' , $cp)->with('c' , $channel);
    }

    public function update(Request $r, $id)
    {
        $package = CoursePackage::find($id);
        $gettime = Carbon::now();
        $usercourse = UsersCourse::where('package_id',$package->id)->get();
//
//        $expr_result = array();
//        $uc_arr = array();
//
//        foreach ($usercourse as $uc){
//             $uc_arr[] = $uc;
//        }
//
//        if($usercourse !== null)
//        {
//            for($i = 0; $i < count($usercourse); $i++){
//                $req_new_date = date("Y-m-d",strtotime("+".$r->month_expired." month", strtotime($gettime->toDateString())));
//
//                $date1 =  date_create(date("Y-m-d",strtotime($usercourse[$i]->start_date)));
//                $date2 =  date_create(date("Y-m-d",strtotime($usercourse[$i]->expired_date)));
//
//                $date3 =  date_create(date("Y-m-d",strtotime($req_new_date)));
//                $date4 =  date_create(date("Y-m-d",strtotime($gettime)));
//
//                $restofday_user = date_diff($date1,$date2)->days;
//                $check_totalday = date_diff($date3,$date4)->days;
//
//                $date_subtract = $check_totalday - $restofday_user;
//                $expr_result[] = $date_subtract;
//            }
//        }
//
//        $count_result = count($expr_result);
//        for ($i = 0; $i < $count_result; $i++)
//        {
//            $uc_arr[$i]->expired_date = date("Y-m-d",strtotime("+".$expr_result[$i]." days", strtotime($uc_arr[$i]->expired_date->toDateString())));
//            $uc_arr[$i]->save();
//        }

        if(Input::hasFile('image'))
        {
            $file = $r->file('image');
            $name = $file->getClientOriginalName();
            $newname = rand(100000, 1001238912).".".$name;

            Validator::make($r->input(),[
                'title' => 'required|integer',
                'description' => 'required',
                'image' => 'required',
                'price' => 'integer',
                'preview_link' => 'required',
            ]);

            $package->title = $r->title;
            $package->description = $r->descript;
            $package->image = $newname;
            $package->month_expired = $r->month_expired;
            $package->channels_id = $r->channel;
            $package->price = $r->price;
            $package->preview_link = $r->link;
            $package->save();

            $file->move('images/course' , $newname);
        }
        else
        {
            Validator::make($r->input(),[
                'title' => 'required|integer',
                'description' => 'required',
                'image' => 'required',
                'price' => 'integer',
                'preview_link' => 'required',
            ]);

            $package->title = $r->title;
            $package->description = $r->descript;
            $package->channels_id = $r->channel;
            $package->month_expired = $r->month_expired;
            $package->price = $r->price;
            $package->preview_link = $r->link;
            $package->save();

        }

        Session::flash('Sukses' , 'Paket kursus berhasil di ubah');

        return $this->index();

    }

    public function destroy($id)
    {
        $cp = CoursePackage::find($id);
        File::delete(public_path('images/course/'.$cp->image));
        CoursePackage::destroy($id);
        Session::flash('Sukses' , 'Kursus berhasil dihapus');
        return $this->index();
    }
}
