<div class="col-md-12">
    <h2 class="inlineBlock">Catatan Kolestrol</h2>

    <button class="btn btnRound btn-primary" data-toggle="modal" data-target="#modalKolestrol">+</button>

    <br/><br/>

    @if(!$CatatanKesehatan4->isEmpty())
    <table class="table table-striped">
        <tr>
            <th>No.</th>
            <th>Nilai</th>
            <th>Tanggal Menambah Data</th>
            <th>Waktu Menambah Data</th>
            <th>Action</th>
        </tr>
        <?php $i=1;?>
        @foreach($CatatanKesehatan4 as $CK4)

        <?php
            //waktu cek
            $waktuCek = carbon\Carbon::parse($CK4->updated_at);
            $waktuCek->timezone = new DateTimeZone('Asia/Jakarta');
        ?>
        
        <tr>
            <td><?php echo $i;?>.</td>
            <td>{{ $CK4->nilai }}</td>
            <td>{{ $waktuCek->isoFormat('MMM Do YY') }}</td>
            <td>{{ $waktuCek->isoFormat('HH:mm') }}</td>
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