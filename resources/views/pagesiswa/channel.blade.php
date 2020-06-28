@extends('layoutssiswa.appdiskusi')
@section('content')
    <br>
    <!-- POST -->
    @foreach($d as $death)
    <div class="post">
        <div class="wrap-ut pull-left">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <p style="font-style:oblique;font-weight: bold"><span>@</span>{{$death->user->username}}</p>
                <img style="max-width: 70px; max-height: 70px;" src="{{asset('images/avatar/'.$death->user->avatar)}}" alt="" />
                </div>
            </div>&nbsp;
            <div class="posttext pull-left">
                <h2><a href="{{route('discussions.show' , ['id' => $death ->id])}}">{{$death->title}}</a></h2>
                <p>{{str_limit($death->content , 70)}}</p>
                <span><button class="btn-xs">{{$death->categories->title}}</button></span>&nbsp;<span><button class="btn-xs">{{$death->channels->title}}</button></span>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="pull-left">
            <div class="comments">
                <div class="commentbg">
                    {{$death->replies->count()}}
                    <div class="mark"></div>
                </div>
            </div>
            <div class="time"><i class="fa fa-clock-o"></i>{{$death->created_at->diffForHumans()}}</div>
        </div>
        <div class="clearfix"></div>
    </div><!-- POST -->
    @endforeach
@endsection
@section('pagination')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                {{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
                <div class="pull-left">
                    <ul class="paginationforum">
                       <li><div class="hidden-xs">{{$d->links()}}</div></li>
                    </ul>
                </div>
                {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection