<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PasienTetap;
use Carbon\Carbon;
use Auth;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pasien_id =  auth()->user()->id ;

        //rekam medis pasien
        $daftarDokter = DB::table('pasien_tetaps')
        ->join('users', 'users.id', '=', 'pasien_tetaps.id_dokter')
        ->select('pasien_tetaps.*', 'users.name', 'users.foto') //nama pasien
        ->where('id_pasien', $pasien_id)
        ->orderBy('users.name', 'ASC')
        ->Paginate(9);

        $jumlah = DB::table('pasien_tetaps')
        ->join('users', 'users.id', '=', 'pasien_tetaps.id_dokter')
        ->select('pasien_tetaps.*', 'users.name', 'users.foto') //nama pasien
        ->where('id_pasien', $pasien_id)
        ->count();

        return view('D_Dokter.index',compact('daftarDokter','jumlah'));

    }

    public function biodata($id)
    {
        $user = DB::table('users')
        ->where('id', $id)
        ->get();

        $years = Carbon::parse($user[0]->tanggal_lahir)->age;

        return view('D_Dokter.biodata',compact('user','years'));
    }

    public function validation($id)
    {
        $user = DB::table('users')
        ->where('id', $id)
        ->get();

        return view('D_Dokter.remove_validation',compact('user'));
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
        DB::table('pasien_tetaps')
        ->where('id_pasien', auth()->user()->id)
        ->where('id_dokter',$id)
        ->delete();

        return $this->index();
    }
}
