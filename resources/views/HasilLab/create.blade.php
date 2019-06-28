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
                                <h2 class="mb-0">Tambah Hasil Lab</h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('/HasilCekLab/new') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    Judul
                                </div>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="judul" placeholder="Judul Hasil Lab" required />
                                </div>
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col-md-4">
                                    Rekomendasi dari Dokter
                                </div>

                                <div class="col-md-8">
                                    <select id="select_2" name="id_dokter" class="form-control">
                                        <option>Insert Doctor Email Here</option>
                                    </select>
                                </div>
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col-md-4">
                                    Tanggal Pemeriksaan
                                </div>

                                <div class="col-md-8">
                                    <input type="date" class="form-control" name="tanggal_pemeriksaan" required />
                                </div>
                            </div>

                            <br/>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    File Hasil Lab
                                </div>

                                <div class="col-md-8">
                                    <input type="file" name="file" required>
                                    <p class="red-notes">*Format : (*.pdf), (*.docx), (*.doc), (*.jpg), (*.jpeg), (*.png), (*.svg)</p>
                                </div>
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col-md-4">
                                    Keterangan
                                </div>

                                <div class="col-md-8">
                                    <textarea class="form-control f-md" name="keterangan" required></textarea>
                                </div>
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_pasien" value="{{ auth()->user()->id }}"/>
                                    <button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
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
