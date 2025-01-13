<?php
    include "connection.php";
    session_start();

    if (!$_SESSION['isLoggedIn']) 
    {
        header("location: login.php");
    }

    // Mengambil data penulis berdasarkan ID (jika ada parameter id)
    $penulisData = null;
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $penulisQuery = $koneksi->prepare("SELECT * FROM penulis WHERE id = :id");
        $penulisQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $penulisQuery->execute();
        $penulisData = $penulisQuery->fetch(PDO::FETCH_ASSOC);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = intval($_POST['id']);
        $nama = $_POST['nama'];

        $updateQuery = $koneksi->prepare("UPDATE penulis SET Nama = :nama WHERE id = :id");
        $updateQuery->bindParam(':nama', $nama, PDO::PARAM_STR);
        $updateQuery->bindParam(':id', $id, PDO::PARAM_INT);
        $updateQuery->execute();

        header("Location: daftarpenulis.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penulis</title>
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
        <h2>Edit Penulis</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($penulisData['id'] ?? ''); ?>">
            <div class="form-group">
                <label for="nama">Nama Penulis</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($penulisData['Nama'] ?? ''); ?>" required>
            </div>
            <div class="form-group">
                <button type="submit">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>

