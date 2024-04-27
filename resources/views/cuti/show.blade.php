@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA CUTI KARYAWAN</h1>
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
                                    value="{{ $cuti->karyawan->nama }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_cuti" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control @error('tanggal_cuti') is-invalid @enderror"
                                    name="tanggal_cuti" id="tanggal_cuti"
                                    value="{{ old('tanggal_cuti', $cuti->tanggal_cuti) }}" disabled>
                                @error('tanggal_cuti')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_cuti" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control  @error('jumlah_cuti') is-invalid @enderror"
                                    id="jumlah_cuti" name="jumlah_cuti" value="{{ $cuti->jumlah_cuti }}" disabled>
                                @error('jumlah_cuti')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <label for="jumlah_cuti" class="col-sm-2 col-form-label">Hari</label>
                        </div>
                        @can('isAdmin')
                        <div class="col-sm-8">
                            <a href="{{ route('cuti.index') }}" class="btn btn-small btn-secondary"
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