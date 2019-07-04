<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>One Medical</title>
        <!-- Favicon -->
        <link href="{{ asset('OneMedical') }}/img/brand/brand2.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <!-- Tambahan CSS -->
        <link type="text/css" href="{{ asset('OneMedical') }}/css/tambahan.css?v=1.0.0" rel="stylesheet">

        <!--Crop Image-->
        <link rel="stylesheet" href="{{ asset('Croppie') }}/croppie.css" />
        <!---->

        <!--Select2-->
        <link href="{{ asset('select2-4.0.7') }}/dist/css/select2.min.css" rel="stylesheet" />
        <!---->
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <!--Modal : Menanyakan Id pasien untuk masuk dokter menangani pasien-->
        <div class="modal fade" id="modalIdPasien" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content modal-box">
              <!--Body-->
              <div class="modal-body text-center mb-1 ">

                <h1 style="margin: 40px auto 10px">
                    Lihat Rekam Medis
                </h1>

                <h5>Email Pasien</h5>

                <hr/>

                <form action="{{ url('/pemeriksaanPasien/getPasien') }}" method="post">
                    {{ csrf_field() }}
                    <div class="md-form ml-0 mr-0">
                        <div class="col-md-5">
                            <select id="select_1" name="pasien_id">
                                <option>Insert Patient Name or Email Here</option>
                            </select>
                        </div>

                    </div>

                    <div class="text-center mt-4">
                      <button type="submit" class="btn btn-cyan mt-1">Submit<i class="fas fa-sign-in ml-1"></i></button>
                    </div>
                </form>
              </div>

            </div>
            <!--/.Content-->
          </div>
        </div>

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('Croppie') }}/jquery.min.js"></script>  
        <script src="{{ asset('Croppie') }}/bootstrap.min.js"></script>
        <script src="{{ asset('Croppie') }}/croppie.js"></script>

        <script src="{{ asset('select2-4.0.7') }}/dist/js/select2.min.js"></script>
        <script src="{{ asset('OneMedical') }}/js/call_select2.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

    </body>
</html>

