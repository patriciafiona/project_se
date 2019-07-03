@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')

    <style>
        html{
            width:100%;
        }

        html, body {
            background-image:url('{{ asset('OneMedical/img/Hospital_dark.png') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 100%;
            height: 100vh;
            margin: 0;
        }
    </style>

    <div class="header">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent" style="padding-bottom: 10px;">
                                <div><a href="{{ route('welcome') }}"><img src="{{ asset('OneMedical') }}/img/icon/back.png" class="back-btn"/></a></div>
                                <div class="text-muted text-center mt-2 mb-3"><h1>{{ __('Login') }}</h1></div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">

                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form role="form" method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password" required>
                                        </div>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" name="remember" id="customCheckLogin" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheckLogin">
                                                <span class="text-muted">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                                        <div class="col-md-6 text-center">
                                            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="btn-wrapper text-center div-botton-li">
                                    <a href="#" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                        <span class="btn-inner--text">{{ __('Google') }}</span>
                                    </a>
                                    <a href="#" class="btn btn-neutral btn-icon">
                                        <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/facebook.svg"></span>
                                        <span class="btn-inner--text">{{ __('Facebook') }}</span>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-light">
                                        <small>{{ __('Forgot password?') }}</small>
                                    </a>
                                @endif
                            </div>
                            <div class="col-6 ">
                                <a href="{{ route('register') }}" class="text-light">
                                    <small>{{ __('Create new account') }}</small>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
