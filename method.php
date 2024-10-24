<?php
class RESTAPI {
    private $host = 'localhost';
    private $db = 'motogp_db';
    private $user = 'root';
    private $pass = '';
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getPembalap() {
        $stmt = $this->conn->prepare("SELECT p.id, p.nama, p.negara, t.nama_tim FROM pembalap p JOIN tim t ON p.tim_id = t.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertPembalap($data) {
        $stmt = $this->conn->prepare("INSERT INTO pembalap (nama, tim_id, negara) VALUES (?, ?, ?)");
        $stmt->execute([$data['nama'], $data['tim_id'], $data['negara']]);
        return $this->conn->lastInsertId();
    }

    public function deletePembalap($id) {
        $stmt = $this->conn->prepare("DELETE FROM pembalap WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updatePembalap($id, $data) {
        $stmt = $this->conn->prepare("UPDATE pembalap SET nama = ?, tim_id = ?, negara = ? WHERE id ?");
        return $stmt->execute([$data['nama'], $data['tim id'], $data['negara'], $id]);
    }
}
?>
