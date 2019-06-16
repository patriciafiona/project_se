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

                    <!-- Bagian Tab Pasien-->
                    <ul class="nav nav-tabs" role="tablist" id="myTab">
                      <li class="nav-item">
                        <a class="nav-link" href="#ck1_panel" role="tab" data-toggle="tab">Massa Tubuh</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#ck2_panel" role="tab" data-toggle="tab">Gula Darah</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#ck3_panel" role="tab" data-toggle="tab">Tekanan darah</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#ck4_panel" role="tab" data-toggle="tab">Kolestrol</a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="ck1_panel">
                            @include('CatatanKesehatan.view_ck1')
                        </div>

                        <div role="tabpanel" class="tab-pane active" id="ck2_panel">
                            @include('CatatanKesehatan.view_ck2')
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="ck3_panel">
                            @include('CatatanKesehatan.view_ck3')
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="ck4_panel">
                            @include('CatatanKesehatan.view_ck4')
                        </div>
                    </div>

                    <!-- Bagian AKHIR Tab Pasien-->
                                
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

        <!--Modal 2: Gula darah Form-->
        <div class="modal fade" id="modalGulaDarah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

                <h5>Gula Darah</h5>

                <hr/>

                <form action="{{ url('/CatatanKesehatan/new') }}" method="post">
                    {{ csrf_field() }}
                    <div class="md-form ml-0 mr-0">
                      <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input nilai gula darah" required>
                      <input type="hidden" name="jenis_catatan" value="2"/>
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
                      <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input nilai sistol" required>
                      <br/>
                      <input type="text" class="form-control form-control-sm validate ml-0" name="nilai2" placeholder="Input nilai diastol" required>
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

        <!--Modal 4: Kolestrol Form-->
        <div class="modal fade" id="modalKolestrol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

                <h5>Kolestrol</h5>

                <hr/>

                <form action="{{ url('/CatatanKesehatan/new') }}" method="post">
                    {{ csrf_field() }}
                    <div class="md-form ml-0 mr-0">
                      <input type="text" class="form-control form-control-sm validate ml-0" name="nilai" placeholder="Input kadar kolestrol" required>
                      <input type="hidden" name="jenis_catatan" value="4"/>
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