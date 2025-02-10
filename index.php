<?php
include 'koneksi.php';
session_start();

// Cegah akses tanpa login
if (!isset($_SESSION['nama']) && !isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$detail = mysqli_query($connection, "SELECT * FROM users WHERE id_user = '$id_user'");
$tampil = mysqli_fetch_assoc($detail);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Pengaduan Masyarakat</title>

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
                        <li><a href="#about-us" class="nav-link px-2 text-white">Tentang Kami</a></li>
                        <li><a href="#contact" class="nav-link px-2 text-white">Kontak</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    <section class="user-profile py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm text-center p-4">
                        <div class="card-body">
                            <img src="uploads/<?= $tampil['gambar'] ?>" width="100" class="rounded-circle mb-3" alt="foto profil">
                            <h4 class="card-title"><strong><?= htmlspecialchars($tampil['nama']) ?></strong></h4>
                            <p class="card-text"><?= htmlspecialchars($tampil['email']) ?></p>
                            <a href="detail_profil.php?id_user=<?= $tampil['id_user'] ?>" class="btn btn-primary">Detail Profil</a>
                            <a href="logout.php" class="btn btn-danger">Logout</a>
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
                            <a href="pengaduan.php" class="btn btn-primary">Laporkan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Lihat Laporan</h5>
                            <p class="card-text">Cek status laporan Anda atau laporan dari masyarakat lainnya.</p>
                            <a href="lihat_laporan.php" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bantuan</h5>
                            <p class="card-text">Dapatkan informasi dan bantuan terkait penggunaan aplikasi.</p>
                            <a href="#" class="btn btn-primary">Bantuan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us py-5 my-3" id="about-us">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <img src="img/about-us.jpg" class="rounded" width="500" alt="Tentang Kami">
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
            <h3 class="text-center mb-5">Tim Kami</h3>
            <div class="row text-center">
                <div class="col-md-4">
                    <img src="img/user-profil.png" class="rounded-circle mb-3" width="120" height="120" alt="Founder">
                    <h5>Rizki Cahya Ramdani</h5>
                    <p>Founder & CEO</p>
                </div>
                <div class="col-md-4">
                    <img src="img/user-profil.png" class="rounded-circle mb-3" width="120" height="120" alt="Developer">
                    <h5>Aditya Nugraha</h5>
                    <p>Lead Developer</p>
                </div>
                <div class="col-md-4">
                    <img src="img/user-profil.png" class="rounded-circle mb-3" width="120" height="120" alt="Support">
                    <h5>Siti Aisyah</h5>
                    <p>Customer Support</p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact py-5" id="contact">
        <div class="container">
            <h3 class="text-center mb-5">Hubungi Kami</h3>
            <div class="row">
                <div class="col-md-6">
                    <h5>Alamat Kantor</h5>
                    <p>Jl. Merdeka No. 123, Jakarta, Indonesia</p>
                    <h5>Email</h5>
                    <p>support@ngaduclaire.com</p>
                    <h5>Telepon</h5>
                    <p>+62 812-3456-7890</p>
                    <h5>Media Sosial</h5>
                    <a href="#" class="me-2 text-dark"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="me-2 text-dark"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="col-md-6">
                    <h5>Kirim Pesan</h5>
                    <form action="proses_kontak.php" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="mb-0">&copy; <?= date('Y'); ?> Ngadu Claire. All rights reserved.</p>
        </div>
    </footer>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
