<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\HasilLab;
use Auth;

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
        return view('HasilLab.create');
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
            'id_dokter' => 'required',
            'judul' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,svg'
        ]);

        $tempat_upload = public_path('/CekLab');
        $foto = $request->file('foto');

        //cek apakah kosong atau tidak fotonya
        if($foto!=null){
            $ext = $foto->getClientOriginalExtension();
            $filename = $request->id_pasien. "_" .$request->id_dokter. "_" .$request->judul. "." .$ext;
            $foto->move($tempat_upload, $filename);
        }else{
            $filename="no_picture.jpg";
        }
        

        $HasilLab->judul = $request->judul;
        $HasilLab->keterangan = $request->keterangan;
        $HasilLab->id_user = $request->id_pasien;
        $HasilLab->id_dokter = $request->id_dokter;
        $HasilLab->foto = $filename;
        

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
        $HasilLab=HasilLab::find($id);
        return view('HasilLab.edit', compact('HasilLab'));
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
            'id_dokter' => 'required',
            'judul' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,svg'
        ]);

        $tempat_upload = public_path('/CekLab');
        $foto = $request->file('foto');

        //cek apakah kosong atau tidak fotonya
        if($foto!=null){
            $ext = $foto->getClientOriginalExtension();
            $filename = $request->id_pasien. "_" .$request->id_dokter. "_" .$request->judul. "." .$ext;
            $foto->move($tempat_upload, $filename);
        }
        
        $HasilLab = HasilLab::find($id);
        $HasilLab->judul = $request->judul;
        $HasilLab->keterangan = $request->keterangan;
        $HasilLab->id_user = $request->id_pasien;
        $HasilLab->id_dokter = $request->id_dokter;

        if($foto!=null){
            $HasilLab->foto = $filename;
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
}
