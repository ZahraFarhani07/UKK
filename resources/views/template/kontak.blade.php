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
        margin-top: -20%; /* Sesuaikan nilai negatif ini untuk menggeser ke atas */
    }

    .card-body {
        padding: 20px;
    }

    .contact-info p {
        margin-bottom: 5px;
    }
</style>

<div class="container">
    <div class="card">
        <div class="card-header" style="background-color: #2980b9;">
            <h1 class="text-center text-white">Kontak Perusahaan</h1>
        </div>
        <div class="card-body">
            <div class="contact-info">
                <p><i class="fas fa-map-marker-alt" style="color: #3498db;"></i> Jl. Teratai No. 26, Kota Karawang</p>
                <p><i class="fas fa-phone" style="color: #3498db;"></i> (021) 1234-5678</p>
                <p><i class="fas fa-envelope" style="color: #3498db;"></i> info@dewata.com</p>
            </div>
            <div class="mt-4">
                <h3 style="color: #2980b9;">Hubungi Kami:</h3>
                <p style="color: #555;">
                    Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan hubungi kami melalui
                    email atau telepon.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
