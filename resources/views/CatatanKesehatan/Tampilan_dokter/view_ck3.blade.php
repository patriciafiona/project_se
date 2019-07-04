<div class="col-md-12">
    <h2 class="inlineBlock">Catatan Tekanan Darah</h2>

    <br/><br/>

    @if(!$CatatanKesehatan3->isEmpty())
    <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>Tekanan Darah</th>
            <th>Tanggal Menambah Data</th>
            <th>Waktu Menambah Data</th>
        </tr>
        <?php $i=1;?>
        @foreach($CatatanKesehatan3 as $CK3)

        <?php
            //waktu cek
            $waktuCek = carbon\Carbon::parse($CK3->created_at);
            $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
        ?>
        
        <tr>
            <td><?php echo $i;?>.</td>
            <td>{{ $CK3->nilai }}/{{ $CK3->nilai2 }}</td>
            <td>{{ $waktuCek->isoFormat('MMM Do YY') }}</td>
            <td>{{ $waktuCek->isoFormat('HH:mm') }}</td>
        </tr>
        <?php $i++;?>
        @endforeach
    </table>

    <a href="/CatatanKesehatan/view/td/{{ $user[0]->id }}" class="link-ct">View Data</a>

    @else
        <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
    @endif

    
</div>  