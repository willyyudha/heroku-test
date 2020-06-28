@extends('layoutssiswa.appdiskusi')
@section('title')
    <title>Forum :: Edit Profile Saya</title>
@endsection
@section('content')


    <div class="sidebarblock" style="margin-top: 20px">
        <div class="container" >
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="margin: 50px">
                        <div class="card-body">
                            <h2 style="text-align: center; margin-bottom: 30px;">Profil Saya</h2>
                            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('user.update' , ['id' => $finduser -> id]) }}">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                    <label for="full_name" class="col-md-4 control-label">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input id="full_name" type="text" class="form-control" name="full_name" value="{{$finduser->full_name}}" required autofocus>
                                        @if ($errors->has('full_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Username</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username" value="{{ $finduser->username }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Avatar Image</label>
                                    <div class="col-md-6">
                                        <img src="{{asset('images/avatar/'.$finduser->avatar)}}" class="col-md-4 control-label">
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label class="col-md-4 control-label"></label>
                                    <div class="col-md-6">
                                        <input type="file" name="avatar" id="avatar">
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>



                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Address</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control" name="address" value="{{ $finduser->address }}" required autofocus>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">No. Hp</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ $finduser->phone }}" required autofocus>

                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                    <label for="dob" class="col-md-4 control-label">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        {!! "<input id='dob' type='date' class='form-control' name='dob' value='".date('Y-m-d',strtotime($finduser->dob))."' required>" !!}
                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('dob') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{$finduser->email}}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <a href="{{route('user.show' , ['id'=>$finduser->id])}}">
                                        <button type="button" class="btn btn-danger">
                                          Batal
                                        </button>
                                        </a>
                                    </div><br><br>
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan Perubahan
                                        </button>
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
