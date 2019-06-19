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
                                <h2 class="inlineBlock">Catatan Massa Tubuh</h2>
                                <button class="btn btnRound btn-primary" data-toggle="modal" data-target="#modalMassaTubuh">+</button>
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
                                        <th>Nilai</th>
                                        <th>Tanggal Menambah Data</th>
                                        <th>Waktu Menambah Data</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $i=1;?>
                                    @foreach($CatatanKesehatan as $CK)

                                    <?php
                                        //waktu cek
                                        $waktuCek = carbon\Carbon::parse($CK->updated_at);
                                        $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
                                        
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $i;?>.</td>
                                        <td>{{ $CK->nilai }}</td>
                                        <td>{{ $waktuCek->isoFormat('MMM Do YY') }}</td>
                                        <td>{{ $waktuCek->isoFormat('HH:mm') }}</td>
                                        <td>
                                            <a href="/CatatanKesehatan/edit/{{ $CK->id }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="/CatatanKesehatan/delete/{{$CK->id}}" method="post">
                                                {{ csrf_field() }}
                                                {{ method_field('Delete') }}
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
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

        <!--Modal 1: Masa Tubuh Form-->
        <div class="modal fade" id="modalMassaTubuh" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

                <h5>Massa Tubuh</h5>

                <hr/>

                <form action="{{ url('/CatatanKesehatan/new') }}" method="post">
                    {{ csrf_field() }}
                    <div class="md-form ml-0 mr-0">
                      <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input in Kilogram (Kg)" required>
                      <input type="hidden" name="jenis_catatan" value="1"/>
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