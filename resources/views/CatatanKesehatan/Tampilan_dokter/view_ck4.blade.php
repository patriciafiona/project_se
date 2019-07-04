<div class="col-md-12">
    <h2 class="inlineBlock">Catatan Kolestrol</h2>

    <br/><br/>

    @if(!$CatatanKesehatan4->isEmpty())
    <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>Nilai</th>
            <th>Tanggal Menambah Data</th>
            <th>Waktu Menambah Data</th>
        </tr>
        <?php $i=1;?>
        @foreach($CatatanKesehatan4 as $CK4)

        <?php
            //waktu cek
            $waktuCek = carbon\Carbon::parse($CK4->created_at);
            $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
        ?>
        
        <tr>
            <td><?php echo $i;?>.</td>
            <td>{{ $CK4->nilai }}</td>
            <td>{{ $waktuCek->isoFormat('MMM Do YY') }}</td>
            <td>{{ $waktuCek->isoFormat('HH:mm') }}</td>
        </tr>
        <?php $i++;?>
        @endforeach
    </table>

    <a href="/CatatanKesehatan/view/k/{{ $user[0]->id }}" class="link-ct">View Data</a>

    @else
        <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
    @endif

</div>