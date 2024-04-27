@extends('template.master')

@section('content')

<style>
.center {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
    /* Membuat konten berada di tengah vertikal */
}

.dashboard-container {
    background-color: #2980b9;
    /* Warna latar belakang */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Efek bayangan untuk keindahan */
    text-align: center;
}

.dashboard-title {
    color: #fff;
    /* Warna teks putih */
    font-size: 2em;
    font-weight: bold;
    margin-bottom: 20px;
}

.dashboard-text {
    color: #ecf0f1;
    /* Warna teks abu-abu terang */
    font-size: 1.2em;
    line-height: 1.5;
    margin-bottom: 15px;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12 center">
            <div class="dashboard-container">
                <h2 class="dashboard-title">Selamat Datang di Aplikasi Penggajian Kami!</h2>
                <p class="dashboard-text">
                    Terima kasih telah menggunakan aplikasi penggajian kami. Di sini, Anda dapat dengan mudah melihat
                    informasi
                    mengenai gaji Anda.
                </p>
                <p class="dashboard-text">
                    Nikmati kemudahan melihat rincian gaji dan informasi terkait lainnya. Kami senantiasa menerima
                    masukan Anda
                    untuk meningkatkan kualitas layanan kami.
                </p>
                <p class="dashboard-text">
                    Kami berkomitmen memberikan pengalaman terbaik dalam melihat dan mengelola informasi gaji Anda.
                    Semoga
                    aplikasi kami memenuhi kebutuhan Anda.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection