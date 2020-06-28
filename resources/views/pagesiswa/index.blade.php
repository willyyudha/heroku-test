@extends('layoutssiswa.appdiskusi')
@section('title')
    <title>Forum :: Home</title>
@endsection
@section('content')
    <br>
    <!-- POST -->
    @forelse($discussion as $d)
    <div class="post">
        <div class="wrap-ut pull-left">
            <div style="margin-top: 10px;" class="userinfo pull-left">
                <div class="avatar">
                    <p style="font-weight: bold; color: black">{{$d->user->username}}</p> <img style="width: 50px; height: 45px;" src="{{asset('images/avatar/'.$d->user->avatar)}}" alt="" />
                </div>
            </div>
            <div class="posttext pull-left">
                <h2><a href="{{route('discussions.show' , ['id' => $d ->id])}}">{{$d->title}}</a></h2>
                <p>{{str_limit($d->content , 70)}}</p>
                <span><a href="{{route('categories' , ['id'=>$d->categories->id])}}"><button style="color: black" class="btn-xs btn-info">{{$d->categories->title}}</button></a></span>&nbsp;
                <span><a href="{{route('discuss.channel.sort' , ['id'=>$d->channels->id])}}"><button style="color: black" class="btn-xs btn-info">{{$d->channels->title}}</button></a></span>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="pull-left">
            <div class="comments">
                <div class="commentbg">
                    {{$d->replies->count()}}
                    <div class="mark"></div>
                </div>
            </div>
            <div class="views"><i class="fa fa-eye"></i> {{$d->totalview->count()}}</div>
            <div class="time"><i class="fa fa-clock-o"></i>&nbsp;{{$d->created_at->toFormattedDateString()}}</div>
        </div>
        <div class="clearfix"></div>
    </div><!-- POST -->
    @empty
        <h3 style="text-align: center">Tidak Ada Data</h3>
    @endforelse
@endsection
@section('pagination')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                {{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
                <div class="pull-left">
                    <ul class="paginationforum">
                       <li><div class="hidden-xs">{{$discussion->links()}}</div></li>
                    </ul>
                </div>
                {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
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
