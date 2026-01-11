<?php
require_once 'config/database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function login($username, $password) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        return $this->db->query($query)->fetch_assoc();
    }

    public function register($username, $password) {
        $password = md5($password);
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        return $this->db->query($query);
    }

    public function resetPassword($username, $password) {
        $password = md5($password);
        $query = "UPDATE users SET password='$password' WHERE username='$username'";
        return $this->db->query($query);
    }
}
