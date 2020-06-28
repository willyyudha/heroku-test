@extends('layoutssiswa.appkursus')
@section('title')
    <title>Kursus :: List Video</title>
@endsection
@section('style')
    .swal-wide{
      width:450px !important;
      font-size: 15px !important;
      text-align: left !important;
      color: black;
    }
@endsection
@section('content')
    <div class="post beforepagination">
        <div class="topwrap" >
         <article style="margin-right: 30px; margin-left: 30px; margin-bottom: 30px; margin-top: 20px">
                <div id="post-93524" class="post-93524 hentry">
                    <div class="info-header">
                        <br>
                <h1 class="entry-title">Kursus {{$uc->package->title}}</h1>
                <span class="year">
                    <img src="{{asset('images/course/'.$uc->package->image)}}" width="100%" height="300px">
                </span>
            </div>
            <div class="entry-content">
                <div class="main-info"><div class="con">
                        <div class="l">
                        </div>
                        <div class="r">
                            <h4>Deskripsi</h4>
                            <div class="conx">
                                <span class="const">
                                    <p style="color: black">{!! nl2br(e($uc->package->description)) !!}</p>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-info"><div class="con">
                        <div class="l">
                        </div>
                        <div class="r">
                            <h4>Kursus Berakhir Pada</h4>
                            @php
                                #$now = \Carbon\Carbon::now();
                                $start_Date = \Carbon\Carbon::parse($uc->payment_dates);
                                $end_Date = \Carbon\Carbon::parse($uc->expired_date);
                                #$test = $now->between($star_Date,$end_Date);
                                $exprdate = $start_Date->addHours($end_Date->toDateString());
                            @endphp
                            <div class="conx">
                                <span class="const">
                                    <p style="color:black"> @if($f->status == 0) {{date("d",strtotime($end_Date))}}, {{date("M-Y",strtotime($end_Date))}} &nbsp; @endif @if($f->status == 1)--------- <a style="background-color: mediumseagreen" class="btn-xs">Lulus</a>@else <a style="background-color: orangered" class="btn-xs">Belum Lulus</a>@endif</p>
                                    {{--<p style="color: black">{{$exprdate->diffForHumans()}}</p>--}}
                                    @if($f->status == 0)
                                        <button  style="margin-top: 15px" class="btn-xs btn-danger">Cetak Sertifikat &nbsp;<i class="fa fa-lock"></i></button>&nbsp;&nbsp;<a id="ketentuan" >Baca ketentuan <i class="fa fa-question"></i></a><br>
                                    @else
                                        <a href="{{route('users.certif' , ['id'=>$f->id])}}"><button style="margin-top: 15px" class="btn-xs btn-info">Cetak Sertifikat &nbsp;<i class="fa fa-unlock-alt"></i></button><br></a>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div><br>
                <div class="bixbox bxcl">
                    <div class="releases">
                        <h4>List Video {{$uc->package->title}}</h4>
                    </div>
                    <table class="table table-bordered table-hover table-sm">
                        <tbody>
                        @foreach($v as $b => $i)
                            @php
                                $number = 1;
                                $checkquiz = \App\Quiz::where('video_id',$i->id)->first();
                                $pv = \App\PlayedVideo::where('video_id',$i->id)->where('usercourse_id',$uc->id)->first();
                                $pvAll = \App\PlayedVideo::where('video_id',$i->id)->where('usercourse_id',$uc->id)->get();
                                $numItems = count($v);
                                $pvCount = count($pvAll);
                                $checkindex = 0;
                                if($checkquiz !== null)
                                {
                                    $checkuserquiz = \App\UserQuiz::where('quiz_id',$checkquiz->id)->where('user_id',Auth::id())->first();
                                }
                            @endphp
                            @if($pv == null)
                                @if(!$b)
                                <tr>
                                <td><h6 style="color: black" class="mb-md-0 pt-md-1 pb-md-1">Tahap {{$i->step}} : {{$i->name}}</h6></td>
                                <td>
                                    <h6 class="mb-md-0 pt-md-1 pb-md-1 text-right">
                                        <div style="text-align: center">
                                            <a href="{{route('show.video' , ['id'=>$i->id,'idUc'=>$uc->id])}}">Play &nbsp;<i class="fa fa-play"></i></a>
                                        </div>
                                    </h6>
                                </td>
                                </tr>
                                @else
                                    <tr>
                                        <td><h6 style="color: black" class="mb-md-0 pt-md-1 pb-md-1">Tahap {{$i->step}} : {{$i->name}}</h6></td>
                                        <td>
                                            <h6 id="videoterkunci" class="mb-md-0 pt-md-1 pb-md-1 text-right">
                                                <div id="videoterkunci" style="text-align: center">
                                                    <a id="videoterkunci{{$b + 1}}">Play &nbsp;<i class="fa fa-lock"></i></a>
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td><h6 style="color: black" class="mb-md-0 pt-md-1 pb-md-1">Tahap {{$i->step}} : {{$i->name}}</h6></td>
                                    <td>
                                        <h6 class="mb-md-0 pt-md-1 pb-md-1 text-right">
                                            <div style="text-align: center">
                                                <a href="{{route('show.video' , ['id'=>$i->id,'idUc'=>$uc->id])}}">Play &nbsp;<i class="fa fa-play"></i></a>
                                            </div>
                                        </h6>
                                    </td>
                                </tr>
                                @if($checkquiz !== null)
                                    @if($checkquiz !== null)
                                        <tr>
                                            <td><h6 style="color: steelblue" class="mb-md-0 pt-md-1 pb-md-1">Tugas Kursus pada video tahap {{$b+1}}</h6></td>
                                            <td>
                                                <h6 class="mb-md-0 pt-md-1 pb-md-1 text-right">
                                                    <div style="text-align: center">
                                                        <p>Status : @if($checkuserquiz->status == 1) <span style="color: mediumseagreen">Lolos</span> @else <span style="color: red">Belum Lolos</span> @endif</p>
                                                        @if($checkuserquiz->status == 0)<a href="{{route('othertask.show.test',['id'=>$checkuserquiz->id])}}">Kumpul Tugas &nbsp;<i class="fa fa-file"></i></a>@endif
                                                    </div>
                                                </h6>
                                                <h6 class="mb-md-0 pt-md-1 pb-md-1 text-right">
                                                    <div style="text-align: center">
                                                        @if($checkuserquiz->status == 1) <a style="margin-top: 15px;" href="{{route('show.video' , ['id'=>$i->id+1,'idUc'=>$uc->id])}}"><p>Video selanjutnya <i class="fa fa-arrow-right"></i></p></a> @endif
                                                    </div>
                                                </h6>
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                                @if($pv !== null)
                                @if($loop->last)
                                    <tr>
                                        <td><h6 style="color: steelblue" class="mb-md-0 pt-md-1 pb-md-1">Tugas Akhir Kursus</h6></td>
                                        <td>
                                            <h6 class="mb-md-0 pt-md-1 pb-md-1 text-right">
                                                <div style="text-align: center">
                                                    <a href="{{route('task.show' , ['id'=>$uc->id])}}">Kumpul Tugas Akhir &nbsp;<i class="fa fa-file"></i></a>
                                                </div>
                                            </h6>
                                        </td>
                                    </tr>
                                @endif
                                @endif
                            @endif
                        @endforeach
                       </tbody>
                    </table>
                    {{--<ul>--}}
                        {{--@foreach($v as $b => $i)--}}
                            {{--@php--}}
                                {{--$checkquiz = \App\Quiz::where('video_id',$i->id)->first();--}}
                                {{--$pv = \App\PlayedVideo::where('video_id',$i->id)->where('usercourse_id',$uc->id)->first();--}}
                                {{--if($checkquiz !== null)--}}
                                {{--{--}}
                                    {{--$checkuserquiz = \App\UserQuiz::where('quiz_id',$checkquiz->id)->where('user_id',Auth::id())->first();--}}
                                {{--}--}}
                            {{--@endphp--}}
                            {{--@if($pv == null)--}}
                                {{--@if(!$b)--}}
                                    {{--<li>--}}
                                        {{--<span> Tahap {{$i->step}}</span>--}}
                                        {{--<span>{{$i->name}}</span>--}}
                                        {{--<span class="dt">--}}
                                        {{--<a href="{{route('show.video' , ['id'=>$i->id,'idUc'=>$uc->id])}}">--}}
                                        {{--Putar Video--}}
                                        {{--<i class="fa fa-play"></i>--}}
                                    {{--</a>--}}
                                    {{--</span>--}}
                                    {{--</li>--}}
                                {{--@else--}}
                                {{--<li>--}}
                                    {{--<span class="lchx"> Tahap {{$i->step}}</span>--}}
                                    {{--<span class="lchx">{{$i->name}}</span>--}}
                                    {{--<span class="dt">--}}
                                    {{--<a>--}}
                                    {{--Putar Video--}}
                                    {{--<i class="fa fa-lock"></i>--}}
                                    {{--</a>--}}
                                    {{--</span>--}}
                                {{--</li>--}}
                                {{--@endif--}}
                            {{--@else--}}
                                {{--<li>--}}
                                    {{--<span style="text-decoration:line-through"class="lchx"> Tahap {{$i->step}}</span>--}}
                                    {{--<span style="text-decoration:line-through"class="lchx">{{$i->name}}</span>--}}
                                    {{--<span class="dt">--}}
                                    {{--<a href="{{route('show.video' , ['id'=>$i->id,'idUc'=>$uc->id])}}">--}}
                                        {{--Putar Video--}}
                                        {{--<i class="fa fa-play"></i>--}}
                                    {{--</a>--}}
                                    {{--</span>--}}
                                {{--</li>--}}
                                {{--@if($checkquiz !== null)--}}
                                    {{--@if($checkquiz !== null)--}}
                                        {{--<li>Tugas Video {{$i->step}}<a style="margin-left: 10px"><button class="btn-xs btn-info">Kumpul Tugas</button></a></li>--}}
                                    {{--@endif--}}
                                {{--@endif--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                    <br>
                    {{--<h2>Tugas Akhir</h2>--}}
                    {{--@if($v->orderBy('created_at' , 'desc')->limit(1))--}}
                        {{--<p>a</p>--}}
                    {{--@endif--}}
                    {{--<a href="{{route('course.finaltask' , ['id'=>$uc->id])}}"><button class="btn-xs btn-info">Kumpul Tugas Akhir</button></a><br>--}}
                    {{--<br>--}}
                </div>
            </div>
        </div>
    </article>
     </div>
</div>
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
@section('customscript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection
@section('sweetalert')
    $('#ketentuan').click(function (){

    message =  "1. Sertifikat didapat jika sudah mengumpulkan tugas akhir. <br>";
    message2 = "2. Tugas  akhir dinyatakan sudah sesuai ketentuan oleh admin. <br>";
    message3 = "3. Tugas akhir dapat di kumpul melalui video yang berada di paling akhir. <br>";

    Swal.fire({
    icon: 'info',
    title: 'Info Syarat Cetak Sertifikat',
    html: message + message2 + message3,
    customClass: 'swal-wide',
    {{--footer: '<a href>Why do I have this issue?</a>'--}}
    })

    });


    @foreach($v as $b => $i)
    $('#videoterkunci{{$b+1}}').click(function (){
    message = "Video hanya bisa diputar melalui menu selanjutnya yang berada pada saat menonton video <br>";
    message2 = "Atau <br>";
    message3 = "Tugas yang anda kumpul masih dalam tahap pemeriksaan";

    Swal.fire({
    icon: 'info',
    title: 'Info',
    html: message + message2 + message3,
    customClass: 'swal-wide',
    {{--footer: '<a href>Why do I have this issue?</a>'--}}
    })

    });
    @endforeach
@endsection