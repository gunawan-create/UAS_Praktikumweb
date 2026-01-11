<?php require 'app/views/admin/navbar.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
    <h4 class="mb-3">Edit Mahasiswa</h4>

    <form method="POST" action="?url=admin/students/edit&id=<?= $student['id'] ?>">
        <input type="text" name="npm" class="form-control mb-2" value="<?= $student['npm'] ?>" required>
        <input type="text" name="nama" class="form-control mb-2" value="<?= $student['nama'] ?>" required>
        <input type="text" name="jurusan" class="form-control mb-2" value="<?= $student['jurusan'] ?>" required>
        <input type="number" name="angkatan" class="form-control mb-3" value="<?= $student['angkatan'] ?>" required>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="?url=admin/students" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
