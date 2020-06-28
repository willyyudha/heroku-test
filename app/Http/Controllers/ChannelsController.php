<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Channel;
use App\Discussion;
use Session;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('superadmin');
    }

    public function index()
    {
        return view('admin.channel.index')->with('channels' , Channel::all());
    }

    public function searchchannels(Request $r)
    {
        $channels = Channel::where('title','LIKE','%'.$r->cari.'%')->get();
        return view('admin.channel.index')->with('channels' , $channels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.channel.create');
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
            'title' => 'required|unique:channels'
        ]);

        Channel::create([
            'title' => $request->title,
            'slug' => str_slug($request->title),
        ]);

        session::flash('Sukses' , 'Chanel berhasil dibuat.');
        return redirect()->route('channels.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $d = Discussion::orderBy('created_at' , 'desc')->where('channel_id' , $id)->paginate(3);
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
        return view('admin.channel.edit')->with( 'channel' , Channel::find($id));
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
        $this->validate($request , [
            'title' => 'required|unique:channels'
        ]);

        $channel = Channel::find($id);
        $channel->title = $request->title;
        $channel->save();

        session::flash('Sukses' , 'Chanel berhasil di ubah');

        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Channel::destroy($id);

        session::flash('Sukses' , 'Berhasil menghapus chanel.');

        return redirect()->route('channels.index');
    }
}
