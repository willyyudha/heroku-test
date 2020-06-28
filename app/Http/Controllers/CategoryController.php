<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index()
    {
        return view('admin.category.index')->with('category' , Category::all());
    }

    public function searchcategory(Request $r){
        $category = Category::where('title','LIKE','%'.$r->cari.'%')->get();
        return view('admin.category.index')->with('category' , $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required|unique:categories'
        ]);

        Category::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
        ]);

        session::flash('Sukses' , 'Kategori berhasil dibuat');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Category::find($id) == null)
        {
            return $this->index();
        }
        $d = Category::orderBy('created_at' , 'desc')->where('category_id' , $id)->paginate(3);
        return view('pagesiswa.channel')->with('d' , $d);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit')->with( 'category' , Category::find($id));
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
        $this->validate($request,[
            'title'=>'required|unique:categories'
        ]);

        $channel = Category::find($id);
        $channel->title = $request->title;
        $channel->save();

        session::flash('Sukses' , 'Kategori berhasil diubah');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        session::flash('Sukses' , 'Kategori berhasil dihapus');

        return redirect()->route('category.index');
    }
}
