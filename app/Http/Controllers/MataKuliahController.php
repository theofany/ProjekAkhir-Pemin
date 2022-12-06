<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getAllMatkul()
    {
        $matakuliah =  MataKuliah::all();
        return response()->json([
            'success' => true,
            'message' => 'grabbed all mata kuliah',
            'matakuliah' => $matakuliah
        ]);
    }

    


}
