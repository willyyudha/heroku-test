<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\File;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

    }

    public function show($id)
    {
         $finduser = User::find($id);

         return view('myprofile.siswa.index')->with('finduser' , $finduser);
    }

    public function edit($id)
    {
        $finduser = User::find($id);
        return view('myprofile.siswa.myprofilestoreedit')->with('finduser' , $finduser);
    }

    public function update(Request $r , $id){
        $finduser = User::find($id);
        $file = $r->file('avatar');

        $this->validate($r , [
            'username' => 'required|max:8|min:6',
        ]);

        if($r->full_name)
        {
            $finduser -> full_name = $r -> full_name;
            $finduser->update();
        }
        if($r->username)
        {
            $finduser -> username = $r -> username;
            $finduser->update();
        }
        if($file){
            $name = $file->getClientOriginalName();
            $newname = rand(100000 ,  1001238912).".".$name;
            File::delete(public_path('images/avatar/'.$finduser->file));
            $finduser -> avatar = $newname;
            $file->move('images/avatar/',$newname);
        }
        if($r->address)
        {
            $finduser -> address = $r->address;
            $finduser->update();
        }
        if($r->phone)
        {
            $finduser -> phone = $r->phone;
            $finduser->update();
        }
        if($r->dob)
        {
            $finduser -> dob = $r->dob;
            $finduser->update();
        }
        if($r->email)
        {
            $finduser -> email = $r->email;
            $finduser->update();
        }



        session::flash('succes' , 'Profil Berhasil Diubah.');
        return redirect()->back();
    }

    public function destroy($id)
    {

    }


}
