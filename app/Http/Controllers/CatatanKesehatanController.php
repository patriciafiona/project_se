<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CatatanKesehatan;
use App\User;

class CatatanKesehatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CatatanKesehatan = CatatanKesehatan::all();
        $User = User::all();
        return view('CatatanKesehatan.index', compact('CatatanKesehatan', 'User'));
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

        $CatatanKesehatan->save(); 

        return redirect('home');
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
