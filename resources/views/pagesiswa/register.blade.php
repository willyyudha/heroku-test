@extends('layoutssiswa.appdiskusi')
@section('content')


    <div class="sidebarblock" style="margin-top: 20px">
        <div class="container" >
            <div class="row">
                <div class="col-md-8">
                    <div class="card" style="margin: 100px">
                        <div class="card-body">


                            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('full_name') ? ' has-error' : '' }}">
                                    <label for="full_name" class="col-md-4 control-label">Nama Lengkap</label>

                                    <div class="col-md-6">
                                        <input id="full_name" type="text" class="form-control" name="full_name" value="{{ old('full_name') }}" required autofocus>

                                        @if ($errors->has('full_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <label for="avatar" class="col-md-4 control-label">Avatar</label>

                                    <div class="col-md-6">
                                        <label>Select Image</label>
                                        <input id="avatar" type="file" id="input-file-now-custom-1" name="avatar" onerror="{{asset('images/conference-icon.png')}}" required autofocus/>
                                        @if ($errors->has('avatar'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Alamat E-Mail</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                    <label for="username" class="col-md-4 control-label">Username</label>

                                    <div class="col-md-6">
                                        <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="address" class="col-md-4 control-label">Alamat</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                                    <label for="gender" class="col-md-4 control-label">Jenis Kelamin</label>

                                    <div class="col-md-6">
                                        <select name="gender" id="gender">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <label for="phone" class="col-md-4 control-label">No. Hp</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

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
                                        <input id="dob" type="date" class="form-control" name="dob" value="{{ old('full_name') }}" required autofocus>

                                        @if ($errors->has('dob'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            Daftar
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
