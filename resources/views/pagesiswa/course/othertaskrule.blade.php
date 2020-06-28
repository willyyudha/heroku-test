@extends('layoutssiswa.appkursus')
@section('title')
    <title>Kursus :: Kumpul Tugas</title>
@endsection
@section('content')
    <div class="post beforepagination">
        <div class="topwrap" >
            <article style="margin-right: 30px; margin-left: 30px; margin-bottom: 30px; margin-top: 20px">
                <div id="post-93524" class="post-93524 hentry">
                    <div class="info-header">
                        <br>
                        <h1 class="entry-title">Ketentuan Tugas Kursus pada video {{$qz->quiz->video->name}}</h1>
                        <span class="year">
                    {{--<img src="{{asset('images/course/'.$uc->package->image)}}" width="100%" height="300px">--}}
                </span>
                    </div>
                    <div class="entry-content">
                        <div class="main-info"><div class="con">
                                <div class="l">
                                </div>
                                <div class="r">
                                    {{--<h2>Deskripsi Tugas Akhir {{$c->title}}</h2>--}}
                                    <div class="conx">
                                <span class="const">
                                    <h5 style="color: black;">Ketentuannya adalah sebagai berikut :  </h5>
                                    <p>{!! nl2br(e($qz->quiz->description)) !!}</p>
                                </span>
                                        @if($qz->file == null)
                                            <h3>Upload File</h3>
                                            <form action="{{route('othertask.custom.store' , ['id'=>$qz->id])}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}

                                                <input id="file" name="file" type="file" required autofocus>
                                                <button style="margin-top: 7px" class="btn-xs btn-info" type="submit">Kirim</button>
                                            </form>
                                        @else
                                            @if($qz->status == 1)
                                                <h3>File Anda</h3>
                                                <p>{{$qz->file}}</p>
                                                <a>
                                                    <button style="margin-top: 7px" class="btn-xs btn-danger" type="submit">Hapus <i class="fa fa-lock"></i></button>
                                                </a>
                                                @else
                                                <h3>File Anda</h3>
                                                <p>{{$qz->file}}</p>
                                                <a href="{{route('othertask.custom.delete',['id'=>$qz->id])}}">
                                                    <button style="margin-top: 7px" class="btn-xs btn-danger" type="submit">Hapus</button>
                                                </a>
                                            @endif
                                        @endif
                                    </div><br>
                                </div>
                            </div>
                        </div>
                        <div class="bixbox bxcl">
                            {{--<div class="releases">--}}
                            {{--<h2>List Video {{$c->title}}</h2>--}}
                            {{--</div>--}}
                            {{--<ul>--}}
                            {{--@foreach($v as $i)--}}
                            {{--<li>--}}
                            {{--<span class="lchx"> Tahap {{$i->step}}</span>--}}
                            {{--<span class="lchx">{{$i->name}}</span>--}}
                            {{--<span class="dt">--}}
                            {{--<a href="{{route('show.video' , ['id'=>$i->id])}}">--}}
                            {{--<i class="dashicons dashicons-controls-play"></i>--}}
                            {{--Nonton--}}
                            {{--</a>--}}
                            {{--</span>--}}
                            {{--</li>--}}
                            {{--@endforeach--}}
                            {{--</ul>--}}
                            {{--<h2>Tugas Akhir</h2>--}}
                            {{--<p><a href="{{route('course.finaltask' , ['id'=>$uc->id])}}">Kumpul Tugas Akhir</a></p>--}}
                            {{--<br>--}}
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </div>
@endsection
@section('sweetalert')
    @if(Session::has('Sukses'))
        swal("Sukses", "{{Session::get('Sukses')}}", "success");
    @endif
@endsection
@section('script')

    <script type="text/javascript">
        var revapi;

        jQuery(document).ready(function() {
            "use strict";
            revapi = jQuery('.tp-banner').revolution(
                {
                    delay: 15000,
                    startwidth: 1200,
                    startheight: 278,
                    hideThumbs: 10,
                    fullWidth: "on"
                });

        });	//ready

        // When the user_biasa scrolls down 20px from the top of the document, slide down the navbar
        window.onscroll = function() {scrollFunction()};

        function scrollFunction()
        {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-50px";
            }
        }
    </script>

@endsection