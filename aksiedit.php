<?php
include "connection.php";
session_start();

// Validasi input
if (!isset($_POST['id'], $_POST['judul'], $_POST['penulis_id'], $_POST['tahun']) || 
    empty($_POST['id']) || empty($_POST['judul']) || empty($_POST['penulis_id']) || empty($_POST['tahun'])) {
    die("Semua data harus diisi.");
}

$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis_id = $_POST['penulis_id'];
$tahun_terbit = $_POST['tahun'];
$updated_by = $_SESSION['userid'];
$updated_at = date("Y-m-d H:i:s");

try {
    // Query update
    $sql = "UPDATE buku SET judul = ?, penulis_id = ?, `tahun` = ?, updated_by = ?, updated_at = ? WHERE id = ?";
    $stmt = $koneksi->prepare($sql);

    // Eksekusi query dengan parameter
    $stmt->execute([$judul, $penulis_id, $tahun_terbit, $updated_by, $updated_at, $id]);

    // Redirect jika sukses
    header("Location: home.php");
    exit();
} catch (PDOException $e) {
    die("Terjadi kesalahan: " . $e->getMessage());
}
?>
