
            @extends('admin.layoutsadmin.app')

            @section('title', 'Anggota')

            @section('search-bar')
                <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                    <form class="app-search" action="{{route('page.search.user.admin')}}" method="GET">
                        {{csrf_field()}}
                        <input type="text" class="form-control" name="cari" id="cari" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a>
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
                            <h3 class="text-themecolor m-b-0 m-t-0">Daftar Anggota</h3>
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
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Alamat</th>
                                                <th>No. Hp</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Akun Dibuat Pada</th>
                                                <th>Detail</th>
                                             </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($user as $u => $i)
                                                <tr>
                                                    <th>{{$u+1}}</th>
                                                    <th>{{$i->full_name}}</th>
                                                    <th>{{$i->email}}</th>
                                                    <th>{{$i->username}}</th>
                                                    <th>{{$i->address}}</th>
                                                    <th>{{$i->phone}}</th>
                                                    <th>{{date('j-F-Y',strtotime($i->dob))}}</th>
                                                    <th>{{date('j-F-Y',strtotime($i->created_at))}}</th>
                                                    @if(Auth::user()->admin)
                                                    <th>
                                                        <form action="{{route('admin.user.detail' , ['id'=>$i->id])}}">
                                                            <button class="btn btn-info" type="submit">Detail</button>
                                                        </form>
                                                    </th>
                                                    @else
                                                        <th>
                                                            <form action="{{route('superadmin.user.detail' , ['id'=>$i->id])}}">
                                                                <button class="btn btn-info" type="submit">Detail</button>
                                                            </form>
                                                        </th>
                                                    @endif
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
            @section('sweetalert')
                @if(Session::has('Sukses'))
                    swal("Sukses", "{{Session::get('Sukses')}}", "success");
                @endif
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
