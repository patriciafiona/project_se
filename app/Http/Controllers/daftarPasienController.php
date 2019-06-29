<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class daftarPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function temporary_photo()
    {

        //pindahin ke file tampung
        $data = $_POST["image"];

        $image_array_1 = explode(";", $data);

        $image_array_2 = explode(",", $image_array_1[1]);

        $data = base64_decode($image_array_2[1]);

        $clientIP = \Request::ip();
        $imageName = "../public/foto/temp/".$clientIP.".png";       //nama filenya???

        //hapus file lama
        if (!isset($imageName) && !unlink($file))
          {
            echo ("Error deleting $file");
          }
        else
          {
            //upload gambarnya ke path
            file_put_contents($imageName, $data);
          }     
    }

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

        try {
            $users = new User();

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:5',
                'jenis_kelamin' => 'required',
                'no_ktp' => 'required',
                'no_telp' => 'required',
                'golongan_darah' => 'required',
                'foto' => 'image|mimes:jpeg,jpg,png,svg'
            ]);

            //-------------------------------------------------------------------------------------------------

            //cek apakah kosong atau tidak fotonya

            $foto = $request->foto;

            if($foto==null){
                $filename="default.png";
            }else{
                $clientIP = \Request::ip();
                $filename= $request->name.".png";

                $old_path = '../public/foto/temp/'.$clientIP.'.png';
                $new_path = '../public/foto/'.$request->name.'.png';

                $move = File::move($old_path, $new_path);

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

                return redirect('/login')->withStatus(__('Sign up Success...!!!'));
            }

        }catch(\Exception $e){
            return back()->withStatus(__('Sign up Failed...!!! Please try again '.$e));
        }
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
