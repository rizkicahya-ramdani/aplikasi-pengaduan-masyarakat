<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'petugas')) {
    header("Location: ../index.php"); // Redirect ke halaman utama jika bukan admin atau petugas
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
    <title>Ngadu Claire - Dashboard (Admin)</title>

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
                        <li><a href="dashboard.php" class="nav-link px-2 text-white">Dashboard</a></li>
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
                            <a href="detailprofil_admin.php?id_user=<?= $tampil['id_user'] ?>" class="btn btn-primary">Detail Profil</a>
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Data User</h5>
                            <p class="card-text">Menampilkan data-data dari masyarakat</p>
                            <a href="data_masyarakat.php" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title">Lihat Laporan</h5>
                            <p class="card-text">Cek status laporan dari masyarakat.</p>
                            <a href="data_laporan.php" class="btn btn-primary">Lihat</a>
                        </div>
                    </div>
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
