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
        ->orderBy('updated_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan = array_column($CatatanKesehatan, 'nilai');

        $CatatanKesehatan = array_reverse($CatatanKesehatan);

        //-------------------------------------------------------------------------------------------------

        $CatatanKesehatan2 = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','2')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan2 = array_column($CatatanKesehatan2, 'nilai');

        $CatatanKesehatan2 = array_reverse($CatatanKesehatan2);

        //-------------------------------------------------------------------------------------------------

        $CatatanKesehatan3 = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','3')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan3 = array_column($CatatanKesehatan3, 'nilai');

        $CatatanKesehatan3 = array_reverse($CatatanKesehatan3);

        //-------------------------------------------------------------------------------------------------

        $CatatanKesehatan4 = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('jenis_catatan','4')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->limit(8)
        ->get()
        ->toArray();

        $CatatanKesehatan4 = array_column($CatatanKesehatan4, 'nilai');

        $CatatanKesehatan4 = array_reverse($CatatanKesehatan4);

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
        ->orderBy('updated_at', 'DESC')
        ->Paginate(1);

        //------------------------------------------------------------------------------------------------
        $CK_ALL = DB::table('catatan_kesehatans')
        ->select('nilai')
        ->where('id_user',$id)
        ->get();

        return view('dashboard', compact('today','rekamMedis','CK_ALL'))
            ->with('CatatanKesehatan',json_encode($CatatanKesehatan,JSON_NUMERIC_CHECK))
            ->with('CatatanKesehatan2',json_encode($CatatanKesehatan2,JSON_NUMERIC_CHECK))
            ->with('CatatanKesehatan3',json_encode($CatatanKesehatan3,JSON_NUMERIC_CHECK))
            ->with('CatatanKesehatan4',json_encode($CatatanKesehatan4,JSON_NUMERIC_CHECK));

    }
}
