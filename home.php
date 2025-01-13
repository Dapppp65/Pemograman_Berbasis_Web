<?php
    session_start();
    if (!isset($_SESSION['isLoggedIn']) || !$_SESSION['isLoggedIn']) 
    {
        header("Location: login.php");
        exit;
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="jquery.js"></script>
</head>

<body>
    <header>
        <div class="logo">INFOOO</div>
        <nav>
            <ul>
            <li><a href="home.php">Home</a></li>
                    <li><a href="blog.html" >blog</a></li>
                    <li><a href="input_penulis.php">penulis</a></li>
                    <li><a href="daftarpenulis.php">Daftar penulis</a></li>
                    <li><a href="daftarbuku.php">Daftar buku</a></li>
                    <li><a href="input.php">tambah  buku</a></li>
                    <li><a href="login.php">Log out</a></li>
            </ul>
        </nav>
        <div class="menu-toggle">
            <i class="fa fa-bars"></i>
        </div>
    </header>

    <script>
        $(document).ready(function () {
            $(".menu-toggle").click(function () {
                $('nav').toggleClass('active');
            })
        })
    </script>
</body>
        <h3>Rumah Hantu Drive Thru Pertama di Indonesia rasakan sensasi</h3>
    </header>
    <br></br>
    <div class="teks-dengan-border" style="display: flex; align-items: flex-start; gap: 100px;">
    <img src="assets/foto/perpustakaan.jpg" alt="rumahhantu" class="rumahhantu" style="width: 450px; height: 350px;">
    <div>
        <b>HorrorBook Haven</b><br>
        HorrorBook Haven adalah platform sederhana namun interaktif yang dirancang khusus bagi para pecinta cerita horor. Website ini memungkinkan Anda untuk menambahkan koleksi buku seram favorit serta informasi tentang penulisnya, menciptakan perpustakaan horor yang terus berkembang.
        <br><br>
        Fitur utama yang tersedia di HorrorBook Haven meliputi:
        <ul>
        <li><b>Tambah Buku</b>: Tambahkan judul buku horor baru beserta deskripsi singkatnya untuk memperkaya koleksi yang tersedia di platform.</li>
        <li><b>Tambah Penulis</b>: Lengkapi informasi tentang penulis horor favorit Anda dan biarkan dunia mengenal karya-karya mereka yang menginspirasi kengerian.</li>
        </ul>
        HorrorBook Haven adalah tempat sempurna untuk para penggemar cerita seram yang ingin berbagi dan mengeksplorasi kisah-kisah menyeramkan. Bergabunglah sekarang dan bantu membangun perpustakaan horor terbaik bersama komunitas kami!
    </div>
</div>


    <p class="posting"><i>Tanggal Posting 4 januari 2024</i></p>
    <hr>
    <h5>Kelompok Pbw - Minggu, 1 januari 2025 | 16:35 WIB</h5>
    <p class="center">kelompokpbw@gmail.com</p>
    <a class="kembali" href="Index.html">Kembali</a>

</html>