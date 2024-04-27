@extends('template.master')

@section('content')
<style>
body {
    background-color: #ecf0f5;
}

.container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.card {
    width: 100%;
    max-width: 1000px;
    margin-top: -20%;
    /* Sesuaikan nilai negatif ini untuk menggeser ke atas */
}

.card-body {
    padding: 20px;
}

.about-info {
    margin-top: 20px;
}

.about-info img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
}
</style>

<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #2980b9;">
            <h1 class="text-center text-white">Tentang Kami</h1>
        </div>
        <div class="card-body">
            <div class="about-info">
                <p>
                    PT DEWATA adalah perusahaan yang spesialis dalam koleksi seni dan kerajinan.
                    Kami telah berpengalaman dalam menciptakan produk unik dan berkualitas tinggi bagi pelanggan kami
                    sejak didirikan pada tahun 2021.
                </p>
                <p>
                    Kami menyediakan berbagai jenis aksesori, mulai dari dekorasi rumah, aksesori fashion,
                    hingga hadiah kreatif. Produk-produk kami dibuat dengan teliti oleh para pengrajin terampil
                    yang berdedikasi untuk memberikan keindahan dan kepuasan kepada pelanggan kami.
                </p>
                <p>
                    Visi kami adalah menjadi pemimpin dalam industri aksesori dengan
                    terus berinovasi dan menciptakan produk yang memukau. Misi kami adalah memberikan
                    pengalaman belanja yang menyenangkan dan memuaskan setiap pelanggan.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection