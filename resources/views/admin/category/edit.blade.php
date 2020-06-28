@extends('admin.layoutsadmin.app')

@section('title', 'Kategori')

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
                  <h3 class="text-themecolor m-b-0 m-t-0">Edit Data Channels</h3>
              </div>
          </div>

          <div class="row">
              <div class="col-12" style="margin-top: 20px">
                  <div class="card">
                      <div class="card-body">
                          <form action="{{route('category.update' , ['category' => $category -> id])}}" method="post" class="form-material">
                              {{csrf_field()}}
                              {{method_field('PUT')}}
                              <div class="form-group">
                                  <h4 class="card-title center">Title</h4>
                              </div>
                              <div class="form-group">
                                  <input type="text" name="title" class="form-control form-control-line" value="{{$category->title}}">
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-success" type="submit">Save</button>
                              </div>
                              {{--<div class="form-group">--}}
                              {{--<label>Description</label>--}}
                              {{--<textarea class="form-control" rows="5"></textarea>--}}
                              {{--</div>--}}
                              {{--<div class="input-group">--}}
                              {{--<span class="input-group-addon">$</span>--}}
                              {{--<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">--}}
                              {{--<span class="input-group-addon">.00</span>--}}
                              {{--</div>--}}
                              {{--<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"form-group row"</span><span class="nt">&gt;</span>--}}
                              {{--<span class="nt">&lt;label</span> <span class="na">for=</span><span class="s">"example-number-input"</span> <span class="na">class=</span><span class="s">"col-2 col-form-label"</span><span class="nt">&gt;</span>Number<span class="nt">&lt;/label&gt;</span>--}}
                              {{--<span class="nt">&lt;div</span> <span class="na">class=</span><span class="s">"col-10"</span><span class="nt">&gt;</span>--}}
                              {{--<span class="nt">&lt;input</span> <span class="na">class=</span><span class="s">"form-control"</span> <span class="na">type=</span><span class="s">"number"</span> <span class="na">value=</span><span class="s">"42"</span> <span class="na">id=</span><span class="s">"example-number-input"</span><span class="nt">&gt;</span>--}}
                              {{--<span class="nt">&lt;/div&gt;</span>--}}
                              {{--<span class="nt">&lt;/div&gt;</span>--}}
                              {{--<div class="form-group">--}}
                              {{--<label>Input Select</label>--}}
                              {{--<select class="form-control">--}}
                              {{--<option>1</option>--}}
                              {{--<option>2</option>--}}
                              {{--<option>3</option>--}}
                              {{--<option>4</option>--}}
                              {{--<option>5</option>--}}
                              {{--</select>--}}
                              {{--</div>--}}
                              {{--<div class="form-group">--}}
                              {{--<label>File upload</label>--}}
                              {{--<div class="fileinput fileinput-new input-group" data-provides="fileinput">--}}
                              {{--<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>--}}
                              {{--<input type="hidden">--}}
                              {{--<input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div>--}}
                              {{--</div>--}}
                              {{--<div class="form-group">--}}
                              {{--<label>Helping text</label>--}}
                              {{--<input type="text" class="form-control form-control-line"> <span class="help-block text-muted"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span> --}}
                              {{--</div>--}}
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








