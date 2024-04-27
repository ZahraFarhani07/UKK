@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control  @error('nik') is-invalid @enderror"
                                        name="nik" id="nik" value="{{ old('nik', $karyawan->nik) }}">
                                    @error('nik')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama', $karyawan->nama) }}">
                                    @error('nama')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select name="jk" id="jk" class="form-control @error('jk') is-invalid @enderror"
                                        value="{{ $karyawan->jk }}">
                                        <option value="Laki-Laki" @if($karyawan->jk == 'Laki-Laki') selected @endif>L
                                        </option>
                                        <option value="Perempuan" @if($karyawan->jk == 'Perempuan') selected @endif>P
                                        </option>
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
                                        id="tempat_lahir" name="tempat_lahir" value="{{ $karyawan->tempat_lahir }}">
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
                                        value="{{ old('tanggal_lahir',  $karyawan->tanggal_lahir) }}">
                                </div>
                                @error('tanggal_lahir')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_telp" id="no_telp"
                                        class="form-control @error('no_telp') is-invalid @enderror"
                                        value="{{ $karyawan->no_telp }}">
                                    @error('no_telp')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('agama') is-invalid @enderror"
                                        id="agama" name="agama" value="{{ $karyawan->agama }}">
                                    @error('agama')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status_nikah" class="col-sm-2 col-form-label">Status Nikah</label>
                                <div class="col-sm-8">
                                    <select name="status_nikah" id="status_nikah"
                                        class="form-control @error('status_nikah') is-invalid @enderror"
                                        value="{{ $karyawan->status_nikah }}">
                                        <option value="Belum Menikah" @if($karyawan->status_nikah == 'Belum Menikah')
                                            selected @endif>Belum Menikah
                                        </option>
                                        <option value="Sudah Menikah" @if($karyawan->status_nikah == 'Sudah Menikah')
                                            selected @endif>Sudah Menikah
                                        </option>
                                    </select>
                                    @error('status_nikah')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" id="alamat" cols="30" rows="5"
                                        class="form-control @error('alamat') is-invalid @enderror">{{ $karyawan->alamat }}</textarea>
                                    @error('alamat')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-8">
                                    <input type="file" name="foto" id="foto"
                                        class="form-control @error('foto') is-invalid @enderror"  value="{{ $karyawan->foto }}">
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
</section>
@endsection