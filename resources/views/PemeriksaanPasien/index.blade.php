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
                        <div role="tabpanel" class="tab-pane fade" id="biodata_panel">
                            @include('Biodata.biodata')
                        </div>

                        <div role="tabpanel" class="tab-pane active" id="rekamMedis_panel">
                            @include('RekamMedis.index_pasien')
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="hasilLab_panel">
                            @include('HasilLab.view_dokter')
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="catatanKesehatan_panel">
                            
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
    jQuery(function () {
    jQuery('#myTab a').on('click', function() {
        $(this).tab('show');
    });
})
</script>
@endpush