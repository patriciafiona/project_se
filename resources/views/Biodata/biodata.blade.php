@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <br/><br/><br/>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 inlineBlock">Rekam Medis</h2>
                                @if (!session('status'))
                                    <a href="/rekamMedis/add/{{$pasien[0]->id}}" class="btn btn-md btn-primary inlineBlock floatRight">Tambah Rekam Medis</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                            <div class="card card-profile shadow">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 order-lg-2">
                                        <div class="card-profile-image">
                                            <a href="#">
                                                <img src="/foto/{{ auth()->user()->foto }}" class="rounded-circle">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                                        <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pt-md-4">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                                <div>
                                                    <span class="heading">22</span>
                                                    <span class="description">{{ __('Friends') }}</span>
                                                </div>
                                                <div>
                                                    <span class="heading">10</span>
                                                    <span class="description">{{ __('Photos') }}</span>
                                                </div>
                                                <div>
                                                    <span class="heading">89</span>
                                                    <span class="description">{{ __('Comments') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h3>
                                            @if(auth()->user()->jenis_user =='2')         
                                                dr. {{ auth()->user()->name }}
                                            @else
                                                {{ auth()->user()->name }}
                                            @endif
                                            <span class="font-weight-light">, 27</span>
                                        </h3>
                                        <div class="h5 font-weight-300">
                                            <i class="ni location_pin mr-2"></i>
                                            {{ auth()->user()->email }}
                                        </div>
                                        <div class="h5 mt-4">
                                            <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->alamat }}
                                        </div>
                                        <div>
                                            <i class="ni education_hat mr-2"></i>Born in {{ auth()->user()->tanggal_lahir }}
                                        </div>
                                        <div>
                                            <p>Status : 
                                                @switch(auth()->user()->jenis_user)
                                                    @case(1)
                                                        Admin
                                                        @break;
                                                    @case(2)
                                                        Dokter
                                                        @break;
                                                    @case(3)
                                                        Pasien
                                                        @break;
                                                @endswitch
                                            </p>
                                        </div>
                                        <hr class="my-4" />
                                        <p>Contact Number : {{ auth()->user()->no_telp }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end of card body-->
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    
@endsection