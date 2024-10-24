<!DOCTYPE html>
<html>
<head>
    <title>Data Pembalap MotoGP</title>
</head>
<body>
    <h2>Daftar Pembalap MotoGP</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Tim</th>
            <th>Negara</th>
        </tr>
        <?php
        $json = file_get_contents('http://localhost:8080/testugas6/pembalap.php');
        $pembalap = json_decode($json, true);
        foreach ($pembalap as $p) {
            echo "<tr>
                    <td>{$p['id']}</td>
                    <td>{$p['nama']}</td>
                    <td>{$p['nama_tim']}</td>
                    <td>{$p['negara']}</td>
                  </tr>";
        }
        ?>
    </table>
</body>
</html>
