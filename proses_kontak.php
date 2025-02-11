<?php

include "koneksi.php";

if (isset($_POST['kirim_pesan'])) {
    $nama       = $_POST['nama'];
    $email      = $_POST['email'];
    $pesan      = $_POST['pesan'];

    $kirim = mysqli_query($connection, "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')");

    if ($kirim) {
        echo "<script>
            alert('Pesan terkirim!');
            window.location.replace('index.php');
        </script>";
    } else {
        echo "<script>
            alert('Pesan gagal terkirim!');
            window.location.replace('index.php');
        </script>";
    }
}