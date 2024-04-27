<nav class="main-header navbar navbar-expand navbar-dark" style="background-color: #2980b9;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"
                    style="color: white;"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('auth.dashboard') }}" class="nav-link" style="color: white;">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('beranda') }}" class="nav-link" style="color: white;">Tentang Kami</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('kontak') }}" class="nav-link" style="color: white;">Kontak</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-default btn-md nav-link"
                    style="font-size: 16px; background-color: white; color: #a9cce3;">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</nav>