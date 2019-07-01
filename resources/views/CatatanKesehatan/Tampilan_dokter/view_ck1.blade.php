<div class="col-md-12">
    <h2 class="inlineBlock">Catatan Massa Tubuh</h2>

    <br/><br/>

    @if(!$CatatanKesehatan->isEmpty())
    <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>Nilai</th>
            <th>Tanggal Menambah Data</th>
            <th>Waktu Menambah Data</th>
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
        </tr>
        <?php $i++;?>
        @endforeach
    </table>

    <a href="/CatatanKesehatan/view/mt/{{ $user[0]->id }}" class="link-ct">View Data</a>
    
    @else
        <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
    @endif
    
</div>