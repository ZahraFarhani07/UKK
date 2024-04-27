@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    @csrf
                    <div class="card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ $karyawan->foto }}"
                                    alt="User profile picture">
                            </div>
                            <div class="row ml-3 mr-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="col-form-label">Nama:</label>
                                        <input type="text" name="nama" id="nama" class="form-control"
                                            value="{{ $karyawan->nama }}" disabled>
                                    </div>
                                </div>
                                <!-- Data Jenis Kelamin -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nik" class="col-form-label">NIK:</label>
                                        <input type="text" name="nik" id="nik" class="form-control"
                                            value="{{ $karyawan->nik }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jk" class="col-form-label">Jenis Kelamin:</label>
                                        <input type="text" name="jk" id="jk" class="form-control"
                                            value="{{ $karyawan->jk }}" disabled>
                                    </div>
                                </div>
                                <!-- Data Tempat Lahir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tempat_lahir" class="col-form-label">Tempat Lahir:</label>
                                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                            value="{{ $karyawan->tempat_lahir }}" disabled>
                                    </div>
                                </div>
                                <!-- Data Tanggal Lahir -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_lahir" class="col-form-label">Tanggal Lahir:</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                            value="{{ $karyawan->tanggal_lahir }}" disabled>
                                    </div>
                                </div>
                                <!-- Data No Telepon -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="no_telp" class="col-form-label">No Telepon:</label>
                                        <input type="text" name="no_telp" id="no_telp" class="form-control"
                                            value="{{ $karyawan->no_telp }}" disabled>
                                    </div>
                                </div>
                                <!-- Data Agama -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="agama" class="col-form-label">Agama:</label>
                                        <input type="text" class="form-control" id="agama" name="agama"
                                            value="{{ $karyawan->agama }}" disabled>
                                    </div>
                                </div>
                                <!-- Data Status Nikah -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status_nikah" class="col-form-label">Status Nikah:</label>
                                        <input type="text" name="status_nikah" id="status_nikah" class="form-control"
                                            value="{{ $karyawan->status_nikah }}" disabled>
                                    </div>
                                </div>
                                <!-- Data Alamat -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamat" class="col-form-label">Alamat:</label>
                                        <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control"
                                            disabled>{{ $karyawan->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                            @can('isAdmin')
                            <div class="col-sm-8">
                                <a href="{{ route('karyawan.index') }}" class="btn btn-small btn-secondary"
                                    style="margin-left: 8px">Kembali</a>
                            </div>
                            @endcan

                            @can('isAccounting')
                            <div class="col-sm-8">
                                <a href="{{ route('auth.dashboard') }}" class="btn btn-small btn-secondary"
                                    style="margin-left: 8px">Kembali</a>
                            </div>
                            @endcan

                            @can('isKaryawan')
                            <div class="col-sm-8">
                                <a href="{{ route('auth.dashboard') }}" class="btn btn-small btn-secondary"
                                    style="margin-left: 8px">Kembali</a>
                            </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection