<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class daftarPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.daftarPasien');
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
        $users = new User();
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jenis_kelamin' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
            'golongan_darah' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png,svg'
        ]);

        $tempat_upload = public_path('/foto');
        $foto = $request->file('foto');

        //cek apakah kosong atau tidak fotonya
        if($foto!=null){
            $ext = $foto->getClientOriginalExtension();
            $filename = $request->name. "." . $ext;
            $foto->move($tempat_upload, $filename);
        }else{
            $filename="default.png";
        }
        

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->tanggal_lahir = $request->tanggal_lahir;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->alamat = $request->alamat;
        $users->no_ktp = $request->no_ktp;
        $users->no_telp = $request->no_telp;
        $users->jenis_user = $request->jenis_user;
        $users->golongan_darah = $request->golongan_darah;
        $users->foto = $filename;
        

        $users->save(); 

        return redirect('/login');
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
