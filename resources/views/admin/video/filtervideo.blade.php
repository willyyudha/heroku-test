
@extends('admin.layoutsadmin.app')
@section('title', 'Tugas User')

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
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Daftar Video</h3>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    {{--<th>File</th>--}}
                                    {{--<th>Kursus</th>--}}
                                    <th>Total Video</th>
                                    {{--<th>No. Hp</th>--}}
                                    {{--<th>Detail</th>--}}
                                    <th>Lihat Video</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($pc as $u => $i)
                                    <tr>
                                        <th>{{$u+1}}</th>
                                        <th>{{$i->title}}</th>
                                        <th>{{str_limit($i->description,20)}}</th>
                                        {{--<th>@if($i->file == null) <p style="color: red">Belum Kumpul<p></p> @else <p style="color: dodgerblue">{{$i->file}}</p> @endif</th>--}}
                                        {{--<th>{{$i->discussions->report->count()}}</th>--}}
                                        {{--<th>{{$i->ucourse->user->email}}</th>--}}
                                        <th>{{$i->video->count()}}</th>
                                        {{--<th>{{$i->ucourse->user->phone}}</th>--}}
                                        <th><a href="{{route('video.index2' , ['id'=>$i->id])}}"><button class="btn-sm btn-info">Lihat</button></a></th>
                                        {{--<th><a href="{{route('taskuser.show',['id'=>$i->id])}}"><button class="btn-sm btn-info">Detail</button></a></th>--}}
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="9">
                                            <div class="card-body">
                                                <h3 style="text-align: center">Tidak Ada Data</h3>
                                            </div>
                                        </th>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

{{--@section('pagination')--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-lg-8 col-xs-12">--}}
{{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
{{--<div class="pull-left">--}}
{{--<ul class="pagination">--}}
{{--<li><div class="pagination-item">{{$c->links()}}</div></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
{{--<div class="clearfix"></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}

@section('script')


    <script src="/assets/admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/admin/plugins/bootstrap/js/popper.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/assets/admin/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/assets/admin/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/assets/admin/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/assets/admin/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/admin/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/assets/admin/js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="/assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="../../../../../cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="../../../../../cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="/assets/admin/plugins/styleswitcher/jQuery.style.switcher.js"></script>

@endsection




{{--<th style="margin-left: 20px"><a href="">Edit</a></th>--}}


{{--<th>--}}
{{--@if(Auth::user()->super_admin)--}}
{{--<form action="{{route('page.user.delete')}}" method="post">--}}
{{--{{csrf_field()}}--}}
{{--{{method_field('DELETE')}}--}}
{{--<button class="btn btn-danger" type="submit">Delete</button>--}}
{{--</form>--}}
{{--@endif--}}
{{--@if(!Auth::user()->super_admin)--}}
{{--<button class="btn btn-danger" type="submit">Just Super Admin Can Delete Admin</button>--}}
{{--@endif--}}
{{--</th>--}}
