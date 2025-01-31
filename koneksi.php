<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_pengaduan";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    echo "gagal konek!";
} else {
    // echo "berhasil konek!";
}