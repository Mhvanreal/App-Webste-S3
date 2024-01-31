<?php

$SERVER = "localhost";
$username = "root";
$password = "";
$db = "hanzjokii"; // Mengganti "user" dengan "db" sesuai dengan nama database Anda.
// $SERVER = " ftp.tifc.myhost.id";
// $username = "tifcmyho_hanzjoki";
// $password = "@JTIpolije2023";
// $db = "tifcmyho_hanzjoki"; // Mengganti "user" dengan "db" sesuai dengan nama database Anda.
//coba ganti localhostnyagit

$err = "";
$ingataku= "";
// Membuat koneksi ke database menggunakan MySQLi
$koneksi = new mysqli($SERVER, $username, $password, $db);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}


?>