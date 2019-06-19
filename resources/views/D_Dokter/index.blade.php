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
                                <h2 class="mb-0">Daftar Dokter</h2>
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

                        @if(!$daftarDokter->isEmpty())
                        <?php $i=1; ?>
                            @foreach ($daftarDokter as $pt)
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

                                        <a href="/Dokter/biodata/{{ $pt->id_dokter }}" class="btn btn-sm text-pt-small">Biodata</a>

                                        <a href="/Dokter/remove/{{ $pt->id_dokter }}" class="btn btn-sm text-pt-small-red btn-danger">Remove doctor</a>
                                
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

                                        <a href="/Dokter/biodata/{{ $pt->id_dokter }}" class="btn btn-sm text-pt-small">Biodata</a>

                                        <a href="/Dokter/remove/{{ $pt->id_dokter }}" class="btn btn-sm text-pt-small-red btn-danger">Remove doctor</a>
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

                                        <a href="/Dokter/biodata/{{ $pt->id_dokter }}" class="btn btn-sm text-pt-small">Biodata</a>

                                        <a href="/Dokter/remove/{{ $pt->id_dokter }}" class="btn btn-sm text-pt-small-red btn-danger">Remove doctor</a>
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

        @include('layouts.footers.auth')
    </div>
@endsection