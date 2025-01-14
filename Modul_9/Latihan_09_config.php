<?php
$servername = "localhost";
$username = "root";
$password = ""; // Sesuaikan jika ada password untuk user root
$dbname = "db_alumni";
// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);
// Memeriksa koneksi
if ($conn->connect_error) {
die("Koneksi gagal: ".$conn->connect_error);
}
?>