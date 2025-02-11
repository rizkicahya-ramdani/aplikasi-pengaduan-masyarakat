<?php

include "koneksi.php";

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Jika belum login, alihkan ke halaman login
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panduan Aplikasi - Ngadu Claire</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header class="p-3 bg-custom text-white sticky-top shadow">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <h4 class="mb-0">Ngadu Claire</h4>
                <nav>
                    <ul class="nav">
                        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="index.php" class="nav-link px-2 text-white">Tentang Kami</a></li>
                        <li><a href="index.php" class="nav-link px-2 text-white">Kontak</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    <section class="panduan py-5">
        <div class="container">
            <h2 class="text-center mb-4">Panduan Penggunaan Aplikasi</h2>
            <div class="accordion" id="panduanAplikasi">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            1. Cara Mendaftar dan Masuk
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#panduanAplikasi">
                        <div class="accordion-body">
                            <p>Untuk menggunakan aplikasi, pengguna harus mendaftar dengan mengisi formulir pendaftaran di halaman registrasi. Setelah itu, login menggunakan email dan password yang telah dibuat.</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2. Cara Membuat Pengaduan
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#panduanAplikasi">
                        <div class="accordion-body">
                            <p>Setelah login, pengguna dapat membuat pengaduan dengan mengisi formulir pengaduan yang mencakup deskripsi masalah dan mengunggah bukti pendukung (jika ada).</p>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            3. Cara Melihat Status Pengaduan
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#panduanAplikasi">
                        <div class="accordion-body">
                            <p>Pengguna dapat melihat status pengaduan mereka melalui halaman "Lihat Laporan". Status akan diperbarui secara berkala oleh petugas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>