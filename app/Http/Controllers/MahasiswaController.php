<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
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

    public function getMahasiswaById(Request $request)
    {
        $mahasiswa = Mahasiswa::find($request->id);

        return response()->json([
            'success' => true,
            'message' => 'All mahasiswa grabbed',
            'data' => [
                'mahasiswa' => [
                    'nim' => $mahasiswa->nim,
                    'nama' => $mahasiswa->nama,
                    'angkatan' => $mahasiswa->angkatan
                ]
            ]
        ]);
    }
    
    public function addMatakuliah(Request $request)
    {
        $mahasiswa = $request->mahasiswa;

        $mahasiswa->matakuliah()->attach($request->mkId);

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah added to mahasiswa',
        ]);
    }

    public function delMatakuliah(Request $request)
    {
        $mahasiswa = $request->mahasiswa;

        $mahasiswa->matakuliah()->detach($request->mkId);

        return response()->json([
            'success' => true,
            'message' => 'Mata kuliah deleted from mahasiswa',
        ]);
    }

    public function getMahasiswaMatkul(Request $request)
    {
        $mahasiswa = $request->mahasiswa;

        return response()->json([
            'success' => true,
            'message' => 'All mahasiswa grabbed',
            'data' => [
                'mahasiswa' => [
                    'matkul' => $mahasiswa->matakuliahs, //response tags
                ]
            ]
        ]);
    }

    public function getAllMahasiswa()
    {
        $mahasiswa = Mahasiswa::get();
        return response()->json([
            'success' => true,
            'message' => 'grabbed all mahasiswa',
           'mahasiswa' => $mahasiswa
        ]);
    }

    public function getAllMahasiswabyProfile(Request $request)
    {
        $mahasiswa = $request->mahasiswa;

        return response()->json([
            'success' => true,
            'message' => 'grabbed all mahasiswa',
           'mahasiswa' => $mahasiswa
        ]);
    }

    public function getAllMahasiswabyNim($nim)
    {
        $mahasiswa = Mahasiswa::with("matakuliah")->find($nim);
        
        return response()->json([
            'success' => true,
            'message' => 'grabbed one mahasiswa',
           'mahasiswa' => $mahasiswa
        ]);
    }

    }