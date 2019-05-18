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
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 hasilLab-box">
                                        <h2 class="inlineBlock">Catatan Massa Tubuh</h2>
                                        
                                        <button class="btn btnRound btn-primary" data-toggle="modal" data-target="#modalMassaTubuh">+</button>

                                        <br/><br/>

                                        @if(!$CatatanKesehatan->isEmpty())
                                        <table class="table table-striped">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nilai</th>
                                                <th>Tanggal Menambah Data</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php $i=1;?>
                                            @foreach($CatatanKesehatan as $CK)
                                            <tr>
                                                <td><?php echo $i;?>.</td>
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
                                            <?php $i++;?>
                                            @endforeach
                                        </table>

                                        <a href="{{ route('catatanKesehatan_mt') }}" class="link-ct">View Data</a>
                                        
                                        @else
                                            <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                                        @endif
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 hasilLab-box">
                                        <h2 class="inlineBlock">Catatan Gula Darah</h2>

                                        <button class="btn btnRound btn-primary" data-toggle="modal" data-target="#modalGulaDarah">+</button>

                                        <br/><br/>

                                        @if(!$CatatanKesehatan2->isEmpty())
                                        <table class="table table-striped">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nilai</th>
                                                <th>Tanggal Menambah Data</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php $i=1;?>
                                            @foreach($CatatanKesehatan2 as $CK2)
                                            <tr>
                                                <td><?php echo $i;?>.</td>
                                                <td>{{ $CK2->nilai }}</td>
                                                <td>{{ $CK2->created_at }}</td>
                                                <td>
                                                    <a href="/CatatanKesehatan/edit/{{ $CK2->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/CatatanKesehatan/delete/{{$CK2->id}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('Delete') }}
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $i++;?>
                                            @endforeach
                                        </table>

                                        <a href="{{ route('catatanKesehatan_gd') }}" class="link-ct">View Data</a>

                                        @else
                                            <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                                        @endif

                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 hasilLab-box">
                                        <h2 class="inlineBlock">Catatan Tekanan Darah</h2>

                                        <button class="btn btnRound btn-primary" data-toggle="modal" data-target="#modalTekananDarah">+</button>

                                        <br/><br/>

                                        @if(!$CatatanKesehatan3->isEmpty())
                                        <table class="table table-striped">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nilai</th>
                                                <th>Tanggal Menambah Data</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php $i=1;?>
                                            @foreach($CatatanKesehatan3 as $CK3)
                                            <tr>
                                                <td><?php echo $i;?>.</td>
                                                <td>{{ $CK3->nilai }}</td>
                                                <td>{{ $CK3->created_at }}</td>
                                                <td>
                                                    <a href="/CatatanKesehatan/edit/{{ $CK3->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/CatatanKesehatan/delete/{{$CK3->id}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('Delete') }}
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $i++;?>
                                            @endforeach
                                        </table>

                                        <a href="{{ route('catatanKesehatan_td') }}" class="link-ct">View Data</a>

                                        @else
                                            <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                                        @endif

                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12 hasilLab-box">
                                        <h2 class="inlineBlock">Catatan Kolestrol</h2>

                                        <button class="btn btnRound btn-primary" data-toggle="modal" data-target="#modalKolestrol">+</button>

                                        <br/><br/>

                                        @if(!$CatatanKesehatan4->isEmpty())
                                        <table class="table table-striped">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nilai</th>
                                                <th>Tanggal Menambah Data</th>
                                                <th>Action</th>
                                            </tr>
                                            <?php $i=1;?>
                                            @foreach($CatatanKesehatan4 as $CK4)
                                            <tr>
                                                <td><?php echo $i;?>.</td>
                                                <td>{{ $CK4->nilai }}</td>
                                                <td>{{ $CK4->created_at }}</td>
                                                <td>
                                                    <a href="/CatatanKesehatan/edit/{{ $CK4->id }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="/CatatanKesehatan/delete/{{$CK4->id}}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('Delete') }}
                                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php $i++;?>
                                            @endforeach
                                        </table>

                                        <a href="{{ route('catatanKesehatan_k') }}" class="link-ct">View Data</a>

                                        @else
                                            <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                                        @endif

                                    </div>
                                    <br/><br/>
                                </div>
                            </div>
                        </div>


                        
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