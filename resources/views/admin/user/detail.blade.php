@extends('admin.layoutsadmin.app')

@section('title', 'User')
@section('content')
    <div class="sidebarblock" style="margin-top: 20px">
        <div class="container" >
            <div class="row">
                <div class="col-md-12">
                    <div class="card" style="margin: 50px">
                        <div class="card-body">
                            <h2 style="text-align: center; margin-bottom: 30px;">Detail Anggota</h2>
                            <form class="form-horizontal">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                    <label for="full_name" class="col-md-4 control-label">Nama Lengkap</label>
                                    <div class="col-md-12">
                                        <input id="full_name" type="text" class="form-control" name="full_name" placeholder="{{$users->full_name}}" required autofocus readonly>

                                        @if ($errors->has('full_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Username</label>
                                    <div class="col-md-12">
                                        <input id="username" type="text" class="form-control" name="username" placeholder="{{ $users->username }}" required autofocus readonly>

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Address</label>
                                    <div class="col-md-12">
                                        <input id="address" type="text" class="form-control" name="address" placeholder="{{ $users->address }}" required autofocus readonly>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">No. Hp</label>
                                    <div class="col-md-12">
                                        <input id="phone" type="text" class="form-control" name="phone" placeholder="{{ $users->phone }}" required autofocus readonly>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="dob" class="col-md-4 control-label">Tanggal Lahir</label>
                                    <div class="col-md-12">
                                        <input id="dob" type="text" class="form-control" name="dob" placeholder="{{date('d-m-Y',strtotime($users->dob))}}"  required autofocus readonly>
                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="{{$users->email}}" required readonly>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                            </form>

                            <div class="card-header">
                                @if(Auth::user()->admin == 1)
                                    <form action="{{route('page.user.delete' , ['id' => $users -> id])}}" method="post">
                                        <input type="hidden" name="_token" value=" {{csrf_token()}}">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                                @if(Auth::user()->super_admin == 1)
                                        <a href="{{route('admin.store.admin' , ['id' => $users -> id])}}"> <button class="btn btn-info">Add To Admin</button></a>
                                        {{--<a href="{{route('superadmin.store.admin' , ['id' => $users -> id])}}"> <button class="btn btn-info">Add To Super Admin</button></a>--}}
                                @endif
                            </div>
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

