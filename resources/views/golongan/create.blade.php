@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA GOLONGAN KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('golongan.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <select name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror">
                                        <option disabled selected>--Pilih Salah Satu--</option>
                                        @forelse ($karyawan as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
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
                                <label for="nama_golongan" class="col-sm-2 col-form-label">Golongan</label>
                                <div class="col-sm-8">
                                    <input type="nama_golongan"
                                        class="form-control  @error('nama_golongan') is-invalid @enderror"
                                        name="nama_golongan" id="nama_golongan"
                                        placeholder="Masukkan Nama Golongan Karyawan">
                                    @error('nama_golongan')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gaji_pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control  @error('gaji_pokok') is-invalid @enderror"
                                        id="gaji_pokok" name="gaji_pokok" placeholder="Masukkan Gaji Pokok Karyawan">
                                    @error('gaji_pokok')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tunjangan_istri" class="col-sm-2 col-form-label">Tunjangan Istri/Suami</label>
                                <div class="col-sm-8">
                                    <input type="number"
                                        class="form-control  @error('tunjangan_istri') is-invalid @enderror"
                                        id="tunjangan_istri" name="tunjangan_istri"
                                        placeholder="Masukkan Tunjangan Karyawan">
                                    @error('tunjangan_istri')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tunjangan_anak" class="col-sm-2 col-form-label">Tunjangan Anak</label>
                                <div class="col-sm-8">
                                    <input type="number"
                                        class="form-control  @error('tunjangan_anak') is-invalid @enderror"
                                        id="tunjangan_anak" name="tunjangan_anak"
                                        placeholder="Masukkan Tunjangan Karyawan">
                                    @error('tunjangan_anak')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tunjangan_transport" class="col-sm-2 col-form-label">Tunjangan
                                    Transport</label>
                                <div class="col-sm-8">
                                    <input type="number"
                                        class="form-control  @error('tunjangan_transport') is-invalid @enderror"
                                        id="tunjangan_transport" name="tunjangan_transport"
                                        placeholder="Masukkan Tunjangan Karyawan">
                                    @error('tunjangan_transport')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tunjangan_makan" class="col-sm-2 col-form-label">Tunjangan Makan</label>
                                <div class="col-sm-8">
                                    <input type="number"
                                        class="form-control  @error('tunjangan_makan') is-invalid @enderror"
                                        id="tunjangan_makan" name="tunjangan_makan"
                                        placeholder="Masukkan Tunjangan Karyawan">
                                    @error('tunjangan_makan')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <a href="{{ route('golongan.index') }}" class="btn btn-small btn-secondary"
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