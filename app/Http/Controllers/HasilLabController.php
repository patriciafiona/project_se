<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\HasilLab;
use App\User;
use Auth;

use Carbon\Carbon;

class HasilLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $id = auth()->user()->id;

        $HasilLab = DB::table('hasil_labs')
        ->where('id_user',$id)
        ->orderBy('updated_at', 'DESC')
        ->get();
        
        return view('HasilLab.index', compact('HasilLab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = DB::table('users')
        ->where('jenis_user',2)
        ->orderBy('name', 'ASC')
        ->get();

        return view('HasilLab.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $HasilLab = new HasilLab();
        $request->validate([
            'id_pasien' => 'required',
            'judul' => 'required',
            'file' => 'required|mimes:jpeg,jpg,png,svg,pdf,docx,doc'
        ]);

        $tempat_upload = public_path('/CekLab');
        $file = $request->file('file');

        //cek apakah kosong atau tidak fotonya
        if($file!=null){
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id_pasien. "_" .$request->id_dokter. "_" .$request->tanggal_pemeriksaan. "_" .$request->judul. "." .$ext;
            $file->move($tempat_upload, $filename);
        }else{
            $filename="no_picture.jpg";
        }
        

        $HasilLab->judul = $request->judul;
        $HasilLab->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $HasilLab->keterangan = $request->keterangan;
        $HasilLab->id_user = $request->id_pasien;
        $HasilLab->id_dokter = $request->id_dokter;
        $HasilLab->file = $filename;
        

        $HasilLab->save(); 

        return redirect('/HasilCekLab');
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
        $HasilLab = HasilLab::find($id);
        $user = User::find($HasilLab->id_dokter);

        return view('HasilLab.edit', compact('HasilLab','user'));
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
        $request->validate([
            'id_pasien' => 'required',
            'judul' => 'required'
        ]);

        $tempat_upload = public_path('/CekLab');
        $file = $request->file('foto');

        //cek apakah kosong atau tidak fotonya
        if($file!=null){
            $ext = $file->getClientOriginalExtension();
            $filename = $request->id_pasien. "_" .$request->id_dokter. "_" .$request->judul. "." .$ext;
            $file->move($tempat_upload, $filename);
        }
        
        $HasilLab = HasilLab::find($id);
        $HasilLab->judul = $request->judul;
        $HasilLab->tanggal_pemeriksaan = $request->tanggal_pemeriksaan;
        $HasilLab->keterangan = $request->keterangan;
        $HasilLab->id_user = $request->id_pasien;
        $HasilLab->id_dokter = $request->id_dokter;

        if($file!=null){
            $HasilLab->file = $filename;
        }
        

        $HasilLab->save(); 

        return redirect('/HasilCekLab');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $HasilLab = HasilLab::find($id);
        $HasilLab->delete();

        return redirect('/HasilCekLab');
    }

    public function loadData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('users')->select('id', 'email')->where('email', 'LIKE', '%$cari%')->get();
            return response()->json($data);
        }
    }
}
