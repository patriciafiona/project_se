<?php

namespace App\Http\Controllers;

use App\CatatanKesehatan;
use App\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use DateTimeZone;

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
        $id = auth()->user()->id;

        $CatatanKesehatan = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','1')
        ->where('id_user',$id)
        ->orderBy('created_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan = array_column($CatatanKesehatan, 'nilai');

        $CatatanKesehatan = array_reverse($CatatanKesehatan);

        //tanggal
        $tgl_ck1 = DB::table('catatan_kesehatans')
        ->select('updated_at')
        ->where('jenis_catatan','1')
        ->where('id_user',$id)
        ->orderBy('created_at', 'ASC')
        ->limit(8)
        ->get()
        ->toArray();

        //-------------------------------------------------------------------------------------------------

        $CatatanKesehatan2 = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','2')
        ->where('id_user',$id)
        ->orderBy('created_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan2 = array_column($CatatanKesehatan2, 'nilai');

        $CatatanKesehatan2 = array_reverse($CatatanKesehatan2);

        //tanggal
        $tgl_ck2 = DB::table('catatan_kesehatans')
        ->select('updated_at')
        ->where('jenis_catatan','2')
        ->where('id_user',$id)
        ->orderBy('created_at', 'ASC')
        ->limit(8)
        ->get()
        ->toArray();

        //-------------------------------------------------------------------------------------------------

        //sistol
        $CatatanKesehatan3 = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','3')
        ->where('id_user',$id)
        ->orderBy('created_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan3 = array_column($CatatanKesehatan3, 'nilai');

        $CatatanKesehatan3 = array_reverse($CatatanKesehatan3);

        //diastol
        $CatatanKesehatan32 = DB::table('catatan_kesehatans')
        ->select('nilai2')
        ->where('jenis_catatan','3')
        ->where('id_user',$id)
        ->orderBy('created_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan32 = array_column($CatatanKesehatan32, 'nilai2');

        $CatatanKesehatan32 = array_reverse($CatatanKesehatan32);

        //tanggal
        $tgl_ck3 = DB::table('catatan_kesehatans')
        ->select('updated_at')
        ->where('jenis_catatan','3')
        ->where('id_user',$id)
        ->orderBy('created_at', 'ASC')
        ->limit(8)
        ->get()
        ->toArray();

        //-------------------------------------------------------------------------------------------------

        $CatatanKesehatan4 = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','4')
        ->where('id_user',$id)
        ->orderBy('created_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan4 = array_column($CatatanKesehatan4, 'nilai');

        $CatatanKesehatan4 = array_reverse($CatatanKesehatan4);

        //tanggal
        $tgl_ck4 = DB::table('catatan_kesehatans')
        ->select('updated_at')
        ->where('jenis_catatan','4')
        ->where('id_user',$id)
        ->orderBy('created_at', 'ASC')
        ->limit(8)
        ->get()
        ->toArray();

        //------------------------------------------------------------------------------------------------

        //tanggal hari ini
        $today = Carbon::now();
        $today->timezone = new DateTimeZone('Asia/Jakarta');

        //------------------------------------------------------------------------------------------------

        //untuk rekam medis

        $pasien_id =  auth()->user()->id ;

        $rekamMedis = DB::table('rekam_medis')
        ->join('users', 'users.id', '=', 'rekam_medis.id_dokter')
        ->select('rekam_medis.*', 'users.name')
        ->where('id_pasien', $pasien_id)
        ->orderBy('created_at', 'DESC')
        ->Paginate(1);

        //------------------------------------------------------------------------------------------------
        $CK_ALL = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('id_user',$id)
        ->get();
        // echo $CatatanKesehatan3[0];
        return view('dashboard', compact('today','rekamMedis','CK_ALL', 'CatatanKesehatan','CatatanKesehatan2','CatatanKesehatan3','CatatanKesehatan4'))
            ->with('CatatanKesehatanx',json_encode($CatatanKesehatan,JSON_NUMERIC_CHECK))
            ->with('tgl_ck1',json_encode($tgl_ck1))
            ->with('CatatanKesehatan2x',json_encode($CatatanKesehatan2,JSON_NUMERIC_CHECK))
            ->with('tgl_ck2',json_encode($tgl_ck2))
            ->with('CatatanKesehatan3x',json_encode($CatatanKesehatan3,JSON_NUMERIC_CHECK))
            ->with('tgl_ck3',json_encode($tgl_ck3))
            ->with('CatatanKesehatan32x',json_encode($CatatanKesehatan32,JSON_NUMERIC_CHECK))
            ->with('tgl_ck4',json_encode($tgl_ck4))
            ->with('CatatanKesehatan4x',json_encode($CatatanKesehatan4,JSON_NUMERIC_CHECK));

    }
}
