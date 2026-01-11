<?php
if (!isset($_SESSION['user'])) {
    header("Location: ?url=login");
    exit;
}
require 'app/views/admin/navbar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h4>Dashboard Admin</h4>

    <div class="card p-3 mt-3" style="max-width:400px">
        <p>Selamat datang, <b><?= $_SESSION['user']['username']; ?></b></p>

        <div class="list-group">
            <a href="?url=admin/students" class="list-group-item list-group-item-action">
                Kelola Data Mahasiswa
            </a>
            <a href="?url=logout" class="list-group-item list-group-item-action text-danger">
                Logout
            </a>
        </div>
    </div>
</div>

</body>
</html>
