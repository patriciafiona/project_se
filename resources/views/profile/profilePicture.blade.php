@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <br/><br/><br/>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">Edit Profile Picture</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="panel panel-default">
                            <div class="panel-body" align="center">
                                <h1>Select Profile Image</h1>

                                <br /><br /><br />
                                <div id="uploaded_image">
                                    <img src="{{ asset('foto') }}/{{auth()->user()->foto}}" class="rounded-circle" />
                                </div>

                                <br /><br /><br />

                                <input type="file" name="upload_image" id="upload_image" />
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
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

@push('js') <!--Ajax-->
<script>  
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
        }).then(function(response){
          $.ajax({
            url:"{{ url('/profile/crop') }}",
            type: "POST",
            headers: {'X-CSRF-Token':'{{csrf_token()}}'},
            data:{"image": response},
            success:function(data)
            {
              $('#uploadimageModal').modal('hide');
              $('#uploaded_image').html(data);
                location.reload();
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