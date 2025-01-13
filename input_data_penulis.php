<?php
$host = "localhost";
$dbname = "perpustakaan2";
$username = "root";
$password = "";

try {
    $koneksi = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}

// Data dari form
$nama_penulis = $_POST['nama_penulis'];

// Validasi input (pastikan nama tidak kosong)
if (empty($nama_penulis)) {
    echo "Error: Nama penulis tidak boleh kosong.";
    exit();
}

// Masukkan data ke tabel `penulis`
$insertPenulis = $koneksi->prepare("INSERT INTO penulis (nama) VALUES (?)");
$insertPenulis->execute([$nama_penulis]);

// Redirect ke halaman utama
header("Location: home.php");
exit();

