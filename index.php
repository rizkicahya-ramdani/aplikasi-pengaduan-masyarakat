<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['nama']) && !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengaduan Masyarakat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="p-3 bg-custom text-white sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <h4 class="mb-0">Ngadu Claire</h4>
                <nav>
                    <ul class="nav">
                        <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                        <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    <section class="section-1 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm text-center p-4">
                        <div class="card-body">
                            <h4 class="card-title"><?= htmlspecialchars($_SESSION['nama']) ?>!</h4>
                            <p class="card-text"><?= htmlspecialchars($_SESSION['email']) ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Laporkan Masalah</h5>
                            <p class="card-text">Laporkan permasalahan yang Anda temui secara mudah dan cepat.</p>
                            <a href="#" class="btn btn-primary">Laporkan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Lihat Laporan</h5>
                            <p class="card-text">Cek status laporan Anda atau laporan dari masyarakat lainnya.</p>
                            <a href="#" class="btn btn-success">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bantuan</h5>
                            <p class="card-text">Dapatkan informasi dan bantuan terkait penggunaan aplikasi.</p>
                            <a href="#" class="btn btn-info">Bantuan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
