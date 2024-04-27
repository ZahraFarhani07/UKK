<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuti = Cuti::all();
        return view('cuti.index', compact('cuti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('cuti.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Cuti $cuti)
    {
        $request->validate([
            'tanggal_cuti' => 'required',
            'jumlah_cuti' => 'required',
            'nama' => 'required',
        ]);

        $cuti::create([
            'tanggal_cuti' => $request['tanggal_cuti'],
            'jumlah_cuti' => $request['jumlah_cuti'],
            'karyawan_id' => $request['nama'],
        ]);
        return redirect()->route('cuti.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cuti = Cuti::findOrFail($id);
        $karyawan = Karyawan::find($cuti->karyawan_id); 
        return view('cuti.show', compact('cuti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cuti = Cuti::find($id);
        $karyawan = Karyawan::all();
        return view('cuti.edit', compact('cuti', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_cuti' => 'required',
            'jumlah_cuti' => 'required',
            'nama' => 'required',
        ]);

        $query = DB::table('cutis')->where('id', $id)->update([
            'tanggal_cuti' => $request['tanggal_cuti'],
            'jumlah_cuti' => $request['jumlah_cuti'],
            'karyawan_id' => $request['nama'],
        ]);
        return redirect()->route('cuti.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('cuti.index');
    }
}
