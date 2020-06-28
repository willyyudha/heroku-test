@extends('layoutssiswa.appdiskusi')
@section('title')
    <title>Forum :: Topik</title>
@endsection
@section('style')
    .imgcontainer {
    position: relative;
    width: 620px;
    height: 0;
    padding-bottom: 56.25%;
    }
    .imgdiscuss {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
@endsection
@section('content')
    <br>
    <!-- POST -->
    <div class="post beforepagination">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <p style=" color: black;font-weight: bold; color: black">{{$discussion->user->username}}</p>
                    <img style="width: 50px; height: 45px;" src="{{asset('images/avatar/'.$discussion->user->avatar)}}" alt="" />
                </div>
            </div>
            <div class="wrap-ut pull-left">
                <h1><span>{{$discussion->title}}</span></h1>
                <p style="color: black">{!! nl2br(e($discussion->content)) !!}</p>

                @if($check_images)
                    <div class="imgcontainer">
                        <img class="imgdiscuss" src="{{asset('images/discussions/'.$discussion->images)}}" width="700px" height="auto">
                    </div>
                @endif

            </div>
            <div class="clearfix"></div>
        </div><br>
        <div class="postinfobot">
            <div style="color: black" class="posted pull-left">
                <i style="color: black" class="fa fa-clock-o"></i>
                Posted : {{$discussion->created_at->diffForHumans()}}
            </div>
            <div class="post-tabs pull-right">
                {{--<form action="{{route('report' , ['id' => $discussion -> id])}}" method="post">--}}
                    {{--{{csrf_field()}}--}}
                    @if($discussion->user_id !== Auth::id())
                        <a href="{{route('report.page',['id'=>$discussion->id])}}"><button class="btn-xs btn-danger" type="submit">Report</button></a>
                    @endif
                {{--</form>--}}
                @if($discussion->user_id == Auth::id())
                    <a href="{{route('discuss.user.delete' , ['id'=>$discussion->id])}}"><button  class="btn-xs btn-danger">Delete</button></a>
                    <a href="{{route('discuss.user.edit' , ['id'=>$discussion->id])}}"><button class="btn-xs btn-info">Edit</button></a>
                @endif
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- POST -->

    <div class="post" style="margin-top: 10px; margin-bottom: 10px">
        <!-- POST -->
        <form action="{{route('discussions.reply' , ['id' => $discussion -> id])}}" class="form" method="post">
            {{csrf_field()}}
            <div class="topwrap">
                <div class="userinfo pull-left">
                </div>
                <div class="posttext pull-left">
                    <div class="textwraper">
                        <div style="color: black" class="postreply">Balas <span>@</span>{{$discussion->user->username}}</div>
                        <textarea name="konten" style="color: black" placeholder="Tulis balasan anda disini"></textarea>
                    </div>
                    <div  style="margin-top: 15px;" class="pull-right postreply">
                        {{--<div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>--}}
                        <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            {{--<div class="postinfobot">--}}

            {{--</div>--}}
        </form>
        <!-- POST -->
        <div class="clearfix"></div>
    </div>

    <div class="text-center text-uppercase text-muted content-divide mb-3">
        <span class="p-2">
            <br>
                Balasan Terbaik
        </span>
    </div>

    @if($best_answer)
    <!-- POST -->
    <div class="post" style="margin-top: 10px">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <p style="margin-left:10px; color: black; font-style:oblique;font-weight: bold; color: black">{{$best_answer->user->username}}</p>
                <div class="avatar">
                    <img style="width: 50px; height: 45px;" src="{{asset('images/avatar/'.$best_answer->user->avatar)}}" alt="" />
                </div>
            </div>
            <br>
            <div class="posttext pull-left">
                <p style="word-wrap: break-word; text-align: justify; color: black">
                    {{$best_answer->conten}}
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="postinfobot">
            <div class="likeblock pull-left">
                @if($best_answer->is_voted_by_user())
                    <a href="{{route('reply.downvote' , ['id'=>$best_answer->id])}}" class="down"><i class="fa fa-arrow-down"></i></a>
                @endif
                @if(!$best_answer->is_voted_by_user())
                    <a href="{{route('reply.upvote' , ['id'=>$best_answer->id])}}" class="up"><i class="fa fa-arrow-up"></i></a>
                @endif
            </div>
            @if(Auth::id() == $discussion->user->id)
            <div class="posted pull-left">
                <a href="{{route('remove.reply.bestanswer',['id'=>$best_answer->id])}}" class="fa fa-eraser"> Hapus balasan terbaik</a>
            </div>
            @endif
            <div class="postreply pull-right">
                <div class="pull-right" style="color: black">
                    <i class="fa fa-clock-o" style="margin-left: 5px;">&nbsp;Posted : {{$best_answer->created_at->today()->toDateString()}}</i>
                    <i class="fa fa-arrow-up" style="margin-left: 5px;">&nbsp; {{$best_answer->upvote->count()}} Upvote</i>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- POST -->
   @endif

    <div class="text-center text-uppercase text-muted content-divide mb-3">
        <span class="p-2">
            <br>
                Balasan Lainnya
        </span>
    </div>




    @foreach($replies as $r)
        @if(!$r->best_answer == 1 )
        <!-- POST -->
        <div class="post" style="margin-top: 10px">
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <p style="margin-left:10px; color: black; font-style:oblique;font-weight: bold; color: black">{{$r->user->username}}</p>
                    <div class="avatar">
                        <img style="width: 50px; height: 45px;" src="{{asset('images/avatar/'.$r->user->avatar)}}" alt="" />
                    </div>
                </div>
                <br>
                <div class="posttext pull-left">
                  <p style="word-wrap: break-word; color:black; text-align:justify">
                         {{$r->conten}}
                  </p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">
                <div class="likeblock pull-left">
                    @if($r->is_voted_by_user())
                    <a href="{{route('reply.downvote' , ['id'=>$r->id])}}" class="down"><i class="fa fa-arrow-down"></i></a>
                    @endif
                    @if(!$r->is_voted_by_user())
                    <a href="{{route('reply.upvote' , ['id'=>$r->id])}}" class="up"><i class="fa fa-arrow-up"></i></a>
                    @endif
                </div>
                @if(!$best_answer)
                    @if(Auth::id() == $discussion->user->id)
                    <div class="posted pull-left">
                    <a href="{{route('reply.bestanswer' , ['id'=>$r->id])}}" class="fa fa-star">Jadikan balasan terbaik</a>
                    </div>
                    @endif
                @endif
                <div class="postreply pull-right">
                    <div style="color: black" class="pull-right">
                        <i class="fa fa-clock-o" style="margin-left: 5px;">&nbsp;Posted : {{$r->created_at->today()->toDateString()}}</i>
                        <i class="fa fa-arrow-up" style="margin-left: 5px;">&nbsp; {{$r->upvote->count()}} Upvote</i>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    <!-- POST -->
    @endif
    @endforeach
@endsection
@section('pagination')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <div class="pull-left">
                    <ul class="paginationforum">
                        <li><div class="hidden-xs">{{$replies->links()}}</div></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
@section('sweetalert')
    @if(Session::has('Sukses'))
        swal("Sukses", "{{Session::get('Sukses')}}", "success");
    @endif
@endsection

