<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pembalap MotoGP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            color: #555;
            font-size: 14px;
        }

        input[type="text"], input[type="number"], select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 15px;
            width: 100%;
        }

        input[type="submit"] {
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .message {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
        }

        .message.success {
            color: #28a745;
        }

        .message.error {
            color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Tambah Pembalap MotoGP</h2>
        <form action="tambahdata.php" method="POST" id="addForm">
            <div class="form-group">
                <label for="nama">Nama Pembalap:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan Nama Pembalap" required>
            </div>
            <div class="form-group">
                <label for="tim_id">ID Tim:</label>
                <input type="number" id="tim_id" name="tim_id" placeholder="Masukkan ID Tim" required>
            </div>
            <div class="form-group">
                <label for="negara">Negara:</label>
                <input type="text" id="negara" name="negara" placeholder="Masukkan Negara Pembalap" required>
            </div>
            <input type="submit" value="Tambah Pembalap">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            require 'method.php';
            $api = new RESTAPI();

            $nama = $_POST['nama'];
            $tim_id = $_POST['tim_id'];
            $negara = $_POST['negara'];

            if ($api->insertPembalap(['nama' => $nama, 'tim_id' => $tim_id, 'negara' => $negara])) {
                echo "<p class='message success'>Pembalap berhasil ditambahkan!</p>";
                header("Location: tampilmysql.php");
                exit();
            } else {
                echo "<p class='message error'>Gagal menambahkan pembalap. Coba lagi.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
