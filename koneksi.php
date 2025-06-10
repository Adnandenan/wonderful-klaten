<?php
$host = "localhost";
$user = "root";
$pass = ""; // kosongkan saja
$db   = "database properti"; // jika tetap pakai spasi, biarkan

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
