@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello') . ' '. auth()->user()->name,
        'description' => __('This is your profile page. You can see the progress you\'ve made with your work and manage your projects or assigned tasks'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center" style="margin-bottom: 50px;">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="/profile/profilePicture">
                                    <img src="/foto/{{ auth()->user()->foto }}" class="rounded-circle" alt="alternative text" title="Change your profile picture HERE...">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">0</span>
                                        <span class="description">{{ __('Following') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $jumlah_rm }}</span>
                                        <span class="description">{{ __('Rekam Medis') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ $jumlah_hl }}</span>
                                        <span class="description">{{ __('Hasil Lab') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                @if(auth()->user()->jenis_user =='2')         
                                    dr. {{ auth()->user()->name }}
                                @else
                                    {{ auth()->user()->name }}
                                @endif
                                <span class="font-weight-light">, {{ $years }}</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>
                                {{ auth()->user()->email }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->alamat }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>Born in {{ auth()->user()->tanggal_lahir }}
                            </div>
                            <div>
                                <p>Status : 
                                    @switch(auth()->user()->jenis_user)
                                        @case(1)
                                            Admin
                                            @break;
                                        @case(2)
                                            Dokter
                                            @break;
                                        @case(3)
                                            Pasien
                                            @break;
                                    @endswitch
                                </p>
                            </div>
                            <hr class="my-4" />
                            <p>Contact Number : {{ auth()->user()->no_telp }}</p>
                            <hr class="my-4" />
                            <a href="#" data-toggle="modal" data-target="#modalDeleteAccount" class="btn btn-danger btn-sm">Delete Account</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-tglLahir">{{ __('Tanggal Lahir') }}</label>
                                            <input type="date" name="tanggal_lahir" id="input-tglLahir" class="form-control" value="{{ auth()->user()->tanggal_lahir }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Golongan Darah') }}</label>
                                            <div class="input-group">
                                                <select name="golongan_darah" class="form-control f-lg" >
                                                    <option value="1" {{ auth()->user()->golongan_darah=='1' ? ' selected' : '' }}>Golongan A</option>

                                                    <option value="2" {{ auth()->user()->golongan_darah=='2' ? ' selected' : '' }}>Golongan B</option>

                                                    <option value="3" {{ auth()->user()->golongan_darah=='3' ? ' selected' : '' }}>Golongan O</option>

                                                    <option value="4" {{ auth()->user()->golongan_darah=='4' ? ' selected' : '' }}>Golongan AB</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-no_ktp">{{ __('No. KTP') }}</label>
                                            <input type="text" name="no_ktp" id="input-no_ktp" class="form-control" value="{{ old('no_ktp', auth()->user()->no_ktp) }}" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">{{ __('Jenis Kelamin') }}</label>
                                            <div class="input-group">
                                                <input type="radio" name="jenis_kelamin" value='L' {{ auth()->user()->jenis_kelamin=='L' ? ' checked' : '' }}> Laki-Laki

                                                <input type="radio" name="jenis_kelamin" value='P' style="margin-left: 20px; " {{ auth()->user()->jenis_kelamin=='P' ? ' checked' : '' }}> Perempuan
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-alamat">{{ __('Alamat') }}</label>

                                            <textarea class="form-control f-md" name="alamat" id="input-alamat" required>{{ auth()->user()->alamat }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-no_telp">{{ __('No. Telepon') }}</label>
                                            <input type="text" name="no_telp" id="input-no_telp" class="form-control" value="{{ auth()->user()->no_telp }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                            @if (session('password_status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('password_status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

    <!--Modal : Validasi delete account-->
        <div class="modal fade" id="modalDeleteAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content modal-box">
              <!--Body-->
              <div class="modal-body text-center mb-1 ">

                <h1 style="margin: 40px auto 10px">
                    Delete Account
                </h1>

                <hr/>

                <h5>Are you sure you want to delete this Account?</h5>
                <br/>
                <form method="post" action="{{ url('/profile/delete/'.auth()->user()->id) }}" autocomplete="off">
                    {{ csrf_field() }}
                    {{ method_field('Delete') }}
                    <a href="" class="btn btn-primary">Cancle</a>
                    <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                </form>
              </div>

            </div>
            <!--/.Content-->
          </div>
        </div>

@endsection