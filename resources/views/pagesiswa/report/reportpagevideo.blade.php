@extends('layoutssiswa.appkursus')
@section('content')
    <!-- POST -->
    <br>
    <div class="post">
        <form action="{{route('user.store.report.video',['id'=>$video->id])}}" class="form newtopic" method="GET"  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="topwrap">
                <div style="margin-left: 60px" class="posttext pull-left">
                    <div>
                        <h2>{{$video->name}}</h2>
                        <h5>Kursus {{$video->coursepackage->title}}</h5>
                    </div>
                    <br>
                    <div>
                        <textarea  name="reason" id="reason" placeholder="Tolong jelaskan alasan report video ini"  class="form-control" required autofocus></textarea>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">
                    <div class="pull-right"><button type="submit" class="btn btn-primary">Kirim</button></div>
                    <div class="clearfix"></div>
            </div>
        </form>
    </div><!-- POST -->
@endsection
@section('sweetalert')
    @if(Session::has('Sukses'))
        swal("Sukses", "{{Session::get('Sukses')}}", "success");
    @endif
    @if(Session::has('Gagal'))
        swal("Gagal", "{{Session::get('Gagal')}}", "error");
    @endif
@endsection