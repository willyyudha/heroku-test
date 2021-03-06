@extends('layoutssiswa.appdiskusi')
@section('content')
    <br>
    <!-- POST -->
    @foreach($c as $death)
        <div class="post">
            <div class="wrap-ut pull-left">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <p style="font-style:oblique;font-weight: bold"><span>@</span>{{$death->user->username}}</p>
                        <img style="max-width: 70px; max-height: 70px;" src="{{asset('images/avatar/'.$death->user->avatar)}}" alt="" />
                    </div>
                    {{--<div class="icons">--}}
                        {{--<img src="{{asset('images/icon1.jpg')}}" alt="" /><img src="{{asset('images/icon4.jpg')}}" alt="" />--}}
                    {{--</div>--}}
                </div>&nbsp;
                <div class="posttext pull-left">
                    <h2><a href="{{route('discussions.show' , ['id' => $death ->id])}}">{{$death->title}}</a></h2>
                    <p>{{str_limit($death->content , 70)}}</p>
                    <span><button class="btn-xs">{{$death->categories->title}}</button></span>&nbsp;<span><button class="btn-xs">{{$death->channels->title}}</button></span>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class=" pull-left">
                <div class="comments">
                    <div class="commentbg">
                        {{$death->replies->count()}}
                        <div class="mark"></div>
                    </div>
                </div>
                {{--<div class="views"><i class="fa fa-eye"></i> 1,568</div>--}}
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
                        <li><div class="hidden-xs">{{$c->links()}}</div></li>
                    </ul>
                </div>
                {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection