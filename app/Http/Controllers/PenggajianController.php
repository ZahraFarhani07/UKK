<?php

namespace App\Http\Controllers;

use App\Models\Penggajian;
use App\Models\Golongan;
use App\Models\Lembur;
use App\Models\Cuti;
// use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Karyawan;
// use App\Exports\ExportGaji;
// use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Redirect,Response;
use Illuminate\Support\Facades\DB;

class PenggajianController extends Controller
{
    // ...

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data penggajian
        $penggajians = Penggajian::all();

        // Tampilkan halaman index dengan data penggajian
        return view('penggajian.index', compact('penggajians'));
    }

    // public function cetakgaji()
    // {
    //     // Ambil semua data penggajian
    //     $penggajians = Penggajian::all();

    //     // Tampilkan halaman index dengan data penggajian
    //     return view('penggajian.cetak-gaji', compact('penggajians'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data karyawan (untuk pilihan dropdown)
        $karyawan = Karyawan::all();

        // Tampilkan halaman create dengan data karyawan
        return view('penggajian.create', compact('karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Penggajian $penggajian )
    {
        // Validasi input form
        $request->validate([
            'tanggal' => 'required',
            'keterangan' => 'required',
            'nama' => 'required',
            'jumlah_gaji' => 'required',
            'jumlah_lembur' => 'required',
            'potongan' => 'required',
            'total_gaji' => 'required',
        ]);

        $penggajian::create([
            'tanggal' => $request['tanggal'],
            'keterangan' => $request['keterangan'],
            'karyawan_id' => $request['nama'],
            'jumlah_gaji' => $request['jumlah_gaji'],
            'jumlah_lembur' => $request['jumlah_lembur'],
            'jumlah_cuti' => $request['potongan'],
            'total_gaji' => $request['total_gaji'],
        ]);
        return redirect()->route('accounting.penggajian.index')->with('success', 'Penggajian berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $penggajian = Penggajian::findOrFail($id);
        // $karyawan = Karyawan::find($penggajian->karyawan_id); // Mengambil buku berdasarkan ID tertentu
        // return view('penggajian.show', compact('penggajian'));
        $penggajian = Penggajian::with('karyawan')->findOrFail($id);
        return view('penggajian.show', compact('penggajian'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penggajian = Penggajian::find($id);
        $karyawan = Karyawan::all();
        return view('penggajian.edit', compact('penggajian', 'karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    // Validasi data penggajian
    $request->validate([
        'tanggal' => 'required',
        'keterangan' => 'required',
        'nama' => 'required',
        'jumlah_gaji' => 'required',
        'jumlah_lembur' => 'required',
        'potongan' => 'required',
        'total_gaji' => 'required',
    ]);

    $query = DB::table('penggajians')->where('id', $id)->update([
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
        'karyawan_id' => $request->nama,
        'jumlah_gaji' => $request->jumlah_gaji,
        'jumlah_lembur' => $request->jumlah_lembur,
        'jumlah_cuti' => $request->potongan,
        'total_gaji' => $request->total_gaji,
    ]);
    return redirect()->route('accounting.penggajian.index')->with('success', 'Penggajian berhasil disimpan.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penggajian $penggajian)
    {
        // Hapus data penggajian berdasarkan ID
        $penggajian->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.penggajian.index')->with('success', 'Penggajian berhasil dihapus.');
    }

    public function getEmployeeData($id)
    {
        $where = array('karyawan_id' => $id);
        $karyawan  = Penggajian::where($where)->first();
        return Response::json($karyawan);
    }

    public function getEmployeeLembur($id)
    {
        $where = array('karyawan_id' => $id);
        $lembur = Lembur::where($where)->get();
        return response()->json($lembur);
    }

    public function getEmployeeGolongan($id)
    {
        $where = array('karyawan_id' => $id);
        $golongan = Golongan::where($where)->get();
        return response()->json($golongan);
    }

    public function getEmployeeCuti($id)
    {
        $where = array('karyawan_id' => $id);
        $cuti = Cuti::where($where)->get();
        return response()->json($cuti);
    }
        
}
