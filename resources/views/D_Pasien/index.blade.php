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
                                <h2 class="mb-0 inlineBlock">Daftar Pasien Tetap</h2>
                                <a href="/PasienTetap/add/{{ auth()->user()->id }}" class="btn btn-md btn-primary inlineBlock floatRight">Tambah Pasien Tetap</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(!$pasienTetap->isEmpty())
                        <?php $i=1; ?>
                            @foreach ($pasienTetap as $pt)
                                @if($i==1)
                                <div class="row">
                                    <div class="col-md-3 box_dpt" style="margin-left: 70px">
                                        <img src="/foto/{{ $pt->foto }}" class="rounded-circle img-pt">
                                        <br><br>
                                        <b class="text-pt-color">{{ $pt->name }}</b>

                                        <?php
                                            //waktu cek
                                            $waktuCek = carbon\Carbon::parse($pt->created_at);
                                            $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                                        ?>
                                        <p id="text-pt-since">Since : {{ $waktuCek->isoFormat('MMM Do YY') }} | {{ $waktuCek->isoFormat('HH:mm') }}</p>

                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Biodata</a>

                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Rekam Medis</a>
                                
                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Hasil Lab</a>

                                        <br>

                                        <a href="/PasienTetap/remove/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small-red btn-danger">Remove Patient</a>

                                    </div>
                                @elseif($i<=3 && $i!=1)
                                    <div class="col-md-3 box_dpt">
                                        <img src="/foto/{{ $pt->foto }}" class="rounded-circle img-pt">
                                        <br><br>
                                        <b class="text-pt-color">{{ $pt->name }}</b>

                                        <?php
                                            //waktu cek
                                            $waktuCek = carbon\Carbon::parse($pt->created_at);
                                            $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                                        ?>
                                        <p id="text-pt-since">Since : {{ $waktuCek->isoFormat('MMM Do YY') }} | {{ $waktuCek->isoFormat('HH:mm') }}</p>

                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Biodata</a>

                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Rekam Medis</a>
                                
                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Hasil Lab</a>

                                        <br>

                                        <a href="/PasienTetap/remove/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small-red btn-danger">Remove Patient</a>
                                    </div>
                                @elseif($i==4)
                                    <?php $i=1; ?>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-3 box_dpt" style="margin-left: 70px">
                                        <img src="/foto/{{ $pt->foto }}" class="rounded-circle img-pt">
                                        <br><br>
                                        <b class="text-pt-color">{{ $pt->name }}</b>

                                        <?php
                                            //waktu cek
                                            $waktuCek = carbon\Carbon::parse($pt->created_at);
                                            $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                                        ?>
                                        <p id="text-pt-since">Since : {{ $waktuCek->isoFormat('MMM Do YY') }} | {{ $waktuCek->isoFormat('HH:mm') }}</p>

                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Biodata</a>

                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Rekam Medis</a>
                                
                                        <a href="/pemeriksaanPasien/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small">Hasil Lab</a>

                                        <br>

                                        <a href="/PasienTetap/remove/{{ $pt->id_pasien }}" class="btn btn-sm text-pt-small-red btn-danger">Remove Patient</a>
                                    </div>
                                @endif

                                <?php $i++; ?>

                            @endforeach
                        @else
                            <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/nothing_to_see.png">
                        @endif
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