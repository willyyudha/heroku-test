
            @extends('admin.layoutsadmin.app')

            @section('title', 'Diskusi')

            @section('search-bar')
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search" action="{{route('search.report.discuss')}}" method="get">
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
                            <h3 class="text-themecolor m-b-0 m-t-0">Data Report Diskusi</h3>
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
                                    {{--<h4 class="card-title">Daftar Report</h4>--}}
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Pelapor</th>
                                                <th>Alasan</th>
                                                <th>Judul Diskusi</th>
                                                <th>Kategori</th>
                                                <th>Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($report_discuss as $t => $r)
                                                <tr>
                                                    <th>{{$t+1}}</th>
                                                    <th>{{$r->user->full_name}}</th>
                                                    <th>{{str_limit($r->reason,15)}}</th>
                                                    <th>{{$r->discussion->title}}</th>
                                                    <th>{{$r->discussion->categories->title}}</th>
                                                    <th>
                                                        <a class="btn btn-info" href="{{route('report.discuss.detail' , ['discussId'=>$r->discussion->id,'reportId'=>$r->id])}}">Detail</a>
                                                    </th>
                                                </tr>
                                            @empty
                                                <th style="text-align: center" colspan="6">Tidak Ada Report</th>
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
                <!-- Style switcher -->@section('sweetalert')
                @if(Session::has('Sukses'))
                    swal("Sukses", "{{Session::get('Sukses')}}", "success");
                @endif
            @endsection
                <!-- ============================================================== -->
                <script src="/assets/admin/plugins/styleswitcher/jQuery.style.switcher.js"></script>

            @endsection

