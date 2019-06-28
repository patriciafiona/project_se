<div class="header pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <img src="@if(auth()->user()->jenis_user =='2')         
                        {{ asset('OneMedical/img/header_1.png') }}
                    @else
                        {{ asset('OneMedical/img/header_2.png') }}
                    @endif" id="header_doctor"/>
            <h1 class="style_header">Hello {{ auth()->user()->name }}</h1>
            <h5 class="style_header">This is your Health Apps. You can see your health progress and manage your profile or history.</h5>
        </div>
    </div>
</div>