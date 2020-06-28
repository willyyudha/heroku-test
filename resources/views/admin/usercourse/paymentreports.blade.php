@extends('admin.layoutsadmin.app')

@section('title', 'Log Pembelian')

@section('search-bar')
    <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
        <form class="app-search" action="{{route('page.search.reportpayments.superadmin')}}" method="get">
            {{csrf_field()}}
            <input type="text" id="cari" name="cari" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
        </form>
    </li>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Laporan Pembelian</h3>
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
                            <form class="pull-left" style="margin-bottom: 5px" action="{{route('page.search.reportpayments.superadmin')}}" method="get">
                                {{csrf_field()}}
                                <label style="margin-right: 55px">Tgl Awal</label><label>Tgl Akhir</label><br>
                                <input type="date" id="date" value="{{ old('date') }}" name="date"> <input type="date" value="{{ old('date2') }}" id="date2" name="date2"> <button>Cari</button>&nbsp;&nbsp;&nbsp; <a href="{{route('pdf.search.reportpayments.superadmin')}}">cetak pdf</a>
                                {{--<div class="row">--}}
                                {{--<div class="col-lg-6 col-sm-12">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label>Tgl Awal</label>--}}
                                        {{--<div class="input-group date">--}}
                                            {{--<div class="input-group-addon">--}}
                                                {{--<span class="glyphicon glyphicon-th"></span>--}}
                                            {{--</div>--}}
                                            {{--<input type="date" class="form-control datepicker" name="date" id="date">--}}
                                        {{--</div>--}}
                                        {{--<label>Tgl Akhir</label>--}}
                                        {{--<div class="input-group date">--}}
                                            {{--<div class="input-group-addon">--}}
                                                {{--<span class="glyphicon glyphicon-th"></span>--}}
                                            {{--</div>--}}
                                            {{--<input type="date" class="form-control datepicker" name="date2" id="date2">--}}
                                        {{--</div>--}}
                                        {{--<button style="margin-top: 5px;" class="btn-block btn-info" type="submit">Cari</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            </form>

                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kursus</th>
                                    <th>Harga</th>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Diterima Oleh</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($report as $u => $i)
                                    <tr>
                                        <th>{{$u+1}}</th>
                                        <th>{{$i->name}}</th>
                                        <th>{{$i->course}}</th>
                                        <th>Rp. {{number_format($i->total_price)}}</th>
                                        <th>{{date('j-F-Y', strtotime($i->payments_date))}}</th>
                                        <th>{{$i->approved_by}}</th>
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