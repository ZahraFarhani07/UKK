<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\Penggajian;

class CetakGajiController extends Controller
{
    public function cetakgaji(Penggajian $penggajian)
    {
        // Pastikan $penggajian adalah objek, bukan array
        $karyawan = $penggajian->karyawan ?? null;

        // Cek apakah karyawan ada untuk menghindari error jika null
        if ($karyawan) {
            $data = [
                'nama' => $karyawan->nama,
                'tanggal' => $penggajian->tanggal,
                'keterangan' => $penggajian->keterangan,
                'jumlah_gaji' => $penggajian->jumlah_gaji,
                'jumlah_lembur' => $penggajian->jumlah_lembur,
                'jumlah_cuti' => $penggajian->jumlah_cuti,
                'total_gaji' => $penggajian->total_gaji,
            ];

            $pdf = PDF::loadView('penggajian.cetak-gaji', compact('data'));
            return $pdf->download('laporan.pdf');
        } else {
            // Handle jika karyawan tidak ditemukan
            return response()->json(['error' => 'Karyawan tidak ditemukan.']);
        }
    }
}
