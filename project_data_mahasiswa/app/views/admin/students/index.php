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
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h4>Data Mahasiswa</h4>

    <a href="?url=admin/students/create" class="btn btn-primary mb-3">
        Tambah Mahasiswa
    </a>

    <table class="table table-bordered">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?= $row['npm']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td><?= $row['angkatan']; ?></td>
            <td>
                <a href="?url=admin/students/edit&id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="?url=admin/students/delete&id=<?= $row['id']; ?>"
                   onclick="return confirm('Hapus data?')"
                   class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>
