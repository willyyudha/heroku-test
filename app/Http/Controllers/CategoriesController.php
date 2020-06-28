<?php

namespace App\Http\Controllers;

use App\Discussion;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show($id)
    {
        $discussion = Discussion::orderBy('created_at' , 'desc')->where('category_id' , $id)->paginate(6);
        return view('pagesiswa.index' , compact('discussion'));
    }

}
