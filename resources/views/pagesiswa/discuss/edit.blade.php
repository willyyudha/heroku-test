@extends('layoutssiswa.appdiskusi')
@section('content')
    <!-- POST -->
    <br>
    <div class="post">
        <form action="{{route('discussion.update' , ['id'=>$d->id])}}" method="post" enctype="multipart/form-data" class="form newtopic">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <p style="font-style:oblique; font-weight: bold;">{{Auth::user()->username}}</p>
                        <img style="width: 50px; height: 45px;" src="{{asset('images/avatar/'.Auth::user()->avatar)}}" alt=""/>
                    </div>
                </div>
                <div class="posttext pull-left">
                    <div>
                        <input type="text" name="title" placeholder="Enter Topic Title" class="form-control" value="{{$d->title}}"/>
                    </div>

                    <LABEL>Channel</LABEL>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <select name="channel_id" id="channel"  class="form-control" >
                                @foreach($channels as $channel)
                                    <option @if($d->channels->id == $channel->id) selected @endif value="{{$channel->id}}">{{$channel->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <LABEL>Category</LABEL>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <select name="category_id" id="category"  class="form-control">
                                @foreach($categories as $category)
                                    {{--<option >{{$d->categories->title == $category->title ? : $category->title}}</option>--}}
                                    <option @if($d->categories->id == $category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div>
                        @if($ci)
                            <img src="{{asset('images/discussions/'.$d->images)}}" width="45%" height="auto">
                            <img type="hidden" name="hidden_image" value="{{$d->images}}">
                            @else
                            <h4>Tidak Ada Gambar</h4>
                        @endif
                    </div>
                    <div>Pilih Gambar</label>
                        <input type="file" id="image" name="image" onerror="{{asset('images/conference-icon.png')}}"/>
                    </div>
                    <br>
                    <div>
                        <textarea name="conten" id="desc" placeholder="Description"  class="form-control" >{{$d->content}}</textarea>
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
                    <div class="pull-left"><button type="submit" class="btn btn-primary">Simpan</button></div>
                    <div class="clearfix"></div>
                </div>


                <div class="clearfix"></div>
            </div>
        </form>
    </div><!-- POST -->


@endsection
@section('sweetalert')
    @if(Session::has('Sukses'))
        swal("Sukses", "{{Session::get('Sukses')}}", "success");
    @endif
@endsection