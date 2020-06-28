<?php

namespace App\Http\Controllers;

use App\User;
use App\UsersCourse;
use Illuminate\Http\Request;
use Session;

class SuperAdminController extends Controller
{



    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index()
    {
        $user = User::where('super_admin' , '=', 0)->where('admin' , '=' , 0)->get();
        $paymentreport = UsersCourse::where('payment_status',1)->get();

        return view('admin.index' , compact('user',$user))->with('pc',$paymentreport);
    }

    public function viewuserlist()
    {
        $user = User::where('super_admin' , '=', 0)->where('admin' , '=' , 0)->get();
        return view('admin.user.indexusersuperadmin')->with('user' , $user);
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

        return view('admin.user.indexusersuperadmin')->with('user' , $user);
    }


    public function detail_user($id)
    {
        $users = User::find($id);

        return view('admin.user.detail')->with('users' , $users);
    }

    public function viewadminpage()
    {
        $admin = User::where('admin' , '=' , 1 )->get();

        return view('admin.adminpage.index')->with('admin' , $admin);
    }

    public function searchadminpage(Request $r)
    {
        $admin = User::where('admin' , '=' , 1 )
//            ->orWhere('super_admin' , '=' , 1)
            ->where('full_name','LIKE','%'.$r->cari.'%')
            ->orWhere('username' , 'LIKE','%'.$r->cari.'%')
            ->orWhere('address' , 'LIKE','%'.$r->cari.'%')
            ->orWhere('gender' , 'LIKE','%'.$r->cari.'%')
            ->orWhere('phone' , 'LIKE','%'.$r->cari.'%')
            ->orWhere('dob' , 'LIKE','%'.$r->cari.'%')
            ->orWhere('email' , 'LIKE','%'.$r->cari.'%')
            ->get();

        return view('admin.adminpage.index')->with('admin' , $admin);
    }

//    public function editadminpage($id)
//    {
//         $admin = User::find($id);
//
//         return view('admin.adminpage.edit')->with('admin' , $admin);
//    }
    public function add_admin_page()
    {
        return view('admin.adminpage.create');
    }


    public function store_admin_data(Request $r , $id)
    {
        $admin =  User::find($id);
        $admin->admin = 1;
        $admin->save();
        session::flash('Sukses' , 'Admin berhasil ditambah');
        return $this->viewadminpage();
    }

    public function store_superadmin_data(Request $r , $id)
    {
        $superadmin = User::find($id);
        $superadmin->super_admin = 1;
        $superadmin->save();
        session::flash('Success' , 'Super Admin Berhasil Ditambah.');
        return redirect()->back();
    }


    public function destroyadmin($id)
    {
        $GETOURFROMHERE = User::find($id);
        $GETOURFROMHERE->super_admin = 0;
        $GETOURFROMHERE->admin = 0;
        $GETOURFROMHERE->save();

        session::flash('Sukses' , 'Berhasil kick admin');
        return redirect()->back();
    }




}
