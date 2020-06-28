@extends('layoutssiswa.appkursus')
@section('title')
    <title>Kursus :: Semua Kursus</title>
@endsection
@section('content')
    {{--<div class="pull-left" style="margin-top: 10px;">--}}
        {{--<div class="card-header">--}}
            {{--<form action="{{route('kursus.cari')}}" method="GET" class="form">--}}
                {{--<div class="pull-left"><input style="width: 190px;" type="text" name="cari" value="{{old('cari')}}" class="form-control" placeholder="Cari Kursus"></div>&nbsp;--}}
                {{--<div class="pull-left">&nbsp;<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button></div>--}}
                {{--<div class="clearfix"></div>--}}
            {{--</form>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="clearfix"></div>--}}
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-4">
                @forelse($s as $kursus => $i)
                    <div class="card col-md-5 col-lg-5" style="width: 23rem; color: black ;background-color: white; margin-top: 20px; margin-right: 25px; border: 2px solid whitesmoke; box-shadow: 2px 2px 2px rgba(0,0,0,0.4)">
                        <img class="card-img-top" style="margin-top: 10px; width: 100%; height: 150px; border-radius: 15px;" src="{{asset('images/course/'.$i->image)}}">
                        <h4 class="card-title">{{$i->title}}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{str_limit($i->channel->title,31)}}</h6>
                        {{--<p class="card-text">{!! nl2br(e(str_limit($i->description , 100))) !!}</p>--}}
                        <p class="pull-left">Rp. {{number_format($i->price)}}</p><a href="{{route('show.course' , ['id'=>$i->id])}}" class="pull-right btn-xs btn-info">Detail</a><br>
                    </div>
                @empty
                    <p style="text-align: center; margin-top: 20px">tidak ada kursus</p><br>
                    {{--<p style="text-align: center"><a href="{{route('see.all.course')}}">Lihat semua kursus</a></p>--}}
                @endforelse
            </div>
        </div>
    </div>
@endsection
@section('pagination')
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xs-12">
                    {{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
                    <div class="pull-left">
                        <ul class="paginationforum">
                            <li><div class="hidden-xs">{{$s->links()}}</div></li>
                        </ul>
                    </div>
                    {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
@endsection
