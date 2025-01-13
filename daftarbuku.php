<?php
    // Menghubungkan dengan database
    include('connection.php');

    // Mengambil data buku yang belum dihapus
    $dbh = $koneksi->query("SELECT * FROM buku WHERE isdel = 0");
    $bukus = $dbh->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="Index.css">
    <link rel="stylesheet" href="daftarbuku.css"> 
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
    <div class="container">
        <h1>Daftar Buku</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach($bukus as $buku) {
                ?>
                    <tr>
                        <td><?php echo $no ?> </td>
                        <td><?php echo htmlspecialchars($buku['judul']) ?></td>
                        <td><?php echo htmlspecialchars($buku['penulis_id']) ?></td>
                        <td><?php echo htmlspecialchars($buku['tahun']) ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $buku['id'] ?>">Edit</a> | 
                            <a href="delete.php?id=<?php echo $buku['id'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
