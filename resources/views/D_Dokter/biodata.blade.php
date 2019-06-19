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
                                <h2 class="mb-0">Biodata dokter</h2>
                                <br/>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="box_biodata">
                            <div class="col-xl-7 order-xl-2 mb-8 mb-xl-0">
                            <div class="card card-profile shadow">
                                <div class="row justify-content-center" style="margin-bottom: 80px;">
                                    <div class="col-lg-3 order-lg-2">
                                        <div class="card-profile-image">
                                            <a href="#">
                                                <img src="/foto/{{ $user[0]->foto }}" class="rounded-circle">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                                </div>
                                <div class="card-body pt-0 pt-md-4">
                                    <div class="text-center">
                                        <h3>
                                            {{ $user[0]->name }}
                                            <span class="font-weight-light">, {{ $years }}</span>
                                        </h3>
                                        <div class="h5 font-weight-300">
                                            <i class="ni location_pin mr-2"></i>
                                            {{ $user[0]->email }}
                                        </div>
                                        <div class="h5 mt-4">
                                            <i class="ni business_briefcase-24 mr-2"></i>{{ $user[0]->alamat }}
                                        </div>
                                        <div>
                                            <i class="ni education_hat mr-2"></i>Born in {{ $user[0]->tanggal_lahir }}
                                        </div>
                                        <hr class="my-4" />
                                        <p>Contact Number : {{ $user[0]->no_telp }}</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection