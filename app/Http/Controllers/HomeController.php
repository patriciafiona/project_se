<?php

namespace App\Http\Controllers;

use App\RekamMedis;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        //cek apakah dia dokter, pasien, atau admin
        $rekam_medis = RekamMedis::all();
        return view('dashboard');
    }
}
