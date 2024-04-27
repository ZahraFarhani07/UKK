@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA CUTI KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('cuti.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <select name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror">
                                        <option disabled selected>--Pilih Salah Satu--</option>
                                        @forelse ($karyawan as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nama}}</option>
                                        @empty
                                        <option disabled>--Data Masih Kosong--</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            @error('nama')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group row">
                                <label for="tanggal_cuti" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control @error('tanggal_cuti') is-invalid @enderror"
                                        name="tanggal_cuti" id="tanggal_cuti"
                                        value="{{ old('tanggal_cuti', date('Y-m-d')) }}">
                                    @error('tanggal_cuti')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_cuti" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('jumlah_cuti') is-invalid @enderror"
                                        id="jumlah_cuti" name="jumlah_cuti" placeholder="Masukkan Jumlah Cuti">
                                    @error('jumlah_cuti')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="jumlah_cuti" class="col-sm-2 col-form-label">Hari</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <a href="{{ route('cuti.index') }}" class="btn btn-small btn-secondary"
                                style="margin-left: 8px">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection