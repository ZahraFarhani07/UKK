<aside class="main-sidebar elevation-4" style="background-color: #2980b9;">
    <!-- Brand Logo -->
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte/dist/img/logo1.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color: white;">PT DEWATA</a>
                <!-- Tambahkan elemen label untuk peran -->
                <p style="color: white; font-size: 16px; margin: 0;">
                    <!-- Ganti ukuran font menjadi 16px -->
                    @if(auth()->check())
                    @if(auth()->user()->role_id == 1)
                    Admin
                    @elseif(auth()->user()->role_id == 2)
                    Accounting
                    @elseif(auth()->user()->role_id == 3)
                    Karyawan
                    @endif
                    @endif
                </p>
            </div>
            <div
                style="position: absolute; bottom: 0; left: 50%; transform: translateX(-50%); width: 90%; height: 1px; background: linear-gradient(to right, transparent 30%, white 30%, white 70%, transparent 70%);">
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @can('isAdmin')
                <li class="nav-item">
                    <a href="{{ asset('karyawan') }}"
                        class="nav-link @if(Request::segment(1) == 'karyawan') active @endif">
                        <i class="nav-icon fas fa-user" style="color: white;"></i>
                        <p style="color: white;">
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('golongan') }}"
                        class="nav-link @if(Request::segment(1) == 'golongan') active @endif">
                        <i class="nav-icon fas fa-users" style="color: white;"></i>
                        <p style="color: white;">
                            Data Golongan 
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('lembur') }}" class="nav-link @if(Request::segment(1) == 'lembur') active @endif">
                        <i class="nav-icon fas fa-clock" style="color: white;"></i>
                        <p style="color: white;">
                            Data Lembur 
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ asset('cuti') }}" class="nav-link @if(Request::segment(1) == 'cuti') active @endif">
                        <i class="nav-icon fas fa-calendar" style="color: white;"></i>
                        <p style="color: white;">
                            Data Cuti 
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.penggajian.index') }}"
                        class="nav-link @if(Request::segment(1) == 'penggajian') active @endif">
                        <i class="nav-icon fas fa-money-check" style="color: white;"></i>
                        <p style="color: white;">
                            Data Penggajian
                        </p>
                    </a>
                </li>
                @elsecan('isAccounting')
                <li class="nav-item">
                    <a href="{{ route('karyawan.id.show', auth()->user()->id) }}"
                        class="nav-link @if(Request::segment(1) == 'karyawan') active @endif">
                        <i class="nav-icon fas fa-user" style="color: white;"></i>
                        <p style="color: white;">
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('golongan.id.show', auth()->user()->karyawan_id) }}"
                        class="nav-link @if(Request::segment(1) == 'golongan') active @endif">
                        <i class="nav-icon fas fa-users" style="color: white;"></i>
                        <p style="color: white;">
                            Data Golongan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('lembur.id.show', auth()->user()->karyawan_id) }}"
                        class="nav-link @if(Request::segment(1) == 'lembur') active @endif">
                        <i class="nav-icon fas fa-clock" style="color: white;"></i>
                        <p style="color: white;">
                            Data Lembur
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cuti.id.show', auth()->user()->karyawan_id) }}"
                        class="nav-link @if(Request::segment(1) == 'cuti') active @endif">
                        <i class="nav-icon fas fa-calendar" style="color: white;"></i>
                        <p style="color: white;">
                            Data Cuti 
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('accounting.penggajian.index') }}"
                        class="nav-link @if(Request::segment(1) == 'penggajian') active @endif">
                        <i class="nav-icon fas fa-money-check" style="color: white;"></i>
                        <p style="color: white;">
                            Data Penggajian
                        </p>
                    </a>
                </li>
                @elsecan('isKaryawan')
                <li class="nav-item">
                    <a href="{{ route('karyawan.id.show', auth()->user()->id) }}"
                        class="nav-link @if(Request::segment(1) == 'karyawan') active @endif">
                        <i class="nav-icon fas fa-user" style="color: white;"></i>
                        <p style="color: white;">
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('golongan.id.show', auth()->user()->id )}}"
                        class="nav-link @if(Request::segment(1) == 'golongan') active @endif">
                        <i class="nav-icon fas fa-users" style="color: white;"></i>
                        <p style="color: white;">
                            Data Golongan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('lembur.id.show', auth()->user()->id) }}"
                        class="nav-link @if(Request::segment(1) == 'lembur') active @endif">
                        <i class="nav-icon fas fa-clock" style="color: white;"></i>
                        <p style="color: white;">
                            Data Lembur
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cuti.id.show', auth()->user()->id) }}"
                        class="nav-link @if(Request::segment(1) == 'cuti') active @endif">
                        <i class="nav-icon fas fa-calendar" style="color: white;"></i>
                        <p style="color: white;">
                            Data Cuti
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penggajian.id.show', auth()->user()->id) }}"
                        class="nav-link @if(Request::segment(1) == 'penggajian') active @endif">
                        <i class="nav-icon fas fa-money-check" style="color: white;"></i>
                        <p style="color: white;">
                            Data Penggajian
                        </p>
                    </a>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>