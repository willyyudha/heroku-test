@extends('layouts.app')

@section('content')
    @foreach($v as $i => $x)
        <h1 style="text-align: center">{{$x->name}}</h1>
        @php echo
        $x->link
        @endphp
    @endforeach
@endsection
