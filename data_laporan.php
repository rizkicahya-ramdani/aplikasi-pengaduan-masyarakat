<?php

include "koneksi.php";

session_start();

// mencegah admin masuk ke halaman masyarakat
if (!isset($_SESSION['role']) || ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'petugas')) {
    header("Location: index.php"); // Redirect ke halaman utama jika bukan admin atau petugas
    exit();
}

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
$role = $_SESSION['role']; // Menentukan apakah user adalah masyarakat, petugas, atau admin

// Query untuk mengambil data pengaduan
if ($role == 'masyarakat') {
    $query = "SELECT p.* FROM pengaduan p 
              JOIN users u ON p.id_user = u.id_user 
              WHERE u.role = 'masyarakat' 
              ORDER BY p.tanggal_pengaduan DESC";
} else {
    $query = "SELECT * FROM pengaduan ORDER BY tanggal_pengaduan DESC";
}

$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ngadu Claire - Laporan Masyarakat</title>
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

    <section class="lihat-laporan py-5">
        <div class="container">
            <h3 class="mb-4">Laporan Pengaduan</h3>
            <div class="row">
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="gambar_laporan/<?php echo htmlspecialchars($row['gambar']); ?>" class="card-img-top" alt="Gambar Pengaduan">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($row['judul']); ?></h5>
                                <p class="card-text"><small class="text-muted"><?php echo $row['tanggal_pengaduan']; ?></small></p>
                                <p class="card-text"><span class='badge bg-<?php echo ($row['status'] == 'Selesai' ? 'success' : ($row['status'] == 'Diproses' ? 'warning' : 'danger')); ?>'><?php echo $row['status']; ?></span></p>
                                <a href='detaillaporan_admin.php?id=<?php echo $row['id_pengaduan']; ?>' class='btn btn-primary btn-sm'>Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a href="dashboard.php" class="btn btn-secondary">Kembali</a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
