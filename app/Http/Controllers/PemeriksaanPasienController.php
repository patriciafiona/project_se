<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RekamMedis;
use App\CatatanKesehatan;
use Auth;
use Carbon\Carbon;

class PemeriksaanPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getPasien(Request $request)
    {
        return redirect('/pemeriksaanPasien/'.$request->pasien_id);
    }

    public function index($id)
    {
        $pasien_id = $id;

        //bagian rekam medis pasien ----------------------------------------------------------------------------
        $dokter = auth()->user()->id;

        if($pasien_id != $dokter){

            $pasien = DB::table('users')
            ->where('id', $pasien_id)
            ->get();

            //rekam medis pasien
            $rekamMedis = DB::table('rekam_medis')
            ->join('users', 'users.id', '=', 'rekam_medis.id_dokter')
            ->select('rekam_medis.*', 'users.name','users.foto') //nama dokter
            ->where('id_pasien', $pasien_id)
            ->orderBy('updated_at', 'DESC')
            ->Paginate(5);

        }else{
            //dokter sama dengan pasien, gak bisa
            return back()->withStatus(__('You cant input your Rekam Medis by yourself. Error: You are submit Rekam Medis with your ID.'));
        }
        //end of rekam medis pasien -----------------------------------------------------------------------------





        //bagian biodata pasien ---------------------------------------------------------------------------------
        $user = DB::table('users')
        ->where('id', $pasien_id)
        ->get();

        $years = Carbon::parse($user[0]->tanggal_lahir)->age;

        //hitung rekam medis yang udah ada ada berapa
        $jumlah_rm = DB::table('rekam_medis')
        ->where('id_pasien', $pasien_id)
        ->count();

        //hitung jumlah hasil cek lab
        $jumlah_hl = DB::table('hasil_labs')
        ->where('id_user', $pasien_id)
        ->count();
        //end of biodata pasien ----------------------------------------------------------------------------------



        //bagian hasil lab pasien ---------------------------------------------------------------------------------
        $HasilLab = DB::table('hasil_labs')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->Paginate(5);
        
        //end of hasil lab pasien ----------------------------------------------------------------------------------


        return view('PemeriksaanPasien.index', compact('pasien','rekamMedis','user','years','jumlah_rm','jumlah_hl','HasilLab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
