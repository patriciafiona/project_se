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
                                            <p class="form-text">Email Pasien</p>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group">

                                                <select id="select_2" name="id_pasien" class="form-control">
                                                    <option>Insert Patient Email Here</option>
                                                </select>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <h3>Perhatian</h3>

                                                <p>Dengan Meng-submit Form ini:<br><br>Saya telah mengerti segala <a href="" data-toggle="modal" data-target="#modalPeraturan">Peraturan</a> yang diberikan oleh pihak One Medical.</p>

                                                <p>Saya bersedia menerima <a href="" class="red-notes2" data-toggle="modal" data-target="#modalSanksi">Sanksi</a> sesuai dengan yang tertulis dalam Peraturan jika saya melanggar.</p>
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


    <!--Modal 1: Peraturan-->
        <div class="modal fade" id="modalPeraturan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <h1 style="margin: 10px auto 10px">Peraturan</h1>
                    <h5>Penambahan Pasien Tetap One Medical</h5>
                </div>
                
                <hr/>
                <p style="font-size: 10px; text-align: justify;">
                    1. Dokter harus memberitahukan terlebih dahulu kepada pasien bersangkutan.
                    <br/><br/>
                    2. Tidak boleh ada paksaan dalam menambahkan pasien ke dalam pasien tetap
                    <br/><br/>
                    3. Pasien berhak menghapus dirinya dari daftar pasien tetap yang telah ditambahkan sebelumnya
                    <br/><br/>
                </p>
              </div>

            </div>
            <!--/.Content-->
        </div>
    </div>

    <!--Modal 2: Sanksi-->
        <div class="modal fade" id="modalSanksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                    <h1 style="margin: 10px auto 10px">Sanksi</h1>
                    <h5>Pelanggaran Penambahan Pasien Tetap One Medical</h5>
                </div>
                
                <hr/>
                <p style="font-size: 10px; text-align: justify;">
                    1. Denda sebesar Rp.500.000,-
                    <br/><br/>
                    2. Penempuhan jalur hukum
                    <br/><br/>
                    3. PEmblokiran akun One Medical.
                    <br/><br/>
                </p>
              </div>

            </div>
            <!--/.Content-->
        </div>
    </div>




@endsection

