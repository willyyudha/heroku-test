@extends('layoutssiswa.appdiskusi')
@section('title')
    <title>Forum :: Buat Topik Baru</title>
@endsection
@section('content')
    <!-- POST -->
    <br>
    <div class="post">
        <form action="{{route('discussions.store')}}" class="form newtopic" method="post"  enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="topwrap">
                {{--<div class="userinfo pull-left">--}}
                    {{--<div class="avatar">--}}
                        {{--<p style=" color: black; font-style:oblique;font-weight: bold; color: black">{{Auth::user()->username}}</p>--}}
                        {{--<img style="width: 50px; height: 45px;" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt="" />--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div style="margin-left: 60px" class="posttext pull-left">
                    <div>
                        <input type="text" name="title" placeholder="Enter Topic Title" class="form-control" />
                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <LABEL>Channel</LABEL>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <select name="channel_id" id="channel"  class="form-control" >
                                @foreach($channels as $channel)
                                <option value="{{$channel->id}}">{{$channel->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @if ($errors->has('channel_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('channel_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <br>
                    <LABEL>Category</LABEL>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <select name="category_id" id="category"  class="form-control" >
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div>
                        <label>Select Image</label>
                        <input type="file" id="input-file-now-custom-1" name="images" onerror="{{asset('images/conference-icon.png')}}"/>
                    </div>
                    <br>
                    <div>
                        <textarea name="conten" id="desc" placeholder="Description"  class="form-control" ></textarea>
                        @if ($errors->has('conten'))
                            <span class="help-block">
                                <strong>{{ $errors->first('conten') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">

                {{--<div class="notechbox pull-left">--}}
                    {{--<input type="checkbox" name="note" id="note" class="form-control" />--}}
                {{--</div>--}}

                {{--<div class="pull-left">--}}
                    {{--<label for="note"> Email me when some one post a reply</label>--}}
                {{--</div>--}}

                <div class="pull-right postreply">
                    {{--<div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>--}}
                    <div class="pull-left"><button type="submit" class="btn btn-primary">Kirim</button></div>
                    <div class="clearfix"></div>
                </div>


                <div class="clearfix"></div>
            </div>
        </form>
    </div><!-- POST -->


@endsection
@section('sweetalert')
    @if(Session::has('Sukses'))
        swal("Sukses", "Anda telah menambah topik baru", "success");
    @endif
@endsection
