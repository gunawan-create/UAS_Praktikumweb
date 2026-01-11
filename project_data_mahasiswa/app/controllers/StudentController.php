<?php
require_once 'app/models/Student.php';

class StudentController {

    public function index() {
        $students = (new Student())->getAll();
        require 'app/views/admin/students/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            (new Student())->insert($_POST);

            // 🔴 FIX UTAMA
            header("Location: ?url=admin/students");
            exit;
        }

        require 'app/views/admin/students/create.php';
    }

    public function edit() {
        $model = new Student();
        $id = $_GET['id'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model->update($id, $_POST);

            // 🔴 FIX UTAMA
            header("Location: ?url=admin/students");
            exit;
        }

        $student = $model->find($id);
        require 'app/views/admin/students/edit.php';
    }

    public function delete() {
        (new Student())->delete($_GET['id']);

        // 🔴 FIX UTAMA
        header("Location: ?url=admin/students");
        exit;
    }
}
