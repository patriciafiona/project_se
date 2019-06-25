<nav class="navbar navbar-vertical fixed-left navbar-expand-md 
@if(auth()->user()->jenis_user =='2')         
    bg-darkBlue
@else
    bg-lightBlue
@endif " id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- User Info Sidebar -->
        <div class="info_sidebar">
            <div style="display: inline-block;">
                <span class="avatar avatar-md rounded-circle">
                    <img alt="Image placeholder" src="/foto/{{ auth()->user()->foto }}">
                </span>
            </div>

            <div style="display: inline-block;">
                <p class="username_sb">
                    @if(auth()->user()->jenis_user =='2')         
                        dr. {{ auth()->user()->name }}
                    @else
                        {{ auth()->user()->name }}
                    @endif
                </p>
                <p class="email_sb">{{ auth()->user()->email }}</p>
            </div>
        </div>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="/foto/{{ auth()->user()->foto }}">
                        </span>
                    </div>
                </a>

                <!--Bagian drop down user sebelah kanan atas-->

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>



        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>


            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>




            <!-- Navigation - Bagian sidebar sebelah kiri yang panjang -->
            @if(auth()->user()->jenis_user =='2')       
            <ul class="navbar-nav isi_sb">
                <li class="nav-item"><a href="{{ route('home') }}"><h3 class="category_sidebar">Dokter</h3></a></li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/01.png" class="sb_icon"/>{{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('pasienTetap') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/02.png" class="sb_icon"/> {{ __('Daftar Pasien Tetap') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#" data-toggle="modal" data-target="#modalIdPasien">
                        <img src="{{ asset('OneMedical') }}/img/icon/03.png" class="sb_icon"/>
                        <span class="nav-link-text text-white">{{ __('Lihat Pasien') }}</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="my-3">

                <li class="nav-item"><h3 class="category_sidebar">Pasien</h3></li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=" {{ route('myRecord') }} ">
                        <img src="{{ asset('OneMedical') }}/img/icon/04.png" class="sb_icon"/> {{ __('Cek Rekam Medis') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('hasilLab') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/05.png" class="sb_icon"/> {{ __('Cek Hasil Lab') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dokter') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/02.png" class="sb_icon"/> {{ __('Dokter') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('catatanKesehatan') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/06.png" class="sb_icon"/> {{ __('Grafik Kesehatan') }}
                    </a>
                </li>

                 <!-- Divider -->
                <hr class="my-3">

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('profile.edit') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/07.png" class="sb_icon"/> {{ __('User Account') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <img src="{{ asset('OneMedical') }}/img/icon/08.png" class="sb_icon"/> {{ __('Logout') }}
                    </a>
                </li>
            </ul>










            @else
            <!--Jika ia adalah pasien atau admin-->









            <ul class="navbar-nav isi_sb">
                <li class="nav-item"><a href="{{ route('home') }}"><h3 class="category_sidebar">Pasien</h3></a></li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/01.png" class="sb_icon"/>{{ __('Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href=" {{ route('myRecord') }} ">
                        <img src="{{ asset('OneMedical') }}/img/icon/04.png" class="sb_icon"/> {{ __('Cek Rekam Medis') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('hasilLab') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/05.png" class="sb_icon"/> {{ __('Cek Hasil Lab') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('dokter') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/02.png" class="sb_icon"/> {{ __('Dokter') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('catatanKesehatan') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/06.png" class="sb_icon"/> {{ __('Grafik Kesehatan') }}
                    </a>
                </li>

                 <!-- Divider -->
                <hr class="my-3" style="padding:40px 0">

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('profile.edit') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/07.png" class="sb_icon"/> {{ __('User Account') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('home') }}">
                        <img src="{{ asset('OneMedical') }}/img/icon/08.png" class="sb_icon"/> {{ __('Logout') }}
                    </a>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>



