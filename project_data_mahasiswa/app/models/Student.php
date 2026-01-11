<?php
require_once 'config/database.php';

class Student {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        return $this->db->query("SELECT * FROM students");
    }

    public function insert($data) {
        return $this->db->query("
            INSERT INTO students (npm, nama, jurusan, angkatan)
            VALUES ('{$data['npm']}', '{$data['nama']}', '{$data['jurusan']}', '{$data['angkatan']}')
        ");
    }

    public function find($id) {
        return $this->db->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();
    }

    public function update($id, $data) {
        return $this->db->query("
            UPDATE students SET
            npm='{$data['npm']}',
            nama='{$data['nama']}',
            jurusan='{$data['jurusan']}',
            angkatan='{$data['angkatan']}'
            WHERE id=$id
        ");
    }

    public function delete($id) {
        return $this->db->query("DELETE FROM students WHERE id=$id");
    }
}
