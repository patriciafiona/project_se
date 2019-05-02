<?php

namespace App\Http\Controllers;

class daftarPasienController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('auth.daftarPasien');
    }
}
