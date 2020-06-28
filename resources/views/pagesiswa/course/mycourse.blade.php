@extends('layoutssiswa.appkursussaya')
@section('title')
    <title>Kursus :: Kursus Saya</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-4">
                @forelse($cari as $c => $i)
                    <div class="card col-md-5 col-lg-5" style="width: 23rem; color: black ;background-color: white; margin-top: 20px; margin-right: 25px; border: 2px solid whitesmoke; box-shadow: 2px 2px 2px rgba(0,0,0,0.4)">
                        <img class="card-img-top" style="margin-top: 10px; width: 100%; height: 150px; border-radius: 15px;" src="{{asset('images/course/'.$i->package->image)}}">
                        <h4 class="card-title">{{$i->package->title}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{str_limit($i->package->channel->title,31)}}</h6>
                        {{--@if($i->task->status == 0)--}}
                        {{--@endif--}}
                        @if($i->payment_status == 0)
                            <p class="card-subtitle mb-2 text-muted" style="color: red">Belum Lunas</p>
                            <a href="https://api.whatsapp.com/send?phone=6282341777877" target="_blank"><button class="pull-left btn-xs btn-red">Info &nbsp;<i class="fa fa-question"></i></button></a>
                            <a href="{{route('mycourse.delete' , ['id'=>$i->id])}}"><button class="pull-right btn-xs btn-danger">Hapus</button></a>
                            <br><br>
                        @else
                            <?php $task = \App\Task::where('usercourse_id',$i->id)->first(); ?>
                            <p>Berakhir pada : @if($task->status == 0) {{date("d",strtotime($i->expired_date))}}, {{date("M-Y",strtotime($i->expired_date))}} @else - @endif</p>
                            {{--<p class="card-subtitle mb-2 text-muted" style="color: mediumseagreen">Sudah Lunas</p>--}}
                            <p class="pull-left">{{$i->package->video->count()}} Video <i class="fa fa-video-camera"></i></p><a href="{{route('watch.course' , ['id'=>$i->id])}}" class="pull-right btn-xs btn-info">Tonton <i class="fa fa-play"></i></a><br><br>
                        @endif
                    </div>
                @empty
                    <p style="text-align: center; margin-top: 20px">tidak ada kursus</p><br>
                    <p style="text-align: center"><a href="{{route('see.all.course')}}">Lihat semua kursus</a></p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('sweetalert')

    var bold = "0895413450905";

    @foreach($cari as $c => $i)
        $('#belumbayar{{$c+1}}').click(function (){

        {{--swal({--}}
            {{--title:"Info",--}}
            {{--text:"Silahkan hubungi admin untuk pembayaran via wa" + bold,--}}
            {{--icon:"info",--}}
        {{--});--}}

        swal("Info", "Silahkan hubungi admin untuk pembayaran via wa 0895413450905", "info");

        });
    @endforeach

    @if(Session::has('Sukses'))
        swal("Sukses", "{{Session::get('Sukses')}}", "success");
    @endif
    @if(Session::has('Gagal'))
        swal("Gagal", "{{Session::get('Gagal')}}", "error");
    @endif

@endsection

