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
                                <h2 class="mb-0 inlineBlock">Remove Doctor</h2>
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
                        
                        <form action="{{ url('Dokter/remove/'. $user[0]->id) }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <p class="form-text">ID Dokter</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input class="form-control f-md" type="text" name="id_dokter" value="{{$user[0]->id}}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2">
                                            <p class="form-text">Nama Dokter</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input class="form-control f-md" type="text" name="nama_dokter" value="{{$user[0]->name}}" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <div>
                                                <h3>Perhatian</h3>

                                                <p>Dengan Meng-submit Form ini:<br><br>Saya telah mengerti segala <a href="" data-toggle="modal" data-target="#modalResiko" class="red-notes2">Resiko</a> yang akan terjadi.</p>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <a href="/Dokter" class="btn btn-sm btn-danger">Cancle</a>

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


    <!--Modal 1: Resiko-->
        <div class="modal fade" id="modalResiko" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content modal-box">
              <!--Body-->
                <div class="modal-header" style="padding-bottom: 0px; ">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

              <div class="modal-body">
                <div class="text-center mb-1">
                    <h1 style="margin: 10px auto 10px">Resiko</h1>
                    <h5>Menghapus Daftar Dokter One Medical</h5>
                </div>
                
                <hr/>
                <p style="font-size: 10px; text-align: justify;">
                    1. Dokter dapat menambah kembali pasien ke dalam daftar pasien tetap yang ia miliki.
                    <br/><br/>
                    2. Anda dapat melakukan penghapusan selama berkali-kali
                    <br/><br/>
                    3. Jika tindakan anda dianggap mengganggu serta mempermainkan dokter maka dokter dapat menempuh jalur hukum serta pelaporan akun anda kepada pihak One Medical.
                    <br/><br/>
                </p>
              </div>

            </div>
            <!--/.Content-->
        </div>
    </div>


@endsection