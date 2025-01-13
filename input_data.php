<?php
    include "connection.php";
    session_start();
    
    if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }
    

    $judul = $_POST['judul'];
    $penulis_id =$_POST['penulis'];
    $tahun = $_POST['tahun'];

    $dbh = $koneksi->prepare("INSERT INTO buku(judul,penulis_id,tahun,created_by,created_at) VALUES (?,?,?,?,?)");
    $dbh->execute([$judul,$penulis_id,$tahun,$_SESSION['userid'],date("Y-m-d H:i:s")]);

    header("Location: home.php");