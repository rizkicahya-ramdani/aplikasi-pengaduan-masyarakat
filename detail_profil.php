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
    
    <title>Ngadu Claire - Detail Profil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

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

    <section class="detail-profil py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm p-4">
                        <div class="card-body">
                            <h5 class="mb-4 text-center"><strong>Detail Profil</strong></h5>
                            <div class="text-center">
                                <img src="uploads/<?= $tampil['gambar'] ?>" width="100" class="rounded-circle mb-3" alt="foto profil">
                                <h4 class="card-title"><?= htmlspecialchars($tampil['nama']) ?></h4>
                                <p class="card-text"><?= htmlspecialchars($tampil['email']) ?></p>
                            </div>
                            <table class="table table-bordered mt-4">
                                <tr>
                                    <th>Nama</th>
                                    <td><?= htmlspecialchars($tampil['nama']) ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= htmlspecialchars($tampil['email']) ?></td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td><?= htmlspecialchars($tampil['nik']) ?></td>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <td><?= htmlspecialchars($tampil['no_hp']) ?></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><?= htmlspecialchars($tampil['alamat']) ?></td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td><?= htmlspecialchars($tampil['role']) ?></td>
                                </tr>
                            </table>

                            <div class="text-center">
                                <a href="edit_profil.php" class="btn btn-primary mt-3">Edit Profil</a>
                                <a href="index.php" class="btn btn-secondary mt-3">Kembali</a>
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
