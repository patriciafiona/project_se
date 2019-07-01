@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <br/><br/><br/>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <!-- Bagian Tab Pasien-->
                    <ul class="nav nav-tabs" role="tablist" id="myTab">
                      <li class="nav-item">
                        <a class="nav-link" href="#biodata_panel" role="tab" data-toggle="tab">Biodata</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#rekamMedis_panel" role="tab" data-toggle="tab">Rekam Medis</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#hasilLab_panel" role="tab" data-toggle="tab">Hasil Lab</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#catatanKesehatan_panel" role="tab" data-toggle="tab">Catatan Kesehatan</a>
                      </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane" id="biodata_panel">
                            @include('Biodata.biodata')
                        </div>

                        <div role="tabpanel" class="tab-pane" id="rekamMedis_panel">
                            @include('RekamMedis.index_pasien')
                        </div>

                        <div role="tabpanel" class="tab-pane" id="hasilLab_panel">
                            @include('HasilLab.view_dokter')
                        </div>
                        <div role="tabpanel" class="tab-pane" id="catatanKesehatan_panel">
                            @include('CatatanKesehatan.view_dokter')
                        </div>
                    </div>

                    <!-- Bagian AKHIR Tab Pasien-->
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

    
@endsection

@push('js')
    <script>
        window.onload = function(){
            var halaman = localStorage.getItem("ganti_tab");

            //switch case
            switch(halaman){
                case "biodata":
                                console.log("masuk bio");
                                $('.nav-tabs a[href="#biodata_panel"]').addClass('active');

                                $('.nav-tabs a[href="#rekamMedis_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#hasilLab_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#catatanKesehatan_panel"]').removeClass('active');

                                break;
                case "rekam_medis" :
                                console.log("masuk rekam medis");
                                $('.nav-tabs a[href="#rekamMedis_panel"]').addClass('active');

                                $('.nav-tabs a[href="#biodata_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#hasilLab_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#catatanKesehatan_panel"]').removeClass('active');

                                break;
                case "hasil_lab" :
                                console.log("masuk hasil_lab");
                                $('.nav-tabs a[href="#hasilLab_panel"]').addClass('active');

                                $('.nav-tabs a[href="#rekamMedis_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#biodata_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#catatanKesehatan_panel"]').removeClass('active');

                                break;
                case "catatan_kesehatan" :
                                console.log("masuk catatan_kesehatan");
                                $('.nav-tabs a[href="#catatanKesehatan_panel"]').addClass('active');

                                $('.nav-tabs a[href="#biodata_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#hasilLab_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#rekamMedis_panel"]').removeClass('active');

                                break;
                default:
                                console.log("masuk bio");
                                $('.nav-tabs a[href="#biodata_panel"]').addClass('active');

                                $('.nav-tabs a[href="#rekamMedis_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#hasilLab_panel"]').removeClass('active');
                                $('.nav-tabs a[href="#catatanKesehatan_panel"]').removeClass('active');
                                break;
            }
        }
    </script>
@endpush