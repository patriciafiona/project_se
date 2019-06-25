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
            <div class="header-body mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-11">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-5">
                                <div><a href="{{ route('register') }}"><img src="{{ asset('OneMedical') }}/img/icon/back.png" class="back-btn"/></a></div>
                                <div class="text-muted text-center mt-2 mb-4"><h1>{{ __('Sign up - Doctor') }}</h1></div>

                                <hr/>

                                @if (session('status'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form action="{{ url('register/daftarDokter/new') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <!--Bagian Nama-->
                                        <div class="col-lg-6 col-md-8 su-d-n-box">
                                            <h1>Name</h1>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Name</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Your name') }}" type="text" name="name" required autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Bagian foto box-->
                                        <div class="col-lg-4 col-md-8 su-d-n-box">
                                            <img class="rounded-circle display-img-su-d" alt="Image placeholder" src="{{ asset('Foto') }}/default.png" id="output">

                                            <br/>

                                            <input style="font-size: 12px; text-align: center;" type="file" name="foto" onchange="loadFile(event)">
                                        </div>
                                    </div><!--End of row-->

                                    <div class="row" >
                                        <!--Bagian data diri box-->
                                        <div class="col-lg-10 col-md-12 su-d-i-box"">
                                            <h1>Identity</h1>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Gender</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="radio" name="jenis_kelamin" value='L' checked> Laki-Laki

                                                        <input type="radio" name="jenis_kelamin" value='P' style="margin-left: 20px; "> Perempuan
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Golongan darah</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <select name="golongan_darah" class="form-control f-lg" >
                                                            <option value="1">Golongan A</option>
                                                            <option value="2">Golongan B</option>
                                                            <option value="3">Golongan O</option>
                                                            <option value="4">Golongan AB</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Tanggal Lahir</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group">

                                                        <input id="tgl_lahir" type="date" name="tanggal_lahir" class="form-control f-lg" onchange="hitungUmur()" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="input-group">
                                                        <input id="hasilUmur" type="text" name="umur" class="form-control f-lg" value="0 thn" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Email</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Email') }}" type="email" name="email" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Identity Card Number (Nomor KTP)</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('No. KTP') }}" type="text" name="no_ktp" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Alamat</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <textarea class="form-control f-md" name="alamat" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Telepon</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Telepon') }}" type="text" name="no_telp" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Password</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" type="password" name="password" placeholder="Input your password" required>

                                                        <input type="hidden" name="jenis_user" value="2"/>
                                                    </div>

                                                    <p class="red-notes">*Min. 5</p>

                                                </div>
                                            </div>

                                        </div>
                                    </div><!--End of row-->

                                    <div class="row" >
                                        <!--Bagian data diri box-->
                                        <div class="col-lg-10 col-md-12 su-d-i-box"">
                                            <h1>Document</h1>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Ijazah SMA</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input style="font-size: 12px; text-align: center;" type="file" name="ijazah_sma" required>
                                                    <p class="red-notes">*Format : (*.pdf), (*.jpg), (*.jpeg), (*.png), (*.svg)</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Ijazah S1 Kedokteran</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input style="font-size: 12px; text-align: center;" type="file" name="ijazah_kedokteran" required>
                                                    <p class="red-notes">*Format : (*.pdf), (*.jpg), (*.jpeg), (*.png), (*.svg)</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Foto KTP</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input style="font-size: 12px; text-align: center;" type="file" name="foto_ktp" required>
                                                    <p class="red-notes">*Format : (*.jpg), (*.jpeg), (*.png), (*.svg)</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Foto Kartu Keluarga</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <input style="font-size: 12px; text-align: center;" type="file" name="foto_kk" required>
                                                    <p class="red-notes">*Format : (*.jpg), (*.jpeg), (*.png), (*.svg)</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div><!--End of row-->
                                    <div class="row">
                                        <div class="col-md 8" style="margin-left: 20px;">
                                            <p>By signing up, you agree to our Terms of Service and Privacy Policy </p>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary" style="margin-left: 70px;">Submit</button>
                                        </div>
                                    </div><!--End of row-->
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
      var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
          var output = document.getElementById('output');
          output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
      };

    function hitungUmur() {
        //hitung umur
        var dob = $('#tgl_lahir').val();
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        document.getElementById("hasilUmur").value = age+' thn';
    }

    </script>
@endpush

