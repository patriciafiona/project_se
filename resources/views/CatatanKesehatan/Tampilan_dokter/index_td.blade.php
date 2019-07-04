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
                                <h2 class="inlineBlock">Catatan Tekanan Darah</h2>
                                <br/>
                                <p>Nama Pasien   : {{ $pasien[0]->name }}</p>
                                <p>Email Pasien  : {{ $pasien[0]->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 hasilLab-box">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No.</th>
                                        <th>Sistol/Diastol</th>
                                        <th>Tanggal Menambah Data</th>
                                        <th>Waktu Menambah Data</th>
                                    </tr>
                                    <?php $i=1;?>
                                    @foreach($CatatanKesehatan as $CK)

                                    <?php
                                        //waktu cek
                                        $waktuCek = carbon\Carbon::parse($CK->created_at);
                                        $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                                        
                                    ?>

                                    <tr>
                                        <td><?php echo $i;?>.</td>
                                        <td>{{ $CK->nilai }}/{{ $CK->nilai2 }}</td>
                                        <td>{{ $waktuCek->isoFormat('MMM Do YY') }}</td>
                                        <td>{{ $waktuCek->isoFormat('HH:mm') }}</td>
                                    </tr>
                                    <?php $i++;?>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        
                    </div>

                    <div class="card-footer">
                        {{ $CatatanKesehatan->onEachSide(2)->links() }}
                    </div>
                </div>
            </div>
        </div>




        <!--Modal 3: tekanan darah Form-->
        <div class="modal fade" id="modalTekananDarah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content modal-box">
              <!--Body-->
              <div class="modal-body text-center mb-1 ">

                <h1 style="margin: 40px auto 10px">
                    @if(auth()->user()->jenis_user =='2')         
                        dr. {{ auth()->user()->name }}
                    @else
                        {{ auth()->user()->name }}
                    @endif
                </h1>

                <h5>Tekanan Darah</h5>

                <hr/>

                <form action="{{ url('/CatatanKesehatan/new') }}" method="post">
                    {{ csrf_field() }}
                    <div class="md-form ml-0 mr-0">
                      <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input nilai tekanan darah" required>
                      <input type="hidden" name="jenis_catatan" value="3"/>
                      <input type="hidden" name="id_user" value="{{ auth()->user()->id }}"/>
                    </div>

                    <div class="text-center mt-4">
                      <button type="submit" class="btn btn-cyan mt-1">Add<i class="fas fa-sign-in ml-1"></i></button>
                    </div>
                </form>
              </div>

            </div>
            <!--/.Content-->
          </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush