<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $golongan = Golongan::all();
        return view('golongan.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Karyawan $karyawan)
    {
        $karyawan = Karyawan::all();
        return view('golongan.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Golongan $golongan)
    {
        $request->validate([
            'nama_golongan'      => 'required',
            'nama'               => 'required',
            'gaji_pokok'         => 'required|numeric',
            'tunjangan_istri'    => 'required|numeric',
            'tunjangan_anak'     => 'required|numeric',
            'tunjangan_transport'=> 'required|numeric',
            'tunjangan_makan'    => 'required|numeric',
        ]);

        $golongan::create([
            'nama_golongan' => $request['nama_golongan'],
            'gaji_pokok' => $request['gaji_pokok'],
            'tunjangan_istri' => $request['tunjangan_istri'],
            'tunjangan_anak' => $request['tunjangan_anak'],
            'tunjangan_transport' => $request['tunjangan_transport'],
            'tunjangan_makan' => $request['tunjangan_makan'],
            'karyawan_id' => $request['nama'],
        ]);

        return redirect()->route('golongan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $golongan = Golongan::findOrFail($id);
        $karyawan = Karyawan::find($golongan->karyawan_id); 
        return view('golongan.show', compact('golongan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $golongan = Golongan::find($id);
        $karyawan = Karyawan::all();
        return view('golongan.edit', compact('golongan', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $request->validate([
            'nama_golongan'      => 'required',
            'nama'               => 'required',
            'gaji_pokok'         => 'required|numeric',
            'tunjangan_istri'    => 'required|numeric',
            'tunjangan_anak'     => 'required|numeric',
            'tunjangan_transport'=> 'required|numeric',
            'tunjangan_makan'    => 'required|numeric',
        ]);
        
        $query = DB::table('golongans')->where('id', $id)->update([
            'nama_golongan' => $request['nama_golongan'],
            'gaji_pokok' => $request['gaji_pokok'],
            'tunjangan_istri' => $request['tunjangan_istri'],
            'tunjangan_anak' => $request['tunjangan_anak'],
            'tunjangan_transport' => $request['tunjangan_transport'],
            'tunjangan_makan' => $request['tunjangan_makan'],
            'karyawan_id' => $request['nama'],
        ]);
        
        return redirect()->route('golongan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $query =  DB::table('golongans')->where('id', $id)->delete();
        return redirect()->route('golongan.index');
    }
}