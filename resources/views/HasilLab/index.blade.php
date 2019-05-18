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
                                <a href="/HasilCekLab/new" class="btn btn-round btn-primary btn-md">Tambah Hasil Lab</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 hasilLab-box">
                                @if(!$HasilLab->isEmpty())
                                @foreach($HasilLab as $hL)
                                @if(!empty('{{$hL->judul}}'))   
                                <div class="col-md-10 isi-HL-box padding20px">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <!--Cek extensionnya apa-->
                                            <?php
                                            $file = $hL->file ;
                                            $ext = File::extension($file);
                                            $ext = strtolower($ext);
                                            ?>

                                            <a href="{{ asset('CekLab') }}/{{$hL->file}}">
                                                @if($ext=="docx"||$ext=="doc")
                                                <img src="{{ asset('OneMedical') }}/img/ext/1.png" class="foto-HCL"/>
                                                @elseif($ext=="pdf")
                                                <img src="{{ asset('OneMedical') }}/img/ext/2.png" class="foto-HCL"/>
                                                @else
                                                <img src="/CekLab/{{$hL->file}}" class="foto-HCL"/>
                                                @endif
                                            </a>
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
                                                <a href="/HasilCekLab/edit/{{$hL->id}}" class="sm-text-12" >
                                                    <span>
                                                        <img src="{{ asset('OneMedical') }}/img/icon/09.png" class="icon-sm"/>
                                                    </span>

                                                    Edit
                                                </a>

                                                <form action="/HasilCekLab/delete/{{$hL->id}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('Delete') }}
                                                    <span>
                                                        <img src="{{ asset('OneMedical') }}/img/icon/10.png" class="icon-sm"/>
                                                    </span>
                                                    <button type="submit" class="sm-text-12 transparent-button">Hapus</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                
                                <div class="col-md-8 isi-HL-box padding20px">
                                    <img src="{{ asset('CekLab') }}/no_picture.jpg" width="200px" alt="Img-placeholder"/>
                                </div>

                                @endif
                                @endforeach
                                @else
                                    <img alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                                @endif

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