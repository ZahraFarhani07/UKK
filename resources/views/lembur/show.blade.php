@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA LEMBUR KARYAWAN</h1>
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
                                    value="{{ $lembur->karyawan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lembur" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('tanggal_lembur') is-invalid @enderror"
                                    name="tanggal_lembur" id="tanggal_lembur"
                                    value="{{ old('tanggal_lembur', $lembur->tanggal_lembur) }}" disabled>
                                @error('tanggal_lembur')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_lembur" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control  @error('jumlah_lembur') is-invalid @enderror"
                                    id="jumlah_lembur" name="jumlah_lembur" value="{{ $lembur->jumlah_lembur }}"
                                    disabled>
                                @error('jumlah_lembur')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <label for="jumlah_lembur" class="col-sm-2 col-form-label">Hari</label>
                        </div>
                        @can('isAdmin')
                        <div class="col-sm-8">
                            <a href="{{ route('lembur.index') }}" class="btn btn-small btn-secondary"
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
</section>
@endsection