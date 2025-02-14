<?php
include 'koneksi.php';
session_start();

$query = mysqli_query($connection, "SELECT * FROM users WHERE role='masyarakat'");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ngadu Claire - Beranda</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">

    <style>
        .user-profile {
            min-height: 70vh;
        }
    </style>
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
                <div class="col">
                    <div class="card shadow-sm p-4">
                        <div class="card-body">
                            <h4>Data Masyarakat</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>NIK</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= htmlspecialchars($row['nama']); ?></td>
                                            <td><?= htmlspecialchars($row['email']); ?></td>
                                            <td><?= htmlspecialchars($row['nik']); ?></td>
                                            <td><?= htmlspecialchars($row['no_hp']); ?></td>
                                            <td><?= htmlspecialchars($row['alamat']); ?></td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-primary">Lihat</a>
                                                <button type="button" class="btn btn-sm btn-danger">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
