<?php

namespace App\Http\Controllers;

use App\CatatanKesehatan;
use Illuminate\Support\Facades\DB;
use Auth;

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

        return view('dashboard')
            ->with('CatatanKesehatan',json_encode($CatatanKesehatan,JSON_NUMERIC_CHECK))
            ->with('CatatanKesehatan2',json_encode($CatatanKesehatan2,JSON_NUMERIC_CHECK))
            ->with('CatatanKesehatan3',json_encode($CatatanKesehatan3,JSON_NUMERIC_CHECK))
            ->with('CatatanKesehatan4',json_encode($CatatanKesehatan4,JSON_NUMERIC_CHECK));

    }
}
