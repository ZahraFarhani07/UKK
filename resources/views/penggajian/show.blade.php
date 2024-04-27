@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">SLIP GAJI</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="fw-bold mb-4">Informasi Karyawan</h4>
                                <p><strong>Nama:</strong> {{ $penggajian->karyawan->nama }}</p>
                                <p><strong>Tanggal:</strong> {{ $penggajian->tanggal }}</p>
                                <p><strong>Keterangan:</strong> {{ $penggajian->keterangan }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4 class="fw-bold mb-4">Rincian Gaji</h4>
                                <p><strong>Jumlah Gaji:</strong> {{ $penggajian->jumlah_gaji }}</p>
                                <p><strong>Jumlah Lembur:</strong> {{ $penggajian->jumlah_lembur }}</p>
                                <p><strong>Potongan:</strong> {{ $penggajian->jumlah_cuti }}</p>
                                <p><strong>Total Gaji:</strong> {{ $penggajian->total_gaji }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-sm-8">
                            @can('isKaryawan')
                            <a href="{{ route('auth.dashboard') }}" class="btn btn-small btn-secondary"
                                style="margin-left: 8px">Kembali</a>
                            @endcan
                            @can('isAccounting')
                            <a href="{{ route('accounting.penggajian.index') }}" class="btn btn-small btn-secondary"
                                style="margin-left: 8px">Kembali</a>
                            @endcan
                            @can('isAdmin')
                            <a href="{{ route('admin.penggajian.index') }}" class="btn btn-small btn-secondary"
                                style="margin-left: 8px">Kembali</a>
                            @endcan
                            <a href="{{ route('cetak-gaji', $penggajian->id) }}" class="btn btn-small btn-primary"
                                style="margin-left: 8px">Download</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection