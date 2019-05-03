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
                                <h2 class="mb-0">Rekam Medis</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- List rekam medis -->
                        <div class="row">
                            <div class="col-md-7 rekamMedis_box">
                                <table class="table table-striped">
                                    <td></td>
                                </table>
                            </div>

                            <div class="col-md-4 date_box">
                                <h3>Date</h3>
                                <h1 class="text-center date_lg">22</h1>
                                <h4  class="text-center">Mei 2019</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br/>
        @if(auth()->user()->jenis_user =='2')         <!--Jika ia adalah dokter-->
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Pelayanan Pasien</h2>
                                <div class="row">
                                    <div class="col-md-3" style="margin-left: 100px;">
                                        <img src="{{ asset('OneMedical/img/icon/pp_1.png') }}" class="pp_img"/>
                                        <br/>
                                        <a href="" class="link-pp">Menambah Rekam Medis</a>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{ asset('OneMedical/img/icon/pp_2.png') }}" class="pp_img"/>
                                        <br/>
                                        <a href="" class="link-pp">Melihat Rekam Medis</a>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="{{ asset('OneMedical/img/icon/pp_3.png') }}" class="pp_img"/>
                                        <br/>
                                        <a href="" class="link-pp">Mengubah Rekam Medis</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>

        <br/>

        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Jadwal Praktek</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>
        @endif

        <br/>

        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0 inlineBlock">Grafik Kesehatan</h2>
                                <a href="#" class="btn btn-md btn-primary btn-selengkapnya">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 box-gk">
                                <div class="card-body">
                                    <h1 class="inlineBlock">Catatan Massa Tubuh</h1>
                                    <button class="btn btnRound btn-primary">+</button>
                                    <br/><br/>
                                    <!-- Chart -->
                                    <div class="chart chart-height">
                                        <!-- Chart wrapper -->
                                        <canvas id="chart-sales" class="chart-canvas"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-5 box-gk">
                                <h2 class="inlineBlock">Catatan Gula Darah</h2>
                                    <button class="btn btnRound btn-primary">+</button>
                                    <br/><br/>
                                    <!-- Chart -->
                                    <div class="chart chart-height-2">
                                        <!-- Chart wrapper -->
                                        <canvas id="chart-sales" class="chart-canvas"></canvas>
                                    </div>
                            </div>
                            <div class="col-md-5 box-gk">
                                <h2 class="inlineBlock">Catatan Tekanan Darah</h2>
                                    <button class="btn btnRound btn-primary">+</button>
                                    <br/><br/>
                                    <!-- Chart -->
                                    <div class="chart chart-height-2">
                                        <!-- Chart wrapper -->
                                        <canvas id="chart-sales" class="chart-canvas"></canvas>
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush