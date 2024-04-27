@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA CUTI KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('cuti.update', $cuti->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <select name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror">
                                        <option disabled selected>--Pilih Salah Satu--</option>
                                        @forelse ($karyawan as $value)
                                        <option value="{{ $value->id }}"
                                            {{ $value->id == $cuti->karyawan_id ? 'selected' : '' }}>
                                            {{ $value->nama}}
                                        </option>
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
                                <label for="_cuti" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control @error('tanggal_cuti') is-invalid @enderror"
                                        name="tanggal_cuti" id="tanggal_cuti"
                                        value="{{ old('nama', $cuti->tanggal_cuti) }}">
                                </div>
                                @error('tanggal_cuti')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_cuti" class="col-sm-2 col-form-label">Jumlah Cuti</label>
                                <div class="col-sm-8">
                                    <input type="number"
                                        class="form-control  @error('jumlah_cuti') is-invalid @enderror"
                                        id="jumlah_cuti" name="jumlah_cuti"
                                        value="{{ old('nama', $cuti->jumlah_cuti) }}">
                                    @error('jumlah_cuti')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="jumlah_cuti" class="col-sm-2 col-form-label">Hari</label>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <a href="{{ route('cuti.index') }}" class="btn btn-small btn-secondary"
                                    style="margin-left: 8px">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection