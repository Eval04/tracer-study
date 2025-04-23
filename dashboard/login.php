<?php
session_start();
require '../functions.php';

$pdo = getDbConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek Admin
    $stmt = $pdo->prepare("SELECT * FROM tb_admin WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['admin'] = $username;
        header('Location: index.php');
        exit;
    }

    // Cek Mahasiswa
    $stmt = $pdo->prepare("SELECT * FROM tb_mahasiswa WHERE nim = ? AND password = ?");
    $stmt->execute([$username, $password]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['mahasiswa'] = $username;
        header('Location: homepage.php');
        exit;
    }

    echo "<script>alert('Login gagal! Username atau password salah.'); window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - PPS UNM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f8f8;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 60px 20px;
    }
    .login-logo {
      max-height: 60px;
      margin-bottom: 30px;
    }
    .login-card {
      background: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
      width: 100%;
      max-width: 400px;
    }
    .btn-darkblue {
      background-color: #002f5f;
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: bold;
      transition: 0.3s ease;
    }
    .btn-darkblue:hover {
      background-color: rgb(17, 101, 211);
    }
    .back-link {
      position: absolute;
      top: 30px;
      right: 30px;
      font-size: 14px;
      color: #333;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="login-wrapper text-center position-relative">
  <img src="../src/Logo.jpg" alt="PPS UNM" class="login-logo">

  <div class="login-card">
    <form method="POST">
      <div class="mb-3 text-start">
        <label for="username" class="form-label">Username / NIM</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-4 text-start">
        <label for="password" class="form-label">Password / Nama Lengkap</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <button type="submit" class="btn btn-darkblue w-100">LOGIN</button>
    </form>
  </div>
</div>

</body>
</html>
