<?php

include 'koneksi.php';

session_start();

// Cek apakah pengguna sudah login atau belum
if (!isset($_SESSION['nama']) || !isset($_SESSION['email'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Ngadu Claire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <header class="p-3 bg-custom text-white sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-between">
                <h4 class="mb-0">Ngadu Claire</h4>
                <nav>
                    <ul class="nav">
                        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="about.php" class="nav-link px-2 text-white">Tentang Kami</a></li>
                        <li><a href="panduan.php" class="nav-link px-2 text-white">Panduan</a></li>
                        <li><a href="contact.php" class="nav-link px-2 text-white">Kontak</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="img/about-us.jpg" class="img-fluid rounded" alt="Tentang Kami">
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3">Tentang Kami</h3>
                    <p>
                        Ngadu Claire adalah aplikasi berbasis web yang bertujuan untuk membantu masyarakat dalam menyampaikan pengaduan dengan cepat, mudah, dan transparan.
                        Kami berkomitmen untuk menyediakan platform yang aman dan dapat diandalkan bagi seluruh masyarakat.
                    </p>
                    <p>
                        Dengan teknologi modern, setiap laporan yang masuk akan ditangani secara profesional oleh pihak berwenang dan dapat dipantau oleh pelapor.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <h3 class="text-center mb-4">Tim Kami</h3>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="img/team1.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Founder">
                    <h5>Rizki Cahya Ramdani</h5>
                    <p>Founder & CEO</p>
                </div>
                <div class="col-md-4">
                    <img src="img/team2.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Developer">
                    <h5>Aditya Nugraha</h5>
                    <p>Lead Developer</p>
                </div>
                <div class="col-md-4">
                    <img src="img/team3.jpg" class="rounded-circle mb-3" width="120" height="120" alt="Support">
                    <h5>Siti Aisyah</h5>
                    <p>Customer Support</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y'); ?> Ngadu Claire. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
