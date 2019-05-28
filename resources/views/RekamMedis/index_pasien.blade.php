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

                                    <a href="/rekamMedis/add/{{$pasien[0]->id}}" class="btn btn-md btn-primary inlineBlock floatRight">Tambah Rekam Medis</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class=""row>
                            <p>Nama Pasien: {{ $pasien[0]->name }}</p>
                            <p>ID Pasien: {{ $pasien[0]->id }}</p>
                        </div>

                        <hr/>

                        @if(!$rekamMedis->isEmpty())
                        <!--tampilkan rekam medis yang ia punya-->
                            @foreach ($rekamMedis as $rm)
                            <div class="row box-rm">
                                <div class="col-md-2">
                                    <span class="avatar avatar-md rounded-circle rm-f-dokter">
                                        <img alt="Image placeholder" src="/foto/{{ $rm->foto }}">
                                    </span>
                                </div>

                                <div class="col-md-10">
                                    <p class="rm-n-dokter inlineBlock">dr. {{ $rm->name }}</p>
                                    <a href="/rekamMedis/view/{{ $rm->id }}" style="float: right;">
                                        <img alt="Image placeholder" src="{{ asset('OneMedical') }}/img/icon/11.png">
                                    </a>

                                    <?php
                                        //waktu cek
                                        $waktuCek = carbon\Carbon::parse($rm->updated_at);
                                        $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                                    ?>

                                    <!--Jika waktunya sebelum 30 menit dan id dokternya adalah sama kaya dia punya-->
                                    @if($rm->id_dokter ==  auth()->user()->id )
                                        <!--Cek waktunya uda lewat 30m atau belum-->
                                        <?php
                                        $now = carbon\Carbon::now();
                                        $now->timezone = new DateTimeZone('Asia/Jakarta');                                        
                                        ?>

                                        @if($now->diffInMinutes($waktuCek) <= 30) <!--apakah selisihnya kurang dari 30 menit? -->
                                        <a href="/rekamMedis/edit/{{$rm->id_pasien}}/{{$rm->id}}" style="float: right; margin-right: 30px;">
                                            Edit
                                        </a>
                                        @else
                                        <p class="rm-red-notes">Final</p>
                                        @endif
                                    @endif

                                    <p class="rm-n-tgl">{{ $waktuCek }}</p> <!--sesuai dengan tanggal di jakarta-->
                                    <hr style="margin: 5px;" />
                                   Kesimpulan: {{ $rm->kesimpulan }}
                                </div>
                            </div>
                            @endforeach
                        @else
                            <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                        @endif

                    </div>

                    <div class="card-footer">
                        {{ $rekamMedis->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    
@endsection