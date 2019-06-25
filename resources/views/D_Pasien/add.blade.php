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
                                <h2 class="mb-0 inlineBlock">Tambah Pasien Tetap</h2>
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
                        
                        <form action="{{ url('/PasienTetap/add/ auth()->user()->id') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <p class="form-text">Pasien</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">

                                                <select id="select_2" name="id_pasien">
                                                    @foreach($users as $us)
                                                    <option value="{{ $us->id }}"> {{$us->email}} | dr. {{ $us->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <h3>Perhatian</h3>

                                                <p>Dengan Meng-submit Form ini:<br><br>Saya telah mengerti segala <a href="">Peraturan</a> yang diberikan oleh pihak One Medical.</p>

                                                <p>Saya bersedia menerima <a href="" class="red-notes2">Sanksi</a> sesuai dengan yang tertulis dalam Peraturan jika saya melanggar.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <a href="/PasienTetap" class="btn btn-sm btn-danger">Cancle</a>

                                                <button type="submit" class="btn btn-sm btn-primary inlineBlock floatRight">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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