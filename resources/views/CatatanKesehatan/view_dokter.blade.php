
<div class="card shadow">
    <div class="card-header bg-transparent">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-0">Daftar Catatan Kesehatan</h2>
                <br/>
                <p>Nama Pasien : {{ $pasien[0]->name }}</p>
                <p>Email Pasien: {{ $pasien[0]->email }}</p>
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
    <div class="tab-content" style="padding-top: 20px;">
        <div role="tabpanel" class="tab-pane fade" id="ck1_panel">
            @include('CatatanKesehatan.Tampilan_dokter.view_ck1')
        </div>

        <div role="tabpanel" class="tab-pane active" id="ck2_panel">
            @include('CatatanKesehatan.Tampilan_dokter.view_ck2')
        </div>

        <div role="tabpanel" class="tab-pane fade" id="ck3_panel">
            @include('CatatanKesehatan.Tampilan_dokter.view_ck3')
        </div>

        <div role="tabpanel" class="tab-pane fade" id="ck4_panel">
            @include('CatatanKesehatan.Tampilan_dokter.view_ck4')
        </div>
    </div>

    <!-- Bagian AKHIR Tab Pasien-->
                
</div>