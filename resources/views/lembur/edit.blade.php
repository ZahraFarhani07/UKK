@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA LEMBUR KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('lembur.update', $lembur->id) }}" method="POST">
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
                                            {{ $value->id == $lembur->karyawan_id ? 'selected' : '' }}>
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
                                <label for="tanggal_lembur" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date"
                                        class="form-control @error('tanggal_lembur') is-invalid @enderror"
                                        name="tanggal_lembur" id="tanggal_lembur"
                                        value="{{ old('nama', $lembur->tanggal_lembur) }}">
                                </div>
                                @error('tanggal_lembur')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_lembur" class="col-sm-2 col-form-label">Jumlah Lembur</label>
                                <div class="col-sm-8">
                                    <input type="number"
                                        class="form-control  @error('jumlah_lembur') is-invalid @enderror"
                                        id="jumlah_lembur" name="jumlah_lembur"
                                        value="{{ old('nama', $lembur->jumlah_lembur) }}">
                                    @error('jumlah_lembur')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <label for="jumlah_cuti" class="col-sm-2 col-form-label">Jam</label>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <a href="{{ route('lembur.index') }}" class="btn btn-small btn-secondary"
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