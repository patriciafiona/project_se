<div class="col-md-12">
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