<!DOCTYPE html>
<html>
<head>
    <title>Lupa Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card mx-auto p-4" style="max-width:400px">
        <h4 class="text-center">Reset Password</h4>

        <form method="POST">
            <input name="username" class="form-control mb-2" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password Baru" required>
            <button class="btn btn-warning w-100">Reset</button>
        </form>

        <div class="text-center mt-3">
            <a href="?url=login">Kembali ke Login</a>
        </div>
    </div>
</div>

</body>
</html>
