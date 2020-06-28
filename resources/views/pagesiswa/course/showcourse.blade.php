@extends('layoutssiswa.appkursus')
@section('title')
    <title>Kursus :: Detail Kursus</title>
@endsection
@section('style')
    .framecontainer {
    position: relative;
    width: 100%;
    height: 0;
    padding-bottom: 56.25%;
    }
    .video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
@endsection
@section('content')
    <br>
    <div class="post beforepagination">
        <div class="topwrap">
            <div class="userinfo pull-left"></div>
            <div class="posttext pull-left">
                <h2>Kursus : {{$c->title}}</h2>
                @if($ci)
                <div class="blog-image">
                    <img src="{{asset('images/course/'.$c->image)}}" width="100%" height="350px">
                </div>
                @endif
                <h4>Deskripsi</h4>
                <p style="color: black">Kursus memiliki durasi waktu selama 1 bulan dan wajib di selesaikan dalam waktu yang sudah ditentukan.</p>
                <p style="word-break: break-word; color: black">{!! nl2br(e($c->description)) !!}</p>
                <h4>Harga</h4>
                <p style="word-break: break-word; color: black">Rp. {{number_format($c->price)}}</p>
                <h4>Preview</h4>
                <div class="framecontainer">
                <iframe
                        src="https://www.youtube.com/embed/{{$c->preview_link}}?modestbranding=1&amp;rel=0&amp;iv_load_policy=3&amp;enablejsapi=1"
                        allowfullscreen="allowfullscreen"
                        mozallowfullscreen="mozallowfullscreen"
                        msallowfullscreen="msallowfullscreen"
                        oallowfullscreen="oallowfullscreen"
                        webkitallowfullscreen="webkitallowfullscreen"
                        __idm_id__="467452929" class="video">
                </iframe>
                </div>
            </div>
        </div>
        <div class="postinfobot">
            @php
                $check1 = \Illuminate\Support\Facades\Auth::user()->super_admin;
                $check2 = \Illuminate\Support\Facades\Auth::user()->admin;
            @endphp
            @if($check1 == 1 || $check2 == 1)
            {{--<div class="next pull-right">--}}
                {{--<form action="{{route('prepay.course' , ['id'=>$c->id])}}" method="post">--}}
                    {{--{{csrf_field()}}--}}
                    {{--<button style="color: black" class="btn-xs btn-info" type="submit">Beli Kursus</button>--}}
                    {{--<a href="#"> <button style="color: black" class="btn-xs btn-info">Preview</button></a>--}}
                {{--</form>--}}
            {{--</div>--}}
            @else
                <div class="next pull-right">
                <form action="{{route('prepay.course' , ['id'=>$c->id])}}" method="post">
                {{csrf_field()}}
                <button style="color: black" class="btn-xs btn-info" type="submit">Beli Kursus</button>
                {{--<a href="#"> <button style="color: black" class="btn-xs btn-info">Preview</button></a>--}}
                </form>
                </div>
            @endif
            <div class="clearfix"></div>
        </div>
    </div>
@endsection
@section('pagination')
    <br>
@endsection
