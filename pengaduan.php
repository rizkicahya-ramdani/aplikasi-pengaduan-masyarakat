<?php 

include "koneksi.php";

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Jika belum login, alihkan ke halaman login
    exit();
}

$id_user = $_SESSION['id_user'];
$query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = mysqli_real_escape_string($connection, $_POST['judul']);
    $isi_laporan = mysqli_real_escape_string($connection, $_POST['isi_laporan']);
    $lokasi = mysqli_real_escape_string($connection, $_POST['lokasi']);
    
    $gambar = "";
    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $target_dir = "gambar_laporan/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
    }
    
    $insert = mysqli_query($connection, "INSERT INTO pengaduan (id_user, judul, isi_laporan, lokasi, gambar, status, tanggal_pengaduan) VALUES ('$id_user', '$judul', '$isi_laporan', '$lokasi', '$gambar', 'pending', NOW())");
    
    if ($insert) {
        echo "<script>alert('Pengaduan berhasil dikirim!'); window.location.href='lihat_laporan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan, coba lagi!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ngadu Claire - Form Pengaduan</title>
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

    <section class="section-1 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm p-4">
                        <div class="card-body">
                            <h5 class="mb-4"><strong>Buat Pengaduan</strong></h5>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Pengaduan</label>
                                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul" required>
                                </div>
                                <div class="mb-3">
                                    <label for="isi_laporan" class="form-label">Isi Laporan</label>
                                    <textarea class="form-control" id="isi_laporan" name="isi_laporan" placeholder="Masukkan Isi Laporan" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="lokasi" class="form-label">Lokasi Kejadian</label>
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Bukti Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>
                                <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
