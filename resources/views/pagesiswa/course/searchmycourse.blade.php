@extends('layoutssiswa.appkursus')
@section('style')
    .swal-modal .swal-text{
         text-align: center !important;
         text-decoration-style: solid !important;
         color: black !important;
    }
@endsection
@section('content')
    <br>
    <!-- POST -->
    {{--<h2 style="text-align: center">Kursus Saya</h2>--}}
    {{--<div class="col-lg-4 search col-xs-12 col-sm-5 col-md-3">--}}
    {{--<div class="posttext wrap">--}}
    {{--<form action="{{route('diskusi.cari')}}" method="GET" class="form">--}}
    {{--<div class="pull-left txt"><input type="text" name="cari" value="{{old('cari')}}" class="form-control" placeholder="Cari Diskusi"></div>--}}
    {{--<div class="pull-left"><button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></div>--}}
    {{--<div class="clearfix"></div>--}}
    {{--</form>--}}
    {{--</div>--}}
    {{--</div>--}}

    <div class="pull-left" style="margin-bottom: 10px;">
        <div class="card-header">
            <form action="{{route('saya.kursus.cari')}}" method="GET" class="form">
                <div class="pull-left"><input type="text" name="cari" value="{{old('cari')}}" class="form-control" placeholder="Cari Kursus Saya"></div>&nbsp;
                <div class="pull-left">&nbsp;<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    <div class="clearfix"></div>

    @forelse($uc as $c => $i)
        <div class="card align-self-center col-md-5 col-sm-8" style="color: black ;background-color: white; margin-right: 10px">
            <div class="card-body">
                <h4 class="card-title">{{$i->package->title}}</h4>
                <h6 class="card-subtitle mb-2 text-muted">{{$i->package->channel->title}}</h6>
                <p class="card-text">{{str_limit($i->package->description , 30)}}</p>
                @if($i->payment_status == 0)
                    <button class="btn-xs btn-danger">Belum Bayar</button>
                    <button  style="margin-bottom: 15px; color: white" class="btn-xs btn-danger">Tonton <i class="fa fa-lock"></i></button>
                @elseif($i->payment_status == 1)
                    <button style="color: white; background-color: mediumseagreen; " class="btn-xs btn-green">Sudah Bayar</button>
                    <a href="{{route('watch.course' , ['id'=>$i->id])}}"><button style="margin-bottom: 15px; color: white" class="btn-xs btn-info">Tonton <i class="fa fa-play"></i></button></a>
                @endif
                @foreach($i->task as $c => $t)
                    @if($i->payment_status == 1)
                        @if($t->status == 0)
                            <button  class="pull-right btn-xs btn-red">Cetak Sertifikat &nbsp;<i class="fa fa-lock"></i></button>
                        @else
                            <a href="{{route('users.certif' , ['iduc'=>$i->id])}}"><button  class="pull-right btn-xs btn-red">Cetak Sertifikat &nbsp;<i class="fa fa-unlock-alt"></i></button></a><br>
                        @endif
                    @else
                        <button  id="belumbayar{{$c+1}}" class="pull-right btn-xs btn-red">Info &nbsp;<i class="fa fa-question"></i></button><br>
                    @endif
                @endforeach
            </div>
        </div>
    @empty
        <p style="text-align: center">tidak ada kursus</p><br>
    @endforelse
@endsection
@section('sweetalert')

    var bold = "0895413450905";

    @foreach($uc as $c => $i)
        $('#belumbayar{{$c+1}}').click(function (){

        swal(
        "Info", "Silahkan hubungi admin untuk pembayaran via wa 0895413450905", "info");

        });
    @endforeach
@endsection

{{--<script>--}}
    {{--$output = '<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #787878">\n' +--}}
        {{--'    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #787878">\n' +--}}
        {{--'        <br><br><br><br>\n' +--}}
        {{--'        <span style="font-size:50px; font-weight:bold">Certificate of Completion</span>\n' +--}}
        {{--'        <br><br>\n' +--}}
        {{--'        <span style="font-size:25px"><i>This is to certify that</i></span>\n' +--}}
        {{--'        <br><br>\n' +--}}
        {{--'        <span style="font-size:30px"><b>Putu Bagus Willie Yudha Maheswara</b></span><br/><br/>\n' +--}}
        {{--'        <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>\n' +--}}
        {{--'        <span style="font-size:30px"><b>Design</b></span> <br/><br/>\n' +--}}
        {{--'        <span style="font-size:25px"><i>dated</i></span><br>\n' +--}}
        {{--'        <span style="font-size:30px">Maret 21, 2020</span><br><br><br><br>\n' +--}}
        {{--'\n' +--}}
        {{--'        <span style="font-size:25px">Powered By</span><br>\n' +--}}
        {{--'        <span style="font-size:25px"><b>Yayasan Kampus Amerta Bakti</b></span>\n' +--}}
        {{--'    </div>\n' +--}}
        {{--'</div>'--}}
{{--</script>--}}