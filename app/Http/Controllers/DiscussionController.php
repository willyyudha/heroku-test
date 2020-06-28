<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Like;
use App\Reply;
use App\ReplyTheReply;
use App\ReportDiscussion;
use App\Totalview;
use App\Upvote;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use Session;

class DiscussionController extends Controller
{
    public function create()
    {
            return view('pagesiswa.newtopic');
    }

    public function store()
    {
        $r = request();
        $file = $r->file('images');
        if($file)
        {
            $this->validate($r,[
                'title' => 'required',
                'channel_id' => 'required',
                'category_id' => 'required',
                'conten' => 'required',
                'images' => 'required',
            ]);
            $name = $file->getClientOriginalName();
            $newname = rand(100000 ,  1001238912).".".$name;
            Discussion::create([
                'title' => $r->title,
                'channel_id' => $r->channel_id,
                'category_id' => $r->category_id,
                'content' => $r->conten,
                'images' => $newname,
                'user_id'=> Auth::id(),
                'slug' => str_slug($r->title),
            ]);
            $file->move('images/discussions' , $newname);
        }
        else
        {
            $this->validate($r,[
                'title' => 'required',
                'channel_id' => 'required',
                'category_id' => 'required',
                'conten' => 'required',
            ]);
            Discussion::create([
                'title' => $r->title,
                'channel_id' => $r->channel_id,
                'category_id' => $r->category_id,
                'content' => $r->conten,
                'user_id'=> Auth::id(),
                'slug' => str_slug($r->title),
            ]);
        }


        Session::flash('Sukses' , 'Topik Berhasil Dibuat');
        return redirect()->route('home');


    }

    public function edit($id){
        $d = Discussion::find($id);
        $checkimages = $d->images > 0;
        return view('pagesiswa.discuss.edit')->with('d',$d)->with('ci' , $checkimages);
    }

    public function sort_by_channel($id){

        $discussion = Discussion::where('channel_id',$id)->orderBy('created_at' , 'desc')->paginate(6);

        return view('pagesiswa.index' , compact('discussion'));
    }

    public function update(Request $r, $id)
    {
           $d = Discussion::find($id);

           if($r->file('image')){
               $file = $r->file('image');
               $name = $file->getClientOriginalName();
               $newname = rand(100000, 1001238912).".".$name;
               File::delete(public_path('images/discussions/'.$d->images));
               $file->move('images/discussions' , $newname);
               $d->images = $newname;
               $d->title = $r->title;
               $d->channel_id = $r->channel_id;
               $d->category_id = $r->category_id;
               $d->content = $r->conten;
               $d->user_id = Auth::id();
               $d->save();
           }

           $d->title = $r->title;
           $d->channel_id = $r->channel_id;
           $d->category_id = $r->category_id;
           $d->content = $r->conten;
           $d->user_id = Auth::id();
           $d->save();

           Session::flash('Sukses','Topik berhasil di ubah');
           return redirect()->back();
    }

    public function show($id)
    {
           if(Discussion::find($id) == null)
           {
               return redirect()->route('home');
           }

           $discussion = Discussion::where('id' , $id)->first();
           $checkimages = $discussion->images > 0;
           $best_answer = $discussion->replies()->where('best_answer', 1)->first();
           $checkuser = Discussion::where('user_id' , Auth::id())->get();
           $replies = Reply::where('discussion_id',$discussion->id)->withCount('upvote')->orderBy('upvote_count','desc')->paginate(3);
           $upvoted = Upvote::where('user_id',Auth::id())->first();

           $checkuserview =  Totalview::where('discussion_id',$id)->where('user_id',Auth::id())->first();

           if($checkuserview == null){
               Totalview::create([
                   'discussion_id' => $discussion->id,
                   'user_id' => Auth::id()
               ]);
           }

           return view('pagesiswa.show')
                ->with('discussion' , $discussion)
                ->with('check_images' , $checkimages)
                ->with('replies' , $replies)
                ->with('best_answer' , $best_answer)
                ->with('check_user' , $checkuser)
                ->with('up',$upvoted);
    }

    public function reply(Request $request , $id)
    {
         $d =  Discussion::find($id);

         $reply = Reply::create([

             'user_id' => Auth::id(),
             'discussion_id' => $d->id,
             'conten' => $request->konten,

         ]);

        Session::flash('Sukses' , 'Berhasil menambah reply');
        return redirect()->back();
    }

    public function replythereply(Request $request , $iddiscussion , $idreply)
    {
        $d =  Discussion::find($iddiscussion);
        $r =  Reply::find($idreply);

        $reply = ReplyTheReply::create([

            'user_id' => Auth::id(),
            'discussion_id' => $d->id,
            'replies_id' => $r->id,
            'conten' => $request->konten,

        ]);

        Session::flash('success' , 'Reply Succesfuly created.');
        return redirect()->back();
    }

    public function best_answer($id)
    {
        $reply = Reply::find($id);
        $reply->best_answer = 1;
        $reply->save();

        Session::flash('success' , 'Reply mark best answer');
        return redirect()->back();
    }

    public function remove_best_answer($id)
    {
        $reply = Reply::find($id);
        $reply->best_answer = 0;
        $reply->save();

        Session::flash('success' , 'Remove best answer');
        return redirect()->back();
    }


    public function destroy($id)
    {
        Totalview::where('discussion_id',$id)->delete();
        ReportDiscussion::where('discussion_id',$id)->delete();
        $d = Discussion::where('id',$id)->first();
        File::delete(public_path('images/discussions/'.$d->images));
        $d->delete();

        session::flash('Sukses' , 'Berhasil menghapus topik.');
        return redirect()->route('home');
    }


}
