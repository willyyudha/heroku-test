@extends('layoutssiswa.appkursus')
@section('content')
    @forelse($cp as $kursus => $i)
        <div class="card col-md-5" style="width: 23rem; color: black ;background-color: white; margin-top: 20px; margin-right: 15px; border: 2px solid whitesmoke; box-shadow: 2px 2px 2px rgba(0,0,0,0.4)">
            <img class="card-img-top" style="margin-top: 10px; width: 100%; height: 150px; border-radius: 15px;" src="{{asset('images/course/'.$i->image)}}">
            <h4 class="card-title">{{$i->title}}</h4>
            <h6 class="card-subtitle mb-2 text-muted">{{$i->channel->title}}</h6>
            {{--<p class="card-text">{!! nl2br(e(str_limit($i->description , 100))) !!}</p>--}}
            <p class="pull-left">Rp. {{$i->price}}</p><a href="{{route('show.course' , ['id'=>$i->id])}}" class="pull-right btn-xs btn-info">Detail</a><br>
        </div>
    @empty
        <p style="text-align: center; margin-top: 10px">tidak ada kursus</p><br>
        <p style="text-align: center"><a href="{{route('see.all.course')}}">Lihat semua kursus</a></p>
    @endforelse
@endsection
@section('pagination')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                {{--<div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>--}}
                <div class="pull-left">
                    <ul class="paginationforum">
                        <li><div class="hidden-xs">{{$cp->links()}}</div></li>
                    </ul>
                </div>
                {{--<div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>--}}
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
