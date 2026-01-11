<?php require 'app/views/admin/navbar.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h4 class="mb-3">Tambah Mahasiswa</h4>

    <form method="POST" action="?url=admin/students/create">
        <input type="text" name="npm" class="form-control mb-2" placeholder="NPM" required>
        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
        <input type="text" name="jurusan" class="form-control mb-2" placeholder="Jurusan" required>
        <input type="number" name="angkatan" class="form-control mb-3" placeholder="Angkatan" required>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="?url=admin/students" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
