<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */

    public function editProfile()
    {
        $user = DB::table('users')
        ->where('id', (auth()->user()->id))
        ->get();

        return view('profile.profilePicture', compact('user'));
    }

    public function updateProfile(){
        return 2;
    }

    public function edit()
    {
        //cari umur dia sekarang
        $user_id = auth()->user()->id;

        $user = DB::table('users')
        ->where('id', $user_id)
        ->get();

        $years = Carbon::parse($user[0]->tanggal_lahir)->age;

        //hitung rekam medis yang udah ada ada berapa
        $jumlah_rm = DB::table('rekam_medis')
        ->where('id_pasien', $user_id)
        ->count();

        //hitung jumlah hasil cek lab
        $jumlah_hl = DB::table('hasil_labs')
        ->where('id_user', $user_id)
        ->count();

        return view('profile.edit', compact('years','jumlah_rm','jumlah_hl'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'no_ktp' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'golongan_darah' => 'required'
        ]);

        $users = User::find($user_id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->tanggal_lahir = $request->tanggal_lahir;
        $users->jenis_kelamin = $request->jenis_kelamin;
        $users->alamat = $request->alamat;
        $users->no_ktp = $request->no_ktp;
        $users->no_telp = $request->no_telp;
        $users->golongan_darah = $request->golongan_darah;
        

        $users->save(); 

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    public function destroy($id)
    {
        $CatatanKesehatan = CatatanKesehatan::find($id);
        $CatatanKesehatan->delete();

        return redirect('/CatatanKesehatan');
    }
    
}
