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
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @if(!$rekamMedis->isEmpty())
                        <!--tampilkan rekam medis yang ia punya-->
                            @inject('dokter','App\User')
                            @foreach ($rekamMedis as $rm)

                            <?php
                                //waktu cek
                                $waktuCek = carbon\Carbon::parse($rm->updated_at);
                                $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                            ?>
                            
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
                                    <p class="rm-n-tgl">{{ $waktuCek->isoFormat('MMM Do YY') }} | {{ $waktuCek->isoFormat('HH:mm') }}</p>
                                    <hr style="margin: 5px;" />
                                   Kesimpulan: {{ $rm->kesimpulan }}
                                </div>
                            </div>
                            @endforeach
                        @else
                            <img alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                        @endif

                    </div>

                    <div class="card-footer">
                        {{ $rekamMedis->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    
@endsection