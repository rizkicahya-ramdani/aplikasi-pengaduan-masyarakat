<?php 

include "koneksi.php";

session_start();

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Jika belum login, alihkan ke halaman login
    exit();
}

// Ambil data pengguna dari database berdasarkan session
$id_user = $_SESSION['id_user'];
$query = mysqli_query($connection, "SELECT * FROM users WHERE id_user='$id_user'");
$user = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = mysqli_real_escape_string($connection, $_POST['nama']);
    $nik = mysqli_real_escape_string($connection, $_POST['nik']);
    $no_hp = mysqli_real_escape_string($connection, $_POST['no_hp']);
    $alamat = mysqli_real_escape_string($connection, $_POST['alamat']);
    $role = mysqli_real_escape_string($connection, $_POST['role']);

    if ($_FILES['gambar']['name']) {
        $gambar = $_FILES['gambar']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);

        move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);

        $update = mysqli_query($connection, "UPDATE users SET nama='$nama', gambar='$gambar', nik='$nik', no_hp='$no_hp', alamat='$alamat', role='$role' WHERE id_user='$id_user'");
    } else {
        $update = mysqli_query($connection, "UPDATE users SET nama='$nama', nik='$nik', no_hp='$no_hp', alamat='$alamat', role='$role' WHERE id_user='$id_user'");
    }
    
    if ($update) {
        $_SESSION['nama'] = $nama; // Perbarui session
        echo "<script>alert('Profil berhasil diperbarui!'); window.location.href='detail_profil.php';</script>";
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
    <title>Ngadu Claire - Edit Profil (Admin)</title>

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

    <section class="section-1 py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card shadow-sm p-4">
                        <div class="card-body">
                            <h5 class="mb-4"><strong>Edit Profil</strong></h5>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($user['nama']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Foto Profil</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar">
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="<?= htmlspecialchars($user['nik']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= htmlspecialchars($user['no_hp']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required><?= htmlspecialchars($user['alamat']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <input type="text" class="form-control" id="role" name="role" value="<?= htmlspecialchars(ucfirst($user['role'])) ?>" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
