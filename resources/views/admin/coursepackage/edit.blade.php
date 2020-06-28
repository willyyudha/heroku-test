@extends('admin.layoutsadmin.app')

@section('title', 'Paket Kursus')

@section('style')
    <style>
        .framecontainer {
            position: relative;
            width: 100%;
            height: 145px;
            padding-bottom: 56.25%;
        }
        .videoyt {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('link')
    <link href="/assets/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page CSS -->
    <link href="/assets/admin/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/plugins/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/admin/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="/assets/admin/plugins/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/admin/plugins/dropify/dist/css/dropify.min.css">
    <!-- Custom CSS -->
    <link href="/assets/admin/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/assets/admin/css/colors/blue.css" id="theme" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-5 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Ubah Data Kursus</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12" style="margin-top: 20px">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('packagecourse.update' , ['id'=>$cp->id])}}" method="post" enctype="multipart/form-data" class="form-material">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="form-group">
                                <h4 class="card-title center">Judul</h4>
                            </div>
                            <div class="form-group">
                                <input type="text" id="title" name="title" value="{{$cp->title}}" class="form-control form-control-line" required autofocus>
                            </div>
                            <div class="form-group">
                                <h4 class="card-title center">Channel</h4>
                            </div>
                            <div class="form-group">
                                <select id="channel" name="channel">
                                    @foreach($c as $i)
                                        <option @if($i->id == $cp->channels_id) selected @endif value="{{$i->id}}">{{$i->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <h4 class="card-title center">Waktu Pengerjaan Kursus</h4>
                            </div>
                            <div class="form-group">
                                <select id="month_expired" name="month_expired">
                                    <option @if($cp->month_expired) selected @endif value="1"> 1 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="2"> 2 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="3"> 3 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="4"> 4 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="5"> 5 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="6"> 6 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="7"> 7 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="8"> 8 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="9"> 9 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="10">10 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="11">11 bulan</option>
                                    <option @if($cp->month_expired) selected @endif value="12">12 bulan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <h4 class="card-title center">Harga</h4>
                            </div>
                            <div class="form-group">
                                <input type="text" id="price" name="price" value="{{$cp->price}}" class="form-control form-control-line" required autofocus>
                            </div>
                            <div class="form-group">
                                <h4 class="card-title center">Deskripsi</h4>
                            </div>
                            <div class="form-group">
                                <textarea id="descript" name="descript" rows="10" cols="100" required autofocus>{{$cp->description}}</textarea>
                                {{--<input type="text" id="descript" name="descript" value="{{$cp->description}}" class="form-control form-control-line">--}}
                            </div>
                            <div class="form-group">
                                <h4 class="card-title center">Link Preview</h4>
                            </div>
                            <div class="form-group">
                                <div class="framecontainer">
                                    <iframe
                                            src="https://www.youtube.com/embed/{{$cp->preview_link}}?modestbranding=1&amp;rel=0&amp;iv_load_policy=3&amp;enablejsapi=1"
                                            allowfullscreen="allowfullscreen"
                                            mozallowfullscreen="mozallowfullscreen"
                                            msallowfullscreen="msallowfullscreen"
                                            oallowfullscreen="oallowfullscreen"
                                            webkitallowfullscreen="webkitallowfullscreen"
                                            __idm_id__="467452929" class="videoyt">

                                    </iframe>
                                </div><br>
                                <textarea style="margin-bottom: 10px; width: 100%" id="link" name="link" rows="10" cols="100">{{$cp->preview_link}}</textarea>
                            </div>
                            <div class="form-group">
                                <h4 class="card-title center">Foto</h4>
                            </div>
                            <div class="form-group">
                                <input type="file" id="image" name="image"  class="form-control form-control-line">
                            </div>
                            <div class="form-group">
                                <img src="{{asset('images/course/'.$cp->image)}}" width="30%" height="auto" >
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Simpan</button>
                            </div>
                        </form>
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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="/assets/admin/plugins/switchery/dist/switchery.min.js"></script>
    <script src="/assets/admin/plugins/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
    <script src="/assets/admin/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <script src="/assets/admin/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/admin/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/admin/plugins/multiselect/js/jquery.multi-select.js"></script>

    <script>
        jQuery(document).ready(function() {
            // Switchery
            var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });
            // For select 2
            $(".select2").select2();
            $('.selectpicker').selectpicker();
            //Bootstrap-TouchSpin
            $(".vertical-spin").TouchSpin({
                verticalbuttons: true,
                verticalupclass: 'ti-plus',
                verticaldownclass: 'ti-minus'
            });
            var vspinTrue = $(".vertical-spin").TouchSpin({
                verticalbuttons: true
            });
            if (vspinTrue) {
                $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
            }
            $("input[name='tch1']").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%'
            });
            $("input[name='tch2']").TouchSpin({
                min: -1000000000,
                max: 1000000000,
                stepinterval: 50,
                maxboostedstep: 10000000,
                prefix: '$'
            });
            $("input[name='tch3']").TouchSpin();
            $("input[name='tch3_22']").TouchSpin({
                initval: 40
            });
            $("input[name='tch5']").TouchSpin({
                prefix: "pre",
                postfix: "post"
            });
            // For multiselect
            $('#pre-selected-options').multiSelect();
            $('#optgroup').multiSelect({
                selectableOptgroup: true
            });
            $('#public-methods').multiSelect();
            $('#select-all').click(function() {
                $('#public-methods').multiSelect('select_all');
                return false;
            });
            $('#deselect-all').click(function() {
                $('#public-methods').multiSelect('deselect_all');
                return false;
            });
            $('#refresh').on('click', function() {
                $('#public-methods').multiSelect('refresh');
                return false;
            });
            $('#add-option').on('click', function() {
                $('#public-methods').multiSelect('addOption', {
                    value: 42,
                    text: 'test 42',
                    index: 0
                });
                return false;
            });
            $(".ajax").select2({
                ajax: {
                    url: "https://api.github.com/search/repositories",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        // parse the results into the format expected by Select2
                        // since we are using custom formatting functions we do not need to
                        // alter the remote JSON data, except to indicate that infinite
                        // scrolling can be used
                        params.page = params.page || 1;
                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                escapeMarkup: function(markup) {
                    return markup;
                }, // let our custom formatter work
                minimumInputLength: 1,
                templateResult: formatRepo, // omitted for brevity, see the source of this page
                templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
            });
        });


    </script>
    <script src="/assets/admin/plugins/dropify/dist/js/dropify.min.js"></script>
    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
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








