@extends('layouts.app')

@section('content')
    @include('layouts.headers.guest')

    <style>
        html{
            width:100%;
        }

        html, body {
            background-image:url('{{ asset('OneMedical/img/Hospital_dark.png') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: 100%;
            height: 100vh;
            margin: 0;
        }
    </style>

    <div class="header">
        <div class="container">
            <div class="header-body mt-7 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-11">
                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-5">
                                <div><a href="{{ route('register') }}"><img src="{{ asset('OneMedical') }}/img/icon/back.png" class="back-btn"/></a></div>
                                <div class="text-muted text-center mt-2 mb-4"><h1>{{ __('Sign up - Patient') }}</h1></div>

                                <hr/>

                                @if (session('status'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form action="{{ url('register/daftarPasien/new') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <!--Bagian Nama-->
                                        <div class="col-lg-6 col-md-8 su-d-n-box">
                                            <h1>Name</h1>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Name</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Your name') }}" type="text" name="name" required autofocus>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Bagian foto box-->
                                        <div class="col-lg-4 col-md-8 su-d-n-box">
                                            <img class="rounded-circle display-img-su-d" alt="Image placeholder" src="{{ asset('Foto') }}/default.png" id="output">

                                            <br/>

                                            <input style="font-size: 12px; text-align: center;" type="file" name="foto" id="upload_image" />

                                        </div>
                                    </div><!--End of row-->

                                    <div class="row" >
                                        <!--Bagian data diri box-->
                                        <div class="col-lg-10 col-md-12 su-d-i-box"">
                                            <h1>Identity</h1>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Gender</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="radio" name="jenis_kelamin" value='L' checked > Laki-Laki

                                                        <input type="radio" name="jenis_kelamin" value='P' style="margin-left: 20px; "> Perempuan
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Golongan darah</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <select name="golongan_darah" class="form-control f-lg" >
                                                            <option value="1">Golongan A</option>
                                                            <option value="2">Golongan B</option>
                                                            <option value="3">Golongan O</option>
                                                            <option value="4">Golongan AB</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Tanggal Lahir</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <div class="input-group">

                                                        <input id="tgl_lahir" type="date" name="tanggal_lahir" class="form-control f-lg" onchange="hitungUmur()" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-2">
                                                    <div class="input-group">
                                                        <input id="hasilUmur" type="text" name="umur" class="form-control f-lg" value="0 thn" disabled>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Email</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Email') }}" type="email" name="email" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Identity Card Number (Nomor KTP)</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('No. KTP') }}" type="text" name="no_ktp" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Alamat</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <textarea class="form-control f-md" name="alamat" required></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Telepon</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" placeholder="{{ __('Telepon') }}" type="text" name="no_telp" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <p class="form-text">Password</p>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-alternative padding-su-n">
                                                        <input class="form-control f-md" type="password" name="password" placeholder="Input your password" required>
                                                        <input type="hidden" name="jenis_user" value="3"/>
                                                    </div>
                                                    <p class="red-notes">*Min. 5</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div><!--End of row-->
                                    
                                    <div class="row">
                                        <div class="col-md 8" style="margin-left: 20px;">
                                            <p>By signing up, you agree to our Terms of Service and Privacy Policy </p>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary" style="margin-left: 70px;">Submit</button>
                                        </div>
                                    </div><!--End of row-->
                                </form>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload & Crop Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-7 text-center">
                          <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button class="btn btn-success crop_image">Crop & Upload Image</button>
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="id" name="id" value="{{ Auth::id() }}">

@push('js')
    <script>

    //hitung umur
    function hitungUmur() {
        //hitung umur
        var dob = $('#tgl_lahir').val();
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        document.getElementById("hasilUmur").value = age+' thn';
    }


    //profile picture
    $(document).ready(function(){

        $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
          width:200,
          height:200,
          type:'square' //circle
        },
        boundary:{
          width:300,
          height:300
        }
      });

      $('#upload_image').on('change', function(){
        var reader = new FileReader();
        reader.onload = function (event) {
          $image_crop.croppie('bind', {
            url: event.target.result
          }).then(function(){
            console.log('jQuery bind complete');
          });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
      });

      $('.crop_image').click(function(event){
        console.log('Upload Submit Click');
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response){             //simpan ke folder temporary
          $.ajax({
            url:"{{ url('/register/daftarPasien/foto') }}",
            type: "POST",
            headers: {'X-CSRF-Token':'{{csrf_token()}}'},
            data:{"image": response},
            success:function(data)
            {
              $('#uploadimageModal').modal('hide');
            },
            error:function(result){
                console.log(result);
            }
          });
        })
      });

    });  

    </script>
@endpush

