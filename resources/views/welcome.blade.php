@extends('layouts.app')

@section('content')
    <style>
        html{
            width:100%;
        }

        html, body {
            background-image:url('{{ asset('OneMedical/img/header_opening.png') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 100%;
            height: 100vh;
            margin: 0;
        }
    </style>

    <div class="header header_opening">
        <div class="container">
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-11 col-md-12">
                        <h1 class="text-white openingText1">One Medical</h1>
                        <h3 class="quotesOpening"><i>"Health is start with you"</i></h3>
                        <a class="btn btn-md btn-primary daftarSekarang" href="{{ route('register') }}">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
