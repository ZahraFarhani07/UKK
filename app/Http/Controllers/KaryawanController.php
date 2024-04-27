<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\CloudinaryStorage;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // Sesuaikan dengan aturan validasi Anda
            'nik' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar ke Cloudinary
        $image = $request->file('foto');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

        // Simpan data karyawan
        Karyawan::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'agama' => $request->agama,
            'status_nikah' => $request->status_nikah,
            'alamat' => $request->alamat,
            'foto' => $result,
        ]);

        return redirect()->route('karyawan.index');
    }

    public function show($id)
    {
        
        $karyawan = Karyawan::findOrFail($id);
        // Memastikan pengguna memiliki izin untuk melihat data karyawan
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // Sesuaikan dengan aturan validasi Anda
            'nik' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required',
            'agama' => 'required',
            'status_nikah' => 'required',
            'alamat' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Upload gambar ke Cloudinary
        $image = $request->file('foto');
        $result = CloudinaryStorage::upload($image->getRealPath(), $image->getClientOriginalName());

        // Update data karyawan
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update([
            // Sesuaikan dengan kolom tabel yang ingin diupdate
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telp' => $request->no_telp,
            'agama' => $request->agama,
            'status_nikah' => $request->status_nikah,
            'alamat' => $request->alamat,
            'foto' => $result,        
        ]);

        return redirect()->route('karyawan.index');
    }

    public function destroy($id)
    {
        // Hapus data karyawan
        Karyawan::destroy($id);

        return redirect()->route('karyawan.index');
    }

    // app/Http/Controllers/KaryawanController.php
    public function search(Request $request)
    {
        $term = $request->term;

        $results = Karyawan::where('nama', 'LIKE', '%' . $term . '%')->get();

        return response()->json($results);
    }

}
