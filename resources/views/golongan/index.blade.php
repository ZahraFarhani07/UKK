@extends('template.master')

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
<h1 class="fw semi-bold text-center py-3" style="color:white">DATA GOLONGAN KARYAWAN</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col text-right">
                            <a href="{{ route('golongan.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Data Golongan
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Golongan</th>
                                    <th>Gaji Pokok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($golongan as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->karyawan->nama }} </td>
                                    <td>{{ $value->nama_golongan }}</td>
                                    <td>{{ $value->gaji_pokok }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('golongan.show', $value->id) }}"
                                                class="btn btn-small btn-info" style="margin-right: 8px;">
                                                <i class="fas fa-eye"></i></a>
                                            <a href="{{ route('golongan.edit', $value->id) }}"
                                                class="btn btn-small btn-warning" style="margin-right: 8px;">
                                                <i class="fas fa-pen" style="color: #FFFF"></i></a>
                                            <form action="{{route('golongan.destroy', $value->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-small btn-danger"
                                                    style="margin-right: 8px;">
                                                    <i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</section>
</div>
@endsection

@push('script')
<!-- DataTables & Plugins -->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('/adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<!-- Isi konten Blade lainnya di sini -->
<script>
// Fungsi untuk menampilkan modal
function showDetailModal(modalId) {
    // Tampilkan modal
    $(modalId).modal('show');
}
</script>
@endpush