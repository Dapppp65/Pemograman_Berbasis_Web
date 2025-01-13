<?php
    include "connection.php";
    session_start();
    
    if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }

    $id = $_GET['id'];

    $dbh = $koneksi->prepare("SELECT * FROM buku WHERE id = ?");

    $dbh->execute([$id]);

    if($dbh->rowcount() == 1)
    {
        $data = $dbh->fetch(PDO::FETCH_ASSOC);
?>
   <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }
        .form-group input:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-group button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Data</h2>
        <form method="POST" action="aksiedit.php">
            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="judul" name="judul" type="text" value="<?php echo $data['judul']; ?>" required>
            </div>
            <div class="form-group">
                <label for="penulis_id">Penulis</label>
                <input id="penulis_id" name="penulis_id" type="text" value="<?php echo $data['penulis_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun Terbit</label>
                <input id="tahun" name="tahun" type="text" value="<?php echo $data['tahun']; ?>" required>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    }else
    {
        echo"<script>alert('Data tidak ditemukan')<?script";
        header("Location: daftarbuku.php");
    }
    
?>


