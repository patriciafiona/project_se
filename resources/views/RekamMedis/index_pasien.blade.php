<!--Isi hlaman rekam medis pasien-->
<div class="card shadow">
    <div class="card-header bg-transparent">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-0 inlineBlock">Rekam Medis</h2>
                @if (!session('status'))
                    <a href="/pemeriksaanPasien/rekamMedis/add/{{$pasien[0]->id}}" class="btn btn-md btn-primary inlineBlock floatRight">Tambah Rekam Medis</a>
                @endif
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
        @else
        <div class=""row>
            <p>Nama Pasien : {{ $pasien[0]->name }}</p>
            <p>Email Pasien: {{ $pasien[0]->email }}</p>
        </div>
        @endif

        <hr/>

        @if(!$rekamMedis->isEmpty())
        <!--tampilkan rekam medis yang ia punya-->
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

                    <!--Jika waktunya sebelum 30 menit dan id dokternya adalah sama kaya dia punya-->
                    @if($rm->id_dokter ==  auth()->user()->id )
                        <!--Cek waktunya uda lewat 30m atau belum-->
                        <?php
                        $now = carbon\Carbon::now();
                        $now->timezone = new DateTimeZone('Asia/Jakarta');                                        
                        ?>

                        @if($now->diffInMinutes($waktuCek) <= 30) <!--apakah selisihnya kurang dari 30 menit? -->
                        <a href="/pemeriksaanPasien/rekamMedis/edit/{{$rm->id_pasien}}/{{$rm->id}}" style="float: right; margin-right: 30px;">
                            Edit
                        </a>
                        @else
                        <p class="rm-red-notes">Final</p>
                        @endif
                    @endif

                    <p class="rm-n-tgl">{{ $waktuCek->isoFormat('MMM Do YY') }} | {{ $waktuCek->isoFormat('HH:mm') }}</p> <!--sesuai dengan tanggal di jakarta-->
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
        {{ $rekamMedis->onEachSide(2)->links() }}
    </div>
</div>