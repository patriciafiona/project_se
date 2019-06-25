
<div class="card shadow">
    <div class="card-header bg-transparent">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-0">Daftar Cek Laboratorium</h2>
                <br/>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-10 hasilLab-box">
                @if(!$HasilLab->isEmpty())
                @foreach($HasilLab as $hL)
                @if(!empty('{{$hL->judul}}'))   
                <div class="col-md-10 isi-HL-box padding20px">
                    <div class="row">
                        <div class="col-md-2">
                            <!--Cek extensionnya apa-->
                            <?php
                            $file = $hL->file ;
                            $ext = File::extension($file);
                            $ext = strtolower($ext);
                            ?>

                            <a href="{{ asset('CekLab') }}/{{$hL->file}}">
                                @if($ext=="docx"||$ext=="doc")
                                <img src="{{ asset('OneMedical') }}/img/ext/1.png" class="foto-HCL"/>
                                @elseif($ext=="pdf")
                                <img src="{{ asset('OneMedical') }}/img/ext/2.png" class="foto-HCL"/>
                                @else
                                <img src="/CekLab/{{$hL->file}}" class="foto-HCL"/>
                                @endif
                            </a>
                        </div>
                        <div class="col-md-10 padding20px">
                            <h2>{{$hL->judul}}</h2>
                            <?php
                                //waktu create
                                $waktu_c = carbon\Carbon::parse($hL->created_at);
                                $waktu_c->timezone = new DateTimeZone('Asia/Jakarta');

                                //waktu update
                                $waktu_u = carbon\Carbon::parse($hL->updated_at);
                                $waktu_u->timezone = new DateTimeZone('Asia/Jakarta');
                            ?>
                            <p class="sm-text-12">
                                @if('{{$waktu_c}}' == '$waktu_u}}')         
                                    Created At {{ $waktu_c->isoFormat('MMM Do YY') }} | {{ $waktu_c->isoFormat('HH:mm') }}
                                @else
                                    Updated At {{ $waktu_u->isoFormat('MMM Do YY') }} | {{ $waktu_u->isoFormat('HH:mm') }}
                                @endif
                            </p>
                            <hr style="margin: 10px 0px" />
                            <p class="sm-text-12">{{$hL->keterangan}}</p>
                        </div>
                    </div>
                </div>
                @else
                
                <div class="col-md-8 isi-HL-box padding20px">
                    <img src="{{ asset('CekLab') }}/no_picture.jpg" width="200px" alt="Img-placeholder"/>
                </div>

                @endif
                @endforeach
                @else
                    <img class="img-center" alt="Image placeholder" src="{{ asset('OneMedical') }}/img/no_result.png">
                @endif

            </div>
        </div>
    </div>
    <div class="card-footer">
        {{ $HasilLab->onEachSide(2)->links() }}
    </div>
</div>  