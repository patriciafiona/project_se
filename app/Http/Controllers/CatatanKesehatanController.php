<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTimeZone;
use App\Model;
use Illuminate\Support\Facades\DB;
use App\CatatanKesehatan;
use App\User;
use Auth;

class CatatanKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;

        //query untuk menammpilkan catatan kesehatan yang berbeda

        //KURANG FILTER ID_USER
        $CatatanKesehatan = DB::table('catatan_kesehatans')
        ->where('jenis_catatan','1')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->limit(5)
        ->get();

        $CatatanKesehatan2 = DB::table('catatan_kesehatans')
        ->where('jenis_catatan','2')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->limit(5)
        ->get();

        $CatatanKesehatan3= DB::table('catatan_kesehatans')
        ->where('jenis_catatan','3')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->limit(5)
        ->get();

        $CatatanKesehatan4= DB::table('catatan_kesehatans')
        ->where('jenis_catatan','4')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->limit(5)
        ->get();

        return view('CatatanKesehatan.index', compact('CatatanKesehatan', 'CatatanKesehatan2', 'CatatanKesehatan3', 'CatatanKesehatan4'));
    }

    public function index_mt()
    {
        //query untuk menammpilkan catatan massa tubuh
        $CatatanKesehatan = DB::table('catatan_kesehatans')->where('jenis_catatan','1')->orderBy('updated_at', 'DESC')->Paginate(5);
        return view('CatatanKesehatan.index_mt', compact('CatatanKesehatan'));
    }

     public function index_gd()
    {
        //query untuk menammpilkan catatan gula darah
        $CatatanKesehatan = DB::table('catatan_kesehatans')->where('jenis_catatan','2')->orderBy('updated_at', 'DESC')->Paginate(5);

        return view('CatatanKesehatan.index_gd', compact('CatatanKesehatan'));
    }

     public function index_td()
    {
        //query untuk menammpilkan catatan tekanan darah
        $CatatanKesehatan = DB::table('catatan_kesehatans')->where('jenis_catatan','3')->orderBy('updated_at', 'DESC')->Paginate(5);

        return view('CatatanKesehatan.index_td', compact('CatatanKesehatan'));
    }

     public function index_k()
    {
        //query untuk menammpilkan catatan kolestrol
        $CatatanKesehatan = DB::table('catatan_kesehatans')->where('jenis_catatan','4')->orderBy('updated_at', 'DESC')->Paginate(5);

        return view('CatatanKesehatan.index_k', compact('CatatanKesehatan'));
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
        $CatatanKesehatan = new CatatanKesehatan();
        $request->validate([
            'id_user' => 'required',
            'nilai' => 'required',
            'jenis_catatan' => 'required'
        ]);

        $CatatanKesehatan->id_user =$request->id_user;
        $CatatanKesehatan->jenis_catatan = $request->jenis_catatan;
        $CatatanKesehatan->nilai = $request->nilai;
        $CatatanKesehatan->nilai2 = $request->nilai2;

        $CatatanKesehatan->save(); 

        return redirect('/CatatanKesehatan');
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
        $CatatanKesehatan = CatatanKesehatan::find($id);
        return view('CatatanKesehatan.edit', compact('CatatanKesehatan'));
    }

    public function edit_td($id)
    {
        $CatatanKesehatan = CatatanKesehatan::find($id);
        return view('CatatanKesehatan.edit_tekananDarah', compact('CatatanKesehatan'));
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
        if(isset($request->nilai2)){
            $CatatanKesehatan = CatatanKesehatan::find($id);
            $CatatanKesehatan->nilai = $request->nilai;
            $CatatanKesehatan->nilai2 = $request->nilai2;
        }else{
            $CatatanKesehatan = CatatanKesehatan::find($id);
            $CatatanKesehatan->nilai = $request->nilai;
        }
        
        

        $CatatanKesehatan->save(); 

        return redirect('/CatatanKesehatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CatatanKesehatan = CatatanKesehatan::find($id);
        $CatatanKesehatan->delete();

        return redirect('/CatatanKesehatan');
    }
}
