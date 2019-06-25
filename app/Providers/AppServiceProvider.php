<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //buat select2 lihat pasien 
        $lihat_user = DB::table('users')
        ->where('jenis_user',3)
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();

        View::share('lihat_user', $lihat_user);
        //----------------------------------------------
        
        Schema::defaultStringLength(191);
    }
}
