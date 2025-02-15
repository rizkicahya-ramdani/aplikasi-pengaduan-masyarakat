<?php

include "koneksi.php";

$delete = mysqli_query($connection, "DELETE FROM users WHERE id_user='$_GET[id_user]'");

if ($delete) {
    echo "<script>
        alert('Data berhasil dihapus!');
        window.location.replace('data_masyarakat.php');
    </script>";
} else {
    echo "<script>
        alert('Data gagal dihapus!');
        window.location.replace('data_masyarakat.php');
    </script>";
}