<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_hotel";

if (mysqli_connect($servername, $username, $password, $database)) {
    // echo "Berhasil konek!";
} else {
    echo "Gagal konek!";
}