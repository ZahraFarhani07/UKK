@extends('template.master')

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA PEGGAJIAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <form action="{{ route('accounting.penggajian.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                        name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}"
                                        readonly>
                                    @error('tanggal')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-8">
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="10"
                                        class="form-control @error('keterangan') is-invalid @enderror"
                                        placeholder="Masukkan keterangan Karyawan"></textarea>
                                    @error('keterangan')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <select name="nama" id="karyawan"
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

                            <div class="form-group row">
                                <label for="jumlah_gaji" class="col-sm-2 col-form-label">Jumlah Gaji</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('jumlah_gaji') is-invalid @enderror"
                                        id="jumlah_gaji" name="jumlah_gaji" placeholder="Masukkan Jumlah Lembur"
                                        readonly>
                                    @error('jumlah_gaji')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jumlah_lembur" class="col-sm-2 col-form-label">Jumlah Lembur</label>
                                <div class="col-sm-8">
                                    <input type="text"
                                        class="form-control  @error('jumlah_lembur') is-invalid @enderror"
                                        id="jumlah_lembur" name="jumlah_lembur" placeholder="Masukkan Jumlah Lembur"
                                        readonly>
                                    @error('jumlah_lembur')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="potongan" class="col-sm-2 col-form-label">Potongan</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  @error('potongan') is-invalid @enderror"
                                        id="potongan" name="potongan" placeholder="Masukkan Jumlah Lembur" readonly>
                                    @error('potongan')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total_gaji" class="col-sm-2 col-form-label">Total Gaji</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('total_gaji') is-invalid @enderror"
                                        id="total_gaji" name="total_gaji" placeholder="Masukkan Total Gaji" readonly>
                                    @error('total_gaji')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                                <a href="{{ route('accounting.penggajian.index') }}" class="btn btn-small btn-secondary"
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

@push('script')
<script>
$(document).ready(function() {
    // Function untuk melakukan permintaan AJAX saat pilihan karyawan berubah
    $('#karyawan').on('change', function() {
        var karyawan_id = $(this).val();

        if (karyawan_id) {
            $.ajax({
                url: '/getEmployee/' + karyawan_id + '/golongan',
                type: 'GET',
                success: function(data) {
                    // Pastikan data tidak kosong
                    if (data.length > 0) {
                        var golongan = data[0]; // Ambil elemen pertama dari array

                        // Mengisi nilai pada elemen formulir berdasarkan data yang diterima
                        $('#jumlah_gaji').val(golongan.gaji_pokok + golongan
                            .tunjangan_istri + golongan.tunjangan_anak + golongan
                            .tunjangan_makan + golongan.tunjangan_transport);

                        // Memanggil fungsi hitungTotalGaji setelah mengisi nilai
                        hitungTotalGaji();
                    } else {
                        console.error('Data golongan kosong atau tidak ditemukan.');
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });

            // Function untuk melakukan permintaan AJAX saat pilihan karyawan berubah
            $.ajax({
                url: '/getEmployee/' + karyawan_id + '/lembur',
                type: 'GET',
                success: function(data) {
                    // Pastikan data tidak kosong
                    if (data.length > 0) {
                        var lembur = data[0]; // Ambil elemen pertama dari array

                        // Mengisi nilai pada elemen formulir berdasarkan data yang diterima
                        $('#jumlah_lembur').val(lembur.jumlah_lembur * 10000);

                        // Memanggil fungsi hitungTotalGaji setelah mengisi nilai
                        hitungTotalGaji();
                    } else {
                        console.error('Data lembur kosong atau tidak ditemukan.');
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });

            $.ajax({
                url: '/getEmployee/' + karyawan_id + '/cuti',
                type: 'GET',
                success: function(data) {
                    // Pastikan data tidak kosong
                    if (data.length > 0) {
                        var cuti = data[0]; // Ambil elemen pertama dari array

                        // Mengisi nilai pada elemen formulir berdasarkan data yang diterima
                        $('#potongan').val(cuti.jumlah_cuti * 8 * 10000);

                        // Memanggil fungsi hitungTotalGaji setelah mengisi nilai
                        hitungTotalGaji();
                    } else {
                        console.error('Data cuti kosong atau tidak ditemukan.');
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    });

    // Function untuk melakukan perhitungan total gaji berdasarkan input
    function hitungTotalGaji() {
        // Mendapatkan nilai dari elemen-elemen yang diperlukan
        var jumlahGaji = parseInt($('#jumlah_gaji').val()) || 0;
        var jumlahLembur = parseInt($('#jumlah_lembur').val()) || 0;
        var potongan = parseInt($('#potongan').val()) || 0;

        // Melakukan perhitungan total gaji
        var totalGaji = jumlahGaji + jumlahLembur - potongan;

        // Mengisi nilai pada elemen formulir total_gaji
        $('#total_gaji').val(totalGaji);
    }
});
</script>
@endpush