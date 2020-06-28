@extends('layoutssiswa.appkursus')
@section('title')
    <title>Kursus :: Tonton Video</title>
@endsection
@section('style')
    .framecontainer {
    position: relative;
    width: 620px;
    height: 415px;
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
    <!-- POST -->
    <div class="post" style="padding-left: 79px">
        <div class="topwrap">
            {{--<div class="userinfo pull-left">--}}
                {{--<p><span></span>UserNAME</p>--}}
                {{--<div class="avatar">--}}
                    {{--<img style="max-width: 70px; max-height: 70px;" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="" />--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="posttext">
                <h2>Tahap ke {{$v->step}} : {{$v->name}}</h2>
                <p>Kursus : {{$v->coursepackage->title}}</p><br>
                @php
                        $check_next = \App\Video::where('step','>',$v->step)->where('package_id',$v->coursepackage->id)->min('step');
                        $checkquiz = \App\Quiz::where('video_id',$v->id)->first();
                        if($checkquiz !== null){
                             $checkuserquiz = \App\UserQuiz::where('quiz_id',$checkquiz->id)->where('user_id',Auth::id())->first();
                        }
                        $cp = $v->coursepackage->id;
                        $uc = \App\UsersCourse::where('user_id',Auth::id())->where('package_id',$cp)->first();
                        $t = \App\Task::where('usercourse_id',$uc->id)->first();
                @endphp
                @if($p)
                    <p><a href="{{route('show.video' , ['id'=>$p,'idUc'=>$uc->id])}}"><i class="fa fa-arrow-left"></i> Sebelumnya &nbsp;&nbsp;</a>
                        @endif
                        @if(!$n)
                            @if(!$check_next)
                                @if($t->status == 0)
                                    <a href="{{route('task.show' , ['id'=>$uc->id])}}"><button style="margin-bottom: 10px;"  class="btn-xs btn-info">Kumpul Tugas Akhir</button></a>
                                @else
                                    <a href="{{route('users.certif' , ['id'=>$uc->id])}}"><button style="margin-top: 15px" class="btn-xs btn-info">Cetak Sertifikat &nbsp;<i class="fa fa-unlock-alt"></i></button><br></a>
                                @endif
                            @endif
                        @else
                            @if($checkquiz !== null)
                                @if($checkuserquiz !== null)
                                    @if($checkuserquiz->status == 1)
                                        <a href="{{route('show.video' , ['id'=>$n,'idUc'=>$uc->id])}}">Selanjutnya <i class="fa fa-arrow-right"></i></a>&nbsp;
                                    @elseif($checkuserquiz->status == 0)
                                        <a>Selanjutnya <i class="fa fa-lock"></i></a>
                                    @endif
                                @endif
                            @elseif($checkquiz == null)
                                @if($n)
                                    <a href="{{route('show.video' , ['id'=>$n,'idUc'=>$uc->id])}}">Selanjutnya <i class="fa fa-arrow-right"></i></a>&nbsp;
                                @endif
                            @endif
                        @endif
                        @if($checkquiz !== null)
                            @if($checkuserquiz !== null)
                                @if($checkuserquiz->status == 0)
                                    <a style="margin-left: 10px" href="{{route('othertask.show.test',['id'=>$checkuserquiz->id])}}"><button style="margin-bottom: 10px;"  class="btn-xs btn-info">Kumpul Tugas pada video {{$v->step}}</button></a>
                                @endif
                            @endif
                        @endif
                    </p>
                <div class="posttext">
                    <div style="max-width: 30px;">
                        <div class="framecontainer">
                            <iframe
                                    src="https://www.youtube.com/embed/{{$v->link}}?modestbranding=1&amp;rel=0&amp;iv_load_policy=3&amp;enablejsapi=1"
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
                    <div class="posttext">
                        <a href="{{route('user.report.video',['id'=>$v->id])}}" class="btn-sm btn-danger">Report</a>
                   </div>
                    <div class="clearfix"></div>
            </div>
            {{--<div class="postinfobot">--}}
                {{--<a href="{{route('user.report.video',['id'=>$v->id])}}" class="btn-sm btn-danger">Report</a>--}}
            {{--</div>--}}
            {{--<div class="clearfix"></div><br>--}}
        </div>
    </div>
    {{--<div class="post" style="margin-top: 10px">--}}
        {{--<!-- POST -->--}}
        {{--<form action="#" class="form" method="post">--}}
            {{--{{csrf_field()}}--}}
            {{--<div class="topwrap">--}}
                {{--<div class="userinfo pull-left">--}}
                {{--</div>--}}
                {{--<div class="posttext pull-left">--}}
                    {{--<div class="textwraper">--}}
                        {{--<div class="postreply">Reply </div>--}}
                        {{--<textarea name="konten"  placeholder="Type your message here"></textarea>--}}
                    {{--</div>--}}
                    {{--<div  style="margin-top: 15px;" class="pull-right postreply">--}}
                        {{--<div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>--}}
                        {{--<div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>--}}
                        {{--<div class="clearfix"></div>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="postinfobot">--}}
            {{--</div>--}}
        {{--</form>--}}
        {{--<!-- POST -->--}}
        {{--<div class="clearfix"></div>--}}
    {{--</div>--}}


    {{--<!-- POST -->--}}
    {{--<div style="margin-bottom: 10px" class="text-center text-uppercase text-muted content-divide mb-3">--}}
        {{--<span class="p-2">--}}
            {{--<br>--}}
                {{--Other Replies--}}
        {{--</span>--}}
    {{--</div>--}}


@endsection
