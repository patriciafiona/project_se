<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PasienTetap;
use Carbon\Carbon;
use Auth;

class PasienTetapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien_id =  auth()->user()->id ;

        //rekam medis pasien
        $pasienTetap = DB::table('pasien_tetaps')
        ->join('users', 'users.id', '=', 'pasien_tetaps.id_pasien')
        ->select('pasien_tetaps.*', 'users.name', 'users.foto') //nama pasien
        ->where('id_dokter', $pasien_id)
        ->orderBy('users.name', 'ASC')
        ->Paginate(9);

        $jumlah = DB::table('pasien_tetaps')
        ->join('users', 'users.id', '=', 'pasien_tetaps.id_pasien')
        ->select('pasien_tetaps.*', 'users.name', 'users.foto') //nama pasien
        ->where('id_dokter', $pasien_id)
        ->count();

        return view('D_Pasien.index',compact('pasienTetap','jumlah'));
    }

    public function validation($id)
    {
        $user = DB::table('users')
        ->where('id', $id)
        ->get();

        return view('D_Pasien.remove_validation',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if((auth()->user()->id) == ($id)){

            $users = DB::table('users')
            ->where('jenis_user',2)
            ->orderBy('name', 'ASC')
            ->get();

            return view('D_Pasien.add',compact('users'));

        }else{
            return back()->withStatus(__('Error: You are submit ID Doctor with other ID.'));
        }
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
            if((auth()->user()->id) != ($request->id_pasien)){

                $PasienTetap = new PasienTetap();
                $request->validate([
                    'id_pasien' => 'required'
                ]);

                $PasienTetap->id_pasien = $request->id_pasien;
                $PasienTetap->id_dokter = auth()->user()->id ;

                $PasienTetap->save(); 

                return redirect('/PasienTetap');


            }else{ //id pasien sama dengan id dokter

                return back()->withStatus(__('Error: You are submit ID Patient with your ID.'));

            }
        }catch(\Exception $e){
            return back()->withStatus(__('Add Patient Failed...!!! Please try again'));
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
        DB::table('pasien_tetaps')
        ->where('id_dokter', auth()->user()->id)
        ->where('id_pasien',$id)
        ->delete();

        return $this->index();
    }
}
