<?php
class Database {
    public static function connect() {
        return new mysqli("localhost", "root", "", "db_mahasiswa");
    }
}
