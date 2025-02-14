<?php
include "koneksi.php";
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['id'])) {
    echo "<script>alert('ID laporan tidak ditemukan!'); window.location.href='lihat_laporan.php';</script>";
    exit();
}

$id_pengaduan = $_GET['id'];
$query = "SELECT p.*, u.nama FROM pengaduan p JOIN users u ON p.id_user = u.id_user WHERE id_pengaduan = '$id_pengaduan'";
$result = mysqli_query($connection, $query);
$pengaduan = mysqli_fetch_assoc($result);

if (!$pengaduan) {
    echo "<script>alert('Laporan tidak ditemukan!'); window.location.href='lihat_laporan.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ngadu Claire - Detail Laporan</title>
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

    <section class="detail-laporan py-5">
        <div class="container">
            <h3 class="mb-4 text-center">Detail Laporan</h3>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <img src="gambar_laporan/<?php echo htmlspecialchars($pengaduan['gambar']); ?>" class="card-img-top" alt="Gambar Laporan">
                        <div class="card-body">
                            <h5 class="card-title mb-3"><strong><?php echo htmlspecialchars($pengaduan['judul']); ?></strong></h5>
                            <p class="card-text"><strong>Pelapor:</strong> <?php echo htmlspecialchars($pengaduan['nama']); ?></p>
                            <p class="card-text"><strong>Tanggal:</strong> <?php echo $pengaduan['tanggal_pengaduan']; ?></p>
                            <p class="card-text"><strong>Status:</strong> <span class='badge bg-<?php echo ($pengaduan['status'] == 'Selesai' ? 'success' : ($pengaduan['status'] == 'Diproses' ? 'warning' : 'danger')); ?>'><?php echo $pengaduan['status']; ?></span></p>
                            <p class="card-text"><strong>Isi Laporan:</strong> <?php echo nl2br(htmlspecialchars($pengaduan['isi_laporan'])); ?></p>
                            <a href="lihat_laporan.php" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
