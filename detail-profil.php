<?php

include 'koneksi.php';

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Jika belum login, alihkan ke halaman login
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
                        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                        <li><a href="about.php" class="nav-link px-2 text-white">Tentang Kami</a></li>
                        <li><a href="panduan.php" class="nav-link px-2 text-white">Panduan</a></li>
                        <li><a href="contact.php" class="nav-link px-2 text-white">Kontak</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <section class="section-1 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm p-4">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="img/firefly.jpg" width="100" class="rounded-circle mb-3" alt="foto profil">
                                <h4 class="card-title"><?= htmlspecialchars($_SESSION['nama']) ?></h4>
                                <p class="card-text"><?= htmlspecialchars($_SESSION['email']) ?></p>
                            </div>
                            <table class="table table-bordered mt-4">
                                <tr>
                                    <th>Nama</th>
                                    <td><?= htmlspecialchars($_SESSION['nama']) ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= htmlspecialchars($_SESSION['email']) ?></td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td><?= htmlspecialchars($_SESSION['nik']) ?></td>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <td><?= htmlspecialchars($_SESSION['no_hp']) ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= htmlspecialchars($_SESSION['alamat']) ?></td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td><?= htmlspecialchars($_SESSION['role']) ?></td>
                                </tr>
                            </table>

                            <div class="text-center">
                                <a href="edit-profil.php" class="btn btn-primary mt-3">Edit Profil</a>
                                <a href="index.php" class="btn btn-primary mt-3">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
