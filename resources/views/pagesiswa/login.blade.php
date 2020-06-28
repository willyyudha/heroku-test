@extends('layoutssiswa.appdiskusi')
@section('content')


    <div class="sidebarblock" style="margin-top: 20px; justify-content: center">
    <div class="container" >
        <div class="row">
            <div class="col-md-8">
                <div class="card" style="margin: 100px">
                    <div class="card-body">

                        <form method="POST" action="{{ route('login') }}">
                         {{csrf_field()}}

                            {{----}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Atau Username') }}</label>
                                <div class="col-md-6">
                                    <input id="login" type="text" class="form-control{{ $errors->has('username') || $errors->has('email') ?  ' is-invalid' : '' }}" name="login" value="{{ old('username') ?: old('email') }}" required autofocus>
                                    @if ($errors->has('username') || $errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') ?: $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{----}}

                            {{----}}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            {{----}}

                            {{----}}
                            {{--<div class="form-group row">--}}
                                {{--<div class="col-md-6 offset-md-4">--}}
                                    {{--<div class="form-check">--}}
                                        {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                        {{--<label class="form-check-label" for="remember">--}}
                                            {{--{{ __('Remember Me') }}--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{----}}

                            {{----}}
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Masuk') }}
                                    </button>
                                    <button class="btn btn-primary">
                                        <A href="{{route('register')}}">Daftar</A>
                                    </button>
                                </div>
                            </div>
                            {{----}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('sweetalert')
    Swal.fire({
    title: 'Silahkan ubah mode ke landscape untuk pengguna smartphone.',
    showClass: {
    popup: 'animated fadeInDown faster'
    },
    hideClass: {
    popup: 'animated fadeOutUp faster'
    }
    })
@endsection
