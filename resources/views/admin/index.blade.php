@extends('admin.layoutsadmin.app')
@section('title', 'Dashboard')
@section('style')
<style>
    .row-striped:nth-of-type(odd){
        background-color: #efefef;
        border-left: 4px #000000 solid;
    }

    .row-striped:nth-of-type(even){
        background-color: #ffffff;
        border-left: 4px #efefef solid;
    }

    .row-striped {
        padding: 15px 0;
    }
</style>
@endsection
{{--@section('search-bar')--}}
    {{--<li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>--}}
        {{--<form class="app-search">--}}
        {{--<input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>--}}
    {{--</form>--}}
    {{--</li>--}}
{{--@endsection--}}
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    {{--<div class="row page-titles">--}}
        {{--<div class="col-md-5 col-8 align-self-center">--}}
            {{--<h3 class="text-themecolor m-b-0 m-t-0">Halaman Home</h3>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    {{--<div class="row">--}}
        {{--<div class="col-12">--}}
            {{--<div class="card">--}}
                {{--<div class="card-body">--}}
                    {{--<h4 style="text-align: center" class="card-title">--}}
                        {{--Selamat datang--}}
                        {{--@if(Auth::user()->super_admin == 1)--}}
                            {{--super admin--}}
                        {{--@endif--}}
                        {{--@if(Auth::user()->admin == 1)--}}
                            {{--admin--}}
                        {{--@endif--}}
                    {{--</h4>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
    <br>
    <div class="row row-striped">
        <div class="col-2 text-right">
            <h1 class="display-4"><span class="badge badge-secondary">{{\Carbon\Carbon::now()->day}}</span></h1>
            <h2>{{\Carbon\Carbon::now()->englishMonth}}</h2>
        </div>
        <div class="col-10">
            <h3 class="text-uppercase">
                @if(Auth::user()->admin == 1)
                    <strong>Selamat Datang Admin</strong>
                @else
                    <strong>Selamat Datang Super Admin</strong>
                @endif
            </h3>
            <ul class="list-inline">
                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{\Carbon\Carbon::now()->localeDayOfWeek}}</li>
                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> {{\Carbon\Carbon::now()->toTimeString()}}</li>
                {{--<li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Room 4019</li>--}}
            </ul>
            <p>Mulailah dari mana pun Anda berada.</p>
        </div>
    </div>

    <br>

    @if(Auth::user()->super_admin == 1)
    <div class="card-columns">
        <div class="card bg-light">
            <div class="card-body text-center">
                <p class="card-text">Jumlah Channel</p>
                <p><i class="mdi mdi-eye"></i> {{$channels->count()}}</p>
            </div>
        </div>
        <div class="card bg-light">
            <div class="card-body text-center">
                <p class="card-text">Jumlah Kategori</p>
                <p><i class="mdi mdi-eye"></i> {{$categories->count()}}</p>
            </div>
        </div>
        <div class="card bg-light">
            <div class="card-body text-center">
                <p class="card-text">Jumlah User</p>
                <p><i class="mdi mdi-eye"></i> {{$alluser->count()}}</p>
            </div>
        </div>
        <div class="card bg-light">
            <div class="card-body text-center">
                <p class="card-text">Jumlah Paket Kursus</p>
                <p><i class="mdi mdi-eye"></i> {{$package->count()}}</p>
            </div>
        </div>
        <div class="card bg-light">
            <div class="card-body text-center">
                <p class="card-text">Jumlah Laporan Pembelian</p>
                <p><i class="mdi mdi-eye"></i> {{$pc->count()}}</p>
            </div>
        </div>
    </div>

    {{--<div class="card-columns">--}}
        {{----}}
    {{--</div>--}}
    @else

        <div class="card-columns">
            <div class="card bg-light">
                <div class="card-body text-center">
                    <p class="card-text">Jumlah Report Diskusi</p>
                    <p><i class="mdi mdi-eye"></i> {{$r->count()}}</p>
                </div>
            </div>
            <div class="card bg-light">
                <div class="card-body text-center">
                    <p class="card-text">Jumlah Video</p>
                    <p><i class="mdi mdi-eye"></i> {{$v->count()}}</p>
                </div>
            </div>
            <div class="card bg-light">
                <div class="card-body text-center">
                    <p class="card-text">Jumlah User</p>
                    <p><i class="mdi mdi-eye"></i> {{$alluser->count()}}</p>
                </div>
            </div>
            <div class="card bg-light">
                <div class="card-body text-center">
                    <p class="card-text">Jumlah Kursus Lunas</p>
                    <p><i class="mdi mdi-eye"></i> {{$lunas->count()}}</p>
                </div>
            </div>
            <div class="card bg-light">
                <div class="card-body text-center">
                    <p class="card-text">Jumlah Kursus Belum Lunas</p>
                    <p><i class="mdi mdi-eye"></i> {{$belumlunas->count()}}</p>
                </div>
            </div>
            <div class="card bg-light">
                <div class="card-body text-center">
                    <p class="card-text">Jumlah Tugas</p>
                    <p><i class="mdi mdi-eye"></i> {{$t->count()}}</p>
                </div>
            </div>
        </div>

        {{--<div class="card-columns">--}}
            {{----}}
        {{--</div>--}}

    @endif


</div>
@endsection

@section('script')

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
@endsection