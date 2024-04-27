@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA GOLONGAN KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ $golongan->karyawan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_golongan" class="col-sm-2 col-form-label">Nama Golongan</label>
                            <div class="col-sm-8">
                                <input type="nama_golongan" class="form-control" name="nama_golongan" id="nama_golongan"
                                    value="{{ $golongan->nama_golongan }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gaji_pokok" class="col-sm-2 col-form-label">Gaji Pokok</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok"
                                    value="{{ $golongan->gaji_pokok }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tunjangan_istri" class="col-sm-2 col-form-label">Tunjangan Istri/Suami</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="tunjangan_istri" name="tunjangan_istri"
                                    value="{{ $golongan->tunjangan_istri }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tunjangan_anak" class="col-sm-2 col-form-label">Tunjangan Anak</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="tunjangan_anak" name="tunjangan_anak"
                                    value="{{ $golongan->tunjangan_anak }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tunjangan_transport" class="col-sm-2 col-form-label">Tunjangan
                                Transport</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="tunjangan_transport"
                                    name="tunjangan_transport" value="{{ $golongan->tunjangan_transport }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tunjangan_makan" class="col-sm-2 col-form-label">Tunjangan Makan</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="tunjangan_makan" name="tunjangan_makan"
                                    value="{{ $golongan->tunjangan_makan }}" disabled>
                            </div>
                        </div>
                        @can('isAdmin')
                    <div class="col-sm-8">
                        <a href="{{ route('golongan.index') }}" class="btn btn-small btn-secondary"
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
</section>
@endsection