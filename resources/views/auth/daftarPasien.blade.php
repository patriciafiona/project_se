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
                                <div class="text-muted text-center mt-2 mb-4"><h1>{{ __('Sign up - Patient') }}</h1></div>

                                <hr/>
                                <form action="{{ url('/signup/new') }}" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <!--Bagian Nama-->
                                        <div class="col-lg-6 col-md-8 su-d-n-box">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">First Name</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Front name') }}" type="text" name="f_name" required autofocus>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Middle Name</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Middle name') }}" type="text" name="m_name" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Last Name</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Last name') }}" type="text" name="l_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Bagian foto box-->
                                        <div class="col-lg-4 col-md-8 su-d-n-box">
                                            <img class="rounded-circle display-img-su-d" alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">

                                            <br/>

                                            <input style="font-size: 12px; text-align: center;" type="file" name="foto">
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
                                                        <input type="radio" name="jk" value="L" checked> Laki-Laki

                                                        <input type="radio" name="jk" value="P" style="margin-left: 20px; "> Perempuan
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Tanggal Lahir</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group">
                                                        <input type="text" name="tgl_lahir" class="form-control f-md" placeholder="DD/MM/YYYY">
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="input-group">
                                                        <input type="text" name="umur" class="form-control f-md" value="0 thn" disabled>
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
                                                        <textarea class="form-control f-md" name="alamat"></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div><!--End of row-->


                                </form>
                                
                                <div class="row">
                                    <div class="col-md 8" style="margin-left: 20px;">
                                        <p>By signing up, you agree to our Terms of Service and Privacy Policy </p>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="sumbit" class="btn btn-primary" style="margin-left: 70px;">Submit</button>
                                    </div>
                                </div><!--End of row-->

                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

