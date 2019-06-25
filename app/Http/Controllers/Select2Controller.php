<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Select2Controller extends Controller
{

    public function select2IdPasien(Request $request)
    {
        $search = $request->get('request');

        $lihat_user = DB::table('users')
        ->where('name', 'like', '%' . $search . '%')
        ->orWhere('email', 'like', '%' . $search . '%')
        ->where('jenis_user',3)
        ->orderBy('name', 'ASC')
        ->get()
        ->toArray();

        return response()->with('lihat_user',json_encode($lihat_user,JSON_NUMERIC_CHECK));
    }

}
