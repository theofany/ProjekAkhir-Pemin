<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function Home(Request $request)
    {
        $mahasiswa = $request->mahasiswa;

        return response()->json([
            'status' => 'Success',
            'message' => 'selamat datang ' . $mahasiswa->nama,
        ], 200);
    }

    //
}
