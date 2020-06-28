<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from wrappixel.com/demos/admin-templates/material-pro/material/index.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jan 2018 03:35:45 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/admin/images/favicon.png')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- chartist CSS -->
    <link href="{{asset('assets/admin/plugins/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/plugins/chartist-js/dist/chartist-init.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{asset('assets/admin/plugins/c3-master/c3.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{asset('assets/admin/css/colors/blue.css')}}" id="theme" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('style')
    @yield('customlink')
</head>

<body class="fix-header fix-sidebar card-no-border">
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" @if(Auth::user()->super_admin) href="{{route('superadmin.index')}}" @elseif(Auth::user()->admin) href="{{route('admin.index')}}" @endif>
                    <!-- Logo icon --><b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        {{--<img  alt="A" class="dark-logo" />--}}
                        <!-- Light Logo icon -->
                        <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="home" class="light-logo" />
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text -->
                    {{--<span style="color: white;">ADMIN PAGE</span> </a>--}}
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->
                        @yield('search-bar')
                    <!-- ============================================================== -->
                    {{--<!-- Messages -->--}}
                    {{--<!-- ============================================================== -->--}}
                    {{--<li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="mdi mdi-view-grid"></i></a>--}}
                        {{--<div class="dropdown-menu scale-up-left">--}}
                            {{--<ul class="mega-dropdown-menu row">--}}
                                {{--<li class="col-lg-3 col-xlg-2 m-b-30">--}}
                                    {{--<h4 class="m-b-20">Galeries</h4>--}}
                                    {{--<!-- CAROUSEL -->--}}
                                    {{--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">--}}
                                        {{--<div class="carousel-inner" role="listbox">--}}
                                            {{--<div class="carousel-item active">--}}
                                                {{--<div class="container"> <img class="d-block img-fluid" src="{{asset('assets/admin/images/big/img1.jpg')}}" alt="First slide"></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="carousel-item">--}}
                                                {{--<div class="container"><img class="d-block img-fluid" src="{{asset('assets/admin/images/big/img2.jpg')}}" alt="Second slide"></div>--}}
                                            {{--</div>--}}
                                            {{--<div class="carousel-item">--}}
                                                {{--<div class="container"><img class="d-block img-fluid" src="{{asset('assets/admin/images/big/img3.jpg')}}" alt="Third slide"></div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>--}}
                                        {{--<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>--}}
                                    {{--</div>--}}
                                    {{--<!-- End CAROUSEL -->--}}
                                {{--</li>--}}
                                {{--<li class="col-lg-3 m-b-30">--}}
                                    {{--<h4 class="m-b-20">Catatan Hari Ini</h4>--}}
                                    {{--<!-- Accordian -->--}}
                                    {{--<div id="accordion" class="nav-accordion" role="tablist" aria-multiselectable="true">--}}
                                        {{--<div class="card">--}}
                                            {{--<div class="card-header" role="tab" id="headingOne">--}}
                                                {{--<h5 class="mb-0">--}}
                                                    {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                                        {{--Tambakan semangatmu hari ini  <small>widhy</small>--}}
                                                    {{--</a>--}}
                                                {{--</h5> </div>--}}
                                            {{--<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">--}}
                                                {{--<div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="card">--}}
                                            {{--<div class="card-header" role="tab" id="headingOne">--}}
                                                {{--<h5 class="mb-0">--}}
                                                    {{--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">--}}
                                                        {{--Collapsible Group Item #1--}}
                                                    {{--</a>--}}
                                                {{--</h5> </div>--}}
                                            {{--<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">--}}
                                                {{--<div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high. </div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="card">--}}
                                            {{--<div class="card-header" role="tab" id="headingTwo">--}}
                                                {{--<h5 class="mb-0">--}}
                                                    {{--<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">--}}
                                                        {{--Collapsible Group Item #2--}}
                                                    {{--</a>--}}
                                                {{--</h5> </div>--}}
                                            {{--<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">--}}
                                                {{--<div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="card">--}}
                                            {{--<div class="card-header" role="tab" id="headingThree">--}}
                                                {{--<h5 class="mb-0">--}}
                                                    {{--<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">--}}
                                                        {{--Collapsible Group Item #3--}}
                                                    {{--</a>--}}
                                                {{--</h5> </div>--}}
                                            {{--<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">--}}
                                                {{--<div class="card-body"> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. </div>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                                {{--<li class="col-lg-3  m-b-30">--}}
                                    {{--<h4 class="m-b-20">Tambahkan Catatan</h4>--}}
                                    {{--<!-- Contact -->--}}
                                    {{--<form>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Title"> </div>--}}
                                        {{--<div class="form-group">--}}
                                            {{--<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Content"></textarea>--}}
                                        {{--</div>--}}
                                        {{--<button type="submit" class="btn btn-info">Tambahkan</button>--}}
                                    {{--</form>--}}
                                {{--</li>--}}
                                {{--<li class="col-lg-3 col-xlg-4 m-b-30">--}}
                                    {{--<h4 class="m-b-20">List style</h4>--}}
                                    {{--<!-- List style -->--}}
                                    {{--<ul class="list-style-none">--}}
                                        {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> You can give link</a></li>--}}
                                        {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Give link</a></li>--}}
                                        {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another Give link</a></li>--}}
                                        {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Forth link</a></li>--}}
                                        {{--<li><a href="javascript:void(0)"><i class="fa fa-check text-success"></i> Another fifth link</a></li>--}}
                                    {{--</ul>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<!-- ============================================================== -->--}}
                    {{--<!-- End Messages -->--}}
                    <!-- ============================================================== -->
                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-xl-0">
                    <!-- ============================================================== -->
                    <!-- Comment -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        {{--<a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>--}}
                            {{--<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>--}}
                        {{--</a>--}}
                        <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                            <ul>
                                <li>
                                    <div class="drop-title">Notifications</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-danger btn-circle"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Comment -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Messages -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        {{--<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>--}}
                            {{--<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>--}}
                        {{--</a>--}}
                        <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                            <ul>
                                <li>
                                    <div class="drop-title">You have 4 new messages</div>
                                </li>
                                <li>
                                    <div class="message-center">
                                        <!-- Message -->
                                        <a href="#">
                                            {{--<div class="user-img"> <img src="/images/admin/{{Auth::user()->name}}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>--}}
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <img src="/assets/admin/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <img src="/assets/admin/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="#">
                                            <div class="user-img"> <img src="/assets/admin/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                    </div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End Messages -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Profile -->
                    <!-- ============================================================== -->
                    <li class="nav-item dropdown">
                        {{--<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="/images/admin/{{Auth::user()->image}}" alt="user" class="profile-pic" /></a>--}}
                        <div class="dropdown-menu dropdown-menu-right scale-up">
                            <ul class="dropdown-user">
                                <li>
                                    <div class="dw-user-box">
                                        <div class="u-img">
                                            <img src="images/avatar/{{auth::user()->avatar}}" alt="test">
                                        </div>
                                        <div class="u-text">
                                            {{--<h4>{{Auth::user()->name}}</h4>--}}
                                            {{--<p class="text-muted" >{{Auth::user()->email}}</p>--}}
                                        </div>
                                    </div>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- User profile -->
            <div class="user-profile" style="background: url({{asset('/assets/admin/images/background/user-info.jpg')}}) no-repeat;">
                <!-- User profile image -->
                <div class="profile-img"> <img style="width: 50px; height: 50px;"src='{{asset("images/avatar/".Auth::user()->avatar)}}' alt="test" /> </div>
                <!-- User profile text-->
                <div class="profile-text"> <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{Auth::user()->username}}</a>
                     <div class="dropdown-menu animated flipInY">
                         <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();
                                    ">
                             <i class="fa fa-power-off"></i> Logout
                         </a>
                         <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                             {{csrf_field()}}
                         </form>
                     </div>
                </div>
            </div>
            <!-- End User profile text-->
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="nav-small-cap">PERSONAL</li>
                    @if(Auth::user()->super_admin == 1)
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Master Data</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('channels.create')}}">Tambah Chanel</a></li>
                                <li><a href="{{route('channels.index')}}">Daftar Chanel</a></li>
                                <li><a href="{{route('category.create')}}">Tambah Kategori</a></li>
                                <li><a href="{{route('category.index')}}">Daftar Kategori</a></li>
                                {{--<li><a href="{{route('packagecourse.create')}}">Tambah Paket Kursus</a></li>--}}
                                {{--<li><a href="{{route('packagecourse.index')}}">Daftar Paket Kursus</a></li>--}}
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-page-variant"></i><span class="hide-menu">Kursus</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('course.reports.payments')}}">Laporan Pembelian</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-human"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('superadmin.viewadmin')}}">Data Admin</a></li>
                                @if(Auth::user()->admin)
                                <li><a href="{{route('page2.admin.userlist')}}">Data Anggota</a></li>
                                @else
                                <li><a href="{{route('page.superadmin.userlist')}}">Data Anggota</a></li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    @if(Auth::user()->admin == 1)
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-rocket"></i><span class="hide-menu">Paket Kursus</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('packagecourse.create')}}">Tambah Paket Kursus</a></li>
                                <li><a href="{{route('packagecourse.index')}}">Daftar Paket Kursus</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-disqus"></i><span class="hide-menu">Report Diskusi</span></a>
                            <ul aria-expanded="false" class="collapse">
                                {{--<li><a href="{{route('page.viewdiscuss')}}">Data Diskusi</a></li>--}}
                                <li><a href="{{route('page.viewdiscuss')}}">Data Report Diskusi</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-file-video"></i><span class="hide-menu">Report Video</span></a>
                            <ul aria-expanded="false" class="collapse">
                                {{--<li><a href="{{route('page.viewdiscuss')}}">Data Diskusi</a></li>--}}
                                <li><a href="{{route('page.report.video.index')}}">Data Report Video</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-video"></i><span class="hide-menu">Video</span></a>
                            <ul aria-expanded="false" class="collapse">
                                {{--<li><a href="{{route('page.viewdiscuss')}}">Data Diskusi</a></li>--}}
                                <li><a href="{{route('video.filter.page')}}">Data Video</a></li>
                                <li><a href="{{route('video.create')}}">Tambah Video</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-human"></i><span class="hide-menu">User</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('page2.admin.userlist')}}">Data Anggota</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cash"></i><span class="hide-menu">Pembayaran</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('notpayment.index')}}">Belum Bayar</a></li>
                                <li><a href="{{route('havepayment.index')}}">Sudah Bayar</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-tasks"></i><span class="hide-menu">Tugas Kursus</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('othertaskuser.index2')}}">Lolos</a></li>
                                <li><a href="{{route('othertaskuser.index3')}}">Belum Lolos</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-file-word-o"></i><span class="hide-menu">Tugas Akhir</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('taskuser.index2')}}">Lolos</a></li>
                                <li><a href="{{route('taskuser.index3')}}">Belum Lolos</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
    {{--<div class="sidebar-footer">--}}
    {{--<!-- item--><a href="#" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>--}}
    {{--<!-- item--><a href="#" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>--}}
    {{--<!-- item--><a href="#" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> </div>--}}
    <!-- End Bottom points-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
    @yield('content')
    @yield('pagination')
    <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2019 Kampus Amerta Bakti Admin </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->

<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('assets/admin/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('assets/admin/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('assets/admin/js/sidebarmenu.js')}}"></script>
<!--stickey kit -->
<script src="{{asset('assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>

<!--Custom JavaScript -->
<script src="{{asset('assets/admin/js/custom.min.js')}}"></script>
<!-- ============================================================== -->
<!-- This page plugins -->
<!-- ============================================================== -->
<!-- chartist chart -->
<script src="{{asset('assets/admin/plugins/chartist-js/dist/chartist.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
<!--c3 JavaScript -->
<script src="{{asset('assets/admin/plugins/d3/d3.min.js')}}"></script>
<script src="{{asset('assets/admin/plugins/c3-master/c3.min.js')}}"></script>
<!-- Chart JS -->
<script src="{{asset('assets/admin/js/dashboard1.js')}}"></script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
<script src="{{asset('assets/admin/plugins/styleswitcher/jQuery.style.switcher.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @yield('sweetalert');
</script>


</body>


<!-- Mirrored from wrappixel.com/demos/admin-templates/material-pro/material/index.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 20 Jan 2018 03:37:22 GMT -->
</html>
