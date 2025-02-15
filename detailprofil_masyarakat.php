<?php

include 'koneksi.php';

session_start();

// mencegah admin masuk ke halaman masyarakat
if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'petugas')) {
    header("Location: index.php"); // Redirect ke halaman utama jika bukan admin atau petugas
    exit();
}

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Jika belum login, alihkan ke halaman login
    exit();
}

// Ambil data pengguna berdasarkan ID
$id_user = $_GET['id_user'] ?? '';

if (!$id_user) {
    echo "<script>alert('ID pengguna tidak ditemukan!'); window.location.href='data_masyarakat.php';</script>";
    exit();
}

$data = mysqli_query($connection, "SELECT * FROM users WHERE id_user = '$id_user'");
$tampil = mysqli_fetch_assoc($data);

if (!$tampil) {
    echo "<script>alert('Pengguna tidak ditemukan!'); window.location.href='data_masyarakat.php';</script>";
    exit();
}

// Jika form dikirim, update role pengguna
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $role_baru = $_POST['role'];

    // Hanya role yang valid yang bisa dipilih
    $allowed_roles = ['masyarakat', 'petugas', 'admin'];
    
    if (in_array($role_baru, $allowed_roles)) {
        $update = mysqli_query($connection, "UPDATE users SET role = '$role_baru' WHERE id_user = '$id_user'");
        
        if ($update) {
            echo "<script>alert('Role berhasil diperbarui!'); window.location.href='detailprofil_masyarakat.php?id_user=$id_user';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui role!');</script>";
        }
    } else {
        echo "<script>alert('Role tidak valid!');</script>";
    }
}

$data = mysqli_query($connection, "SELECT * FROM users WHERE id_user = '$_GET[id_user]'");
$tampil = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Ngadu Claire - Detail Profil Masyarakat (Admin)</title>

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
                        <li><a href="dashboard.php" class="nav-link px-2 text-white">Dashboard</a></li>
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
                                    <td>
                                        <form method="POST">
                                            <select name="role" class="form-select">
                                                <option value="masyarakat" <?= ($tampil['role'] == 'masyarakat') ? 'selected' : ''; ?>>Masyarakat</option>
                                                <option value="petugas" <?= ($tampil['role'] == 'petugas') ? 'selected' : ''; ?>>Petugas</option>
                                                <option value="admin" <?= ($tampil['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                            </select>
                                            <button type="submit" class="btn btn-success mt-2">Ubah Role</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>

                            <div class="text-center">
                                <a href="data_masyarakat.php" class="btn btn-secondary mt-3">Kembali</a>
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
