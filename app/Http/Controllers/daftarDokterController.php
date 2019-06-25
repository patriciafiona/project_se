<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dokumen;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class daftarDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.daftarDokter');
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
            $dokumens = new Dokumen();

            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|min:5',
                'jenis_kelamin' => 'required',
                'no_ktp' => 'required',
                'no_telp' => 'required',
                'golongan_darah' => 'required',
                'foto' => 'image|mimes:jpeg,jpg,png,svg',

                'ijazah_sma'        => 'image|mimes:jpeg,jpg,png,svg,pdf',
                'ijazah_kedokteran' => 'image|mimes:jpeg,jpg,png,svg,pdf',
                'foto_ktp'          => 'image|mimes:jpeg,jpg,png,svg',
                'foto_kk'           => 'image|mimes:jpeg,jpg,png,svg'
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

            //----------------------------------------------------------
            //Proses masukin dokumen dokter

            //cari id user yang tadi dimasukin
            $user_id = DB::table('users')
            ->where('email', $request->email)
            ->get();

            //ijazah sma
            $tempat_1 = public_path('/Dokumen dokter/Ijazah SMA');
            $i_1 = $request->file('ijazah_sma');

            //ijazah kedokteran
            $tempat_2 = public_path('/Dokumen dokter/Ijazah Kedokteran');
            $i_2 = $request->file('ijazah_kedokteran');

            //Foto KTP
            $tempat_3 = public_path('/Dokumen dokter/KTP');
            $i_3 = $request->file('foto_ktp');

            //Foto KK
            $tempat_4 = public_path('/Dokumen dokter/Kartu Keluarga');
            $i_4 = $request->file('foto_kk');

            //cek apakah kosong atau tidak fotonya
            if($i_1!=null && $i_2!=null && $i_3!=null && $i_4!=null){
                $ext = $i_1->getClientOriginalExtension();
                $filename_1 = "ijazahSma_" .$request->name. "." . $ext;
                $i_1->move($tempat_1, $filename_1);
            
                $ext = $i_2->getClientOriginalExtension();
                $filename_2 = "ijazahS1_" .$request->name. "." . $ext;
                $i_2->move($tempat_2, $filename_2);
             
                $ext = $i_3->getClientOriginalExtension();
                $filename_3 = "KTP_" .$request->name. "." . $ext;
                $i_3->move($tempat_3, $filename_3);
             
                $ext = $i_4->getClientOriginalExtension();
                $filename_4 = "KK_" .$request->name. "." . $ext;
                $i_4->move($tempat_4, $filename_4);
            }else{
                return back()->withStatus(__('Error : File is Null'));
            }


            $dokumens->id_user = $user_id[0]->id;
            $dokumens->ijazah_sma = $filename_1;
            $dokumens->ijazah_kedokteran = $filename_2;
            $dokumens->foto_ktp = $filename_3;
            $dokumens->foto_kk = $filename_4;
            

            //simpan ke database
            $dokumens->save();


            //----------------------------------------------------------

            return redirect('/login')->withStatus(__('Sign up Success...!!!'));

        }catch(\Exception $e){
            return back()->withStatus(__('Sign up Failed...!!! Please try again'));
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
