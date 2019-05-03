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
                                <h2 class="mb-0">Daftar Catatan Kesehatan</h2>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 hasilLab-box">

                                <table class="table table-striped">
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis Pemeriksaan</th>
                                        <th>ID Dokter</th>
                                        <th>Nilai</th>
                                        <th>Tanggal Menambah Data</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach($CatatanKesehatan as $CK)
                                    <tr>
                                        <td></td>
                                        <td>{{ $CK->jenis_catatan }}</td>
                                        <td>
                                            @if(!empty('{{ $CK->id_dokter }}'))         
                                                {{ $CK->id_dokter }}
                                            @else
                                                no doctor
                                            @endif
                                        </td>
                                        <td>{{ $CK->nilai }}</td>
                                        <td>{{ $CK->created_at }}</td>
                                        <td>
                                            <a href="/CatatanKesehatan/edit/{{ $CK->id }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="/CatatanKesehatan/delete/{{$CK->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('Delete') }}
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>

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