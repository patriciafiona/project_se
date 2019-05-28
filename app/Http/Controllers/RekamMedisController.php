<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\RekamMedis;
use App\CatatanKesehatan;
use Auth;
use Carbon\Carbon;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //tambahan ------------------------------------------------------------------------------------

    public function getPasien(Request $request)
    {
        return redirect('/rekamMedis/'.$request->pasien_id);
    }

    public function view($id)
    {
        $rekamMedis = RekamMedis::find($id);

        $user = DB::table('users')
        ->where('id', $rekamMedis->id_pasien)
        ->get();

        $years = Carbon::parse($user[0]->tanggal_lahir)->age;

        $dokter = DB::table('users')
        ->where('id', $rekamMedis->id_dokter)
        ->get();

        return view('RekamMedis.view',compact('rekamMedis','user','years','dokter'));
    }

    public function index_dokter($id)
    {
        $pasien_id = $id;

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

        return view('RekamMedis.index_pasien', compact('pasien','rekamMedis'));
    }    

    //end tambahan ----------------------------------------------------------------------------------

    public function index()
    {
        $pasien_id =  auth()->user()->id ;

        //rekam medis pasien
        $rekamMedis = DB::table('rekam_medis')
        ->join('users', 'users.id', '=', 'rekam_medis.id_dokter')
        ->select('rekam_medis.*', 'users.name', 'users.foto') //nama dokter
        ->where('id_pasien', $pasien_id)
        ->orderBy('updated_at', 'DESC')
        ->Paginate(5);

        return view('RekamMedis.myRecord', compact('rekamMedis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //dapatkan info data pasien database
        $pasien_id = $id;

        $user = DB::table('users')
        ->where('id', $pasien_id)
        ->get();

        //dapatkan data massa tubuh terbaru
        $massa_tubuh = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','1')
        ->where('id_user',$pasien_id)
        ->orderBy('updated_at', 'DESC')
        ->limit(1)
        ->get();

        //tanggal hari ini
        $today = Carbon::now();

        //dapetin umur pasien saat ini
        $dateOfBirth = DB::table('users')
        ->select('tanggal_lahir')
        ->where('id',$pasien_id)
        ->get();

        $years = Carbon::parse($dateOfBirth[0]->tanggal_lahir)->age;

        return view('RekamMedis.add_RM', compact('user','massa_tubuh','today','years'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $RekamMedis = new RekamMedis();
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'diagnosa' => 'required',
            'keluhan' => 'required',
            'pemeriksaan' => 'required',
            'resep' => 'required',
            'kesimpulan' => 'required',
            'kondisi_keluar' => 'required'
        ]);

        $RekamMedis->id_pasien =$request->id_pasien;
        $RekamMedis->id_dokter = $request->id_dokter;
        $RekamMedis->jenis_perawatan = $request->jenis_perawatan;
        $RekamMedis->diagnosa = $request->diagnosa;
        $RekamMedis->keluhan = $request->keluhan;
        $RekamMedis->pemeriksaan = $request->pemeriksaan;

        $RekamMedis->terapi = $request->terapi;
        $RekamMedis->pemeriksaan_penunjang = $request->pemeriksaan_penunjang;
        $RekamMedis->alergi_obat = $request->alergi_obat;
        $RekamMedis->resep_obat = $request->resep;
        $RekamMedis->kesimpulan = $request->kesimpulan;
        $RekamMedis->kondisi_keluar = $request->kondisi_keluar;

        $RekamMedis->save(); 

        return redirect('/rekamMedis/'.$request->id_pasien);
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
    public function edit($id_pasien,$id)
    {
        $rekamMedis=RekamMedis::find($id);

        $user = DB::table('users')
        ->where('id', $id_pasien)
        ->get();

        //dapatkan data massa tubuh terbaru
        $massa_tubuh = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','1')
        ->where('id_user',$id_pasien)
        ->orderBy('updated_at', 'DESC')
        ->limit(1)
        ->get();

        //tanggal hari ini
        $today = Carbon::now();

        //dapetin umur pasien saat ini
        $dateOfBirth = DB::table('users')
        ->select('tanggal_lahir')
        ->where('id',$id_pasien)
        ->get();

        $years = Carbon::parse($dateOfBirth[0]->tanggal_lahir)->age;

        return view('RekamMedis.edit', compact('rekamMedis','user','massa_tubuh','today','years'));
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
        $RekamMedis = new RekamMedis();
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'diagnosa' => 'required',
            'keluhan' => 'required',
            'pemeriksaan' => 'required',
            'resep' => 'required',
            'kesimpulan' => 'required',
            'kondisi_keluar' => 'required'
        ]);

        $RekamMedis->id_pasien =$request->id_pasien;
        $RekamMedis->id_dokter = $request->id_dokter;
        $RekamMedis->jenis_perawatan = $request->jenis_perawatan;
        $RekamMedis->diagnosa = $request->diagnosa;
        $RekamMedis->keluhan = $request->keluhan;
        $RekamMedis->pemeriksaan = $request->pemeriksaan;

        $RekamMedis->terapi = $request->terapi;
        $RekamMedis->pemeriksaan_penunjang = $request->pemeriksaan_penunjang;
        $RekamMedis->alergi_obat = $request->alergi_obat;
        $RekamMedis->resep_obat = $request->resep;
        $RekamMedis->kesimpulan = $request->kesimpulan;
        $RekamMedis->kondisi_keluar = $request->kondisi_keluar;

        $RekamMedis->save(); 

        return redirect('/rekamMedis/'.$request->id_pasien);
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
