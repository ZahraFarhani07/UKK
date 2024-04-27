@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control  @error('nik') is-invalid @enderror"
                                        name="nik" id="nik" placeholder="Masukkan NIK Karyawan">
                                    @error('nik')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" placeholder="Masukkan Nama">
                                    @error('nama')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select type="text" name="jk" id="jk"
                                        class="form-control @error('jk') is-invalid @enderror">
                                        <option disable selected>--- Pilih Jenis Kelamin ---</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jk')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror"
                                        id="tempat_lahir" name="tempat_lahir"
                                        placeholder="Masukkan Tempat Lahir Karyawan">
                                    @error('tempat_lahir')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        name="tanggal_lahir" id="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}">
                                </div>
                                @error('tanggal_lahir')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_telp" id="no_telp" class="form-control"
                                        placeholder="Masukkan No Telepon">
                                    @error('no_telp')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('agama') is-invalid @enderror"
                                        id="agama" name="agama" placeholder="Masukkan Agama Karyawan">
                                    @error('agama')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_nikah" class="col-sm-2 col-form-label">Status Nikah</label>
                                <div class="col-sm-8">
                                    <select type="text" name="status_nikah" id="status_nikah"
                                        class="form-control @error('status_nikah') is-invalid @enderror">
                                        <option disable selected>--- Pilih Status Nikah ---</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                    </select>
                                    @error('status_nikah')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="alamat" cols="30" rows="10"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        placeholder="Masukkan Alamat Karyawan"></textarea>
                                    @error('alamat')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-8">
                                    <input type="file" name="foto" id="foto"
                                        class="form-control @error('foto') is-invalid @enderror" placeholder=" Masukkan
                                        Foto Karyawan">
                                    @error('foto')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                            <a href="{{ route('karyawan.index') }}" class="btn btn-small btn-secondary"
                                style="margin-left: 8px">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection