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
                    <div class="col-lg-4 col-md-6">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-5">
                                <div class="text-muted text-center mt-2 mb-4"><h1>{{ __('Sign up') }}</h1></div>
                                <hr/>
                                <div class="text-center">
                                    <a href="{{ route('daftarDokter') }}" class="btn signUp_choose">
                                        <span class="btn-inner--text">{{ __('Doctor') }}</span>
                                    </a>
                                </div>
                                <br/>
                                <div class="text-center">
                                    <a href="{{ route('daftarPasien') }}" class="btn signUp_choose">
                                        <span class="btn-inner--text">{{ __('Patient') }}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

