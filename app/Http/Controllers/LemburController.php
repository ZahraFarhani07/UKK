<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use App\Models\Karyawan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LemburController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lembur = Lembur::all();
        return view('lembur.index', compact('lembur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('lembur.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lembur $lembur)
    {
        $request->validate([
            'tanggal_lembur' => 'required',
            'jumlah_lembur' => 'required',
            'nama' => 'required',
        ]);

        $lembur::create([
            'tanggal_lembur' => $request['tanggal_lembur'],
            'jumlah_lembur' => $request['jumlah_lembur'],
            'karyawan_id' => $request['nama'],
        ]);
        return redirect()->route('lembur.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $lembur = Lembur::findOrFail($id);
        $karyawan = Karyawan::find($lembur->karyawan_id); 
        return view('lembur.show', compact('lembur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lembur = Lembur::find($id);
        $karyawan = Karyawan::all();
        return view('lembur.edit', compact('lembur', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal_lembur' => 'required',
            'jumlah_lembur' => 'required',
            'nama' => 'required',
        ]);

        $query = DB::table('lemburs')->where('id', $id)->update([
            'tanggal_lembur' => $request['tanggal_lembur'],
            'jumlah_lembur' => $request['jumlah_lembur'],
            'karyawan_id' => $request['nama'],
        ]);
        return redirect()->route('lembur.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lembur $lembur)
    {
        $lembur->delete();
        return redirect()->route('lembur.index');
    }
}
