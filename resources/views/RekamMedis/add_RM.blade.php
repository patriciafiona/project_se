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
                                <h2>Laporan Pemeriksaan</h2>
                            </div>
                        </div>
                    </div>

                    <form action="{{ url('/pemeriksaanPasien/rekamMedis/new') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
                        <!--bagian informasi pasien-->
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Id.Pasien</p>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $user[0]->id }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Nama Pasien</p>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $user[0]->name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Tanggal Lahir</p>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $user[0]->tanggal_lahir }}
                                    </div>
                                </div>
                            </div>

                            <div class="col col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Kategori Pasien</p>
                                    </div>
                                    <div class="col-sm-8">
                                        Pasien Standart
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Golongan Darah</p>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $user[0]->golongan_darah }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Alamat</p>
                                    </div>
                                    <div class="col-sm-8">
                                        {{ $user[0]->alamat }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr/>
                        <!--bagian 2-->

                        <div class="row">
                            <div class="col col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Dokter</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <p>dr. {{auth()->user()->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">R.jalan/Inap</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input type="radio" name="jenis_perawatan" value='1' checked> R.jalan

                                            <input type="radio" name="jenis_perawatan" value='2' style="margin-left: 20px; "> R.inap
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Tanggal Pemeriksaan</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-alternative padding-su-n">
                                            <input class="form-control f-md" type="date" name="tanggal_pemeriksaan" 
                                            value="{{ $today->toDateString() }}" 
                                            disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Umur</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control f-md" type="text" name="umur" 
                                            value="{{ $years }}"
                                            disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">thn</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="form-text">Massa Tubuh</p>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="input-group">
                                            <input class="form-control f-md" type="text" name="massa_tubuh"
                                            @if(!empty($massa_tubuh[0]->nilai))
                                            value="{{ $massa_tubuh[0]->nilai }}" 
                                            @else
                                            placeholder="???"
                                            @endif
                                            disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">Kg</div>
                                </div>
                            </div>
                        </div>

                        <!--Bagian 3-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Diagnosa Utama</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <input class="form-control f-md" type="text" name="diagnosa" required autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Keluhan</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="keluhan" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Pemeriksaan</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="pemeriksaan" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Terapi</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="terapi"></textarea>
                                        </div>
                                        <p class="red-notes">*Boleh dikosongkan</p>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Pemeriksaan Penunjang</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="pemeriksaan_penunjang"></textarea>
                                        </div>
                                        <p class="red-notes">*Boleh dikosongkan</p>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Alergi Obat</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="alergi_obat"></textarea>
                                        </div>
                                        <p class="red-notes">*Boleh dikosongkan</p>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Resep Obat</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="resep" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Kesimpulan</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="kesimpulan" required></textarea>
                                            <input type="hidden" value="{{ $user[0]->id }}" name="id_pasien"/>
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="id_dokter"/>
                                        </div>
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-sm-2">
                                        <p class="form-text">Kondisi Keluar</p>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <textarea class="form-control f-md" name="kondisi_keluar" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br/>

                                <!--Bagian button cancle sama submit-->
                                <div class="row">
                                    <div class="col-md-10">

                                        <button type="submit" class="btn btn-sm btn-primary inlineBlock floatRight">Submit</button>
                                        <a href="/pemeriksaanPasien/{{ $user[0]->id }}" class="btn btn-sm btn-danger inlineBlock floatRight">Cancel</a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection