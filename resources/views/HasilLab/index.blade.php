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
                                <h2 class="mb-0">Daftar Cek Laboratorium</h2>
                                <br/>
                                <a href="/HasilLab/new" class="btn btn-round btn-primary btn-md">Tambah Hasil Lab</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 hasilLab-box">

                                @foreach($HasilLab as $hL)
                                @if(!empty('{{$hL->judul}}'))   
                                <div class="col-md-8 isi-HL-box padding20px">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <img src="/CekLab/{{$hL->foto}}" class="foto-HCL"/>
                                        </div>
                                        <div class="col-md-7 padding20px">
                                            <h2>{{$hL->judul}}</h2>
                                            <p class="sm-text-12">
                                               @if('{{$hL->created_at}}' == '{{$hL->updated_at}}')         
                                                    Created At {{$hL->created_at}}
                                                @else
                                                    Updated At {{$hL->updated_at}}
                                                @endif
                                            </p>
                                            <hr style="margin: 10px 0px" />
                                            <p class="sm-text-12">{{$hL->keterangan}}</p>

                                            <div style="float: right;">
                                                <a href="#" class="sm-text-12">
                                                    <span>
                                                        <img src="{{ asset('OneMedical') }}/img/icon/09.png" class="icon-sm"/>
                                                    </span>

                                                    Edit
                                                </a>

                                                <a href="#" class="sm-text-12">
                                                    <span>
                                                        <img src="{{ asset('OneMedical') }}/img/icon/10.png" class="icon-sm"/>
                                                    </span>

                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                
                                <div class="col-md-8 isi-HL-box padding20px">
                                    <img src="{{ asset('OneMedical') }}/img/no_result.png"/>
                                </div>

                                @endif
                                @endforeach

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