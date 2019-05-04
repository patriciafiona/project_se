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
                                <h2 class="mb-0">Ubah Catatan Kesehatan</h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('/CatatanKesehatan/edit/' . $CatatanKesehatan->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Jenis Catatan
                                </div>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$CatatanKesehatan->jenis_catatan}}"  disabled />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    Nilai
                                </div>

                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="nilai" value="{{$CatatanKesehatan->nilai}}"  />
                                </div>
                            </div>

                            <br/>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_pasien" value="{{ auth()->user()->id }}"/>
                                    <button type="submit" class="btn btn-primary" style="float: right;">Edit</button>
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

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush