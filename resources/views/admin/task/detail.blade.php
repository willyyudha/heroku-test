@extends('admin.layoutsadmin.app')

@section('title', 'Diskusi')


@section('content')

    <div class="container-fluid">

        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Detail Tugas Akhir  > {{$tu->ucourse->user->full_name}}</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="card">
                    <div  style="text-align: center; margin-bottom: 8px;" class="card-header">
                        Kursus {{$tu->ucourse->package->title}}
                    </div>
                    <div class="card-body">
                        <h4>Deskripsi Tugas</h4>
                            <p>{!! nl2br(e($tu->ucourse->package->final_taskdescript)) !!}</p>
                        <h4>File</h4>
                        @if($tu->file == null)
                            <p style="color: red;">Belum Kumpul</p>
                        @else
                            <p>{{$tu->file}}&nbsp;&nbsp;<a href="{{route('download.file.task' , ['id'=>$tu->id])}}"><button class="btn-sm btn-info">Download</button></a></p>
                        @endif

                        <h4>Status</h4>
                        <form action="{{route('status.change' , ['id'=>$tu->id])}}" method="get">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <select id="status" name="status">
                                <option @if($tu->status == 1) selected @endif  value="1">Lolos</option>
                                <option @if($tu->status == 0) selected @endif value="0">Belum Lolos</option>
                            </select>
                            &nbsp;&nbsp;<button type="submit" class="btn-sm btn-info">Simpan Status</button>
                        </form>
                    </div>
                </div>
                {{--<div style="margin-top: 2px;" class="card-footer">--}}
                    {{--<form action="{{route('report.diskusi.delete' , ['discussId'=>$detail->id , 'reportId'=>$report->id])}}" method="post">--}}
                        {{--{{csrf_field()}}--}}
                        {{--{{method_field('DELETE')}}--}}
                        {{--<button type="submit" class="btn btn-danger btn-small">Hapus Diskusi</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
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