<?php
require 'method.php';
$api = new RESTAPI();

header('Content-Type: application/json; charset=UTF-8'); 

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Mengambil data pembalap
    $data = $api->getPembalap();
    echo json_encode($data, JSON_PRETTY_PRINT); 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Menambah data pembalap
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['nama']) && isset($input['tim_id']) && isset($input['negara'])) {
        $api->insertPembalap($input);
        echo json_encode(['message' => 'Pembalap berhasil ditambahkan'], JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['message' => 'Data tidak valid'], JSON_PRETTY_PRINT);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Menghapus pembalap
    if (isset($_GET['id'])) {
        $api->deletePembalap($_GET['id']);
        echo json_encode(['message' => 'Pembalap berhasil dihapus'], JSON_PRETTY_PRINT);
    } else {
        echo json_encode(['message' => 'ID pembalap tidak ditemukan'], JSON_PRETTY_PRINT);
    }
}
?>
