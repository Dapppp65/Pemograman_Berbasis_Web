<?php
    include "connection.php";
    session_start();

    if (!$_SESSION['isLoggedIn']) {
        header("location: login.php");
        exit; 
    }

    
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']); 

        try {
            $deleteQuery = $koneksi->prepare("DELETE FROM penulis WHERE id = :id");
            $deleteQuery->bindParam(':id', $id, PDO::PARAM_INT); 
            $deleteQuery->execute(); 

            header("Location: daftarpenulis.php");
            exit; 
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "ID penulis tidak ditemukan.";
    }
?>
