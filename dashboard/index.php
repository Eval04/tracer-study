<?php
session_start();
require '../functions.php';

if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}

$pdo = getDbConnection();

$alumni  = $pdo->query("SELECT COUNT(*) as total FROM tb_mahasiswa")->fetch()['total'];
$admin   = $pdo->query("SELECT COUNT(*) as total FROM tb_admin")->fetch()['total'];
$jawaban = $pdo->query("SELECT COUNT(DISTINCT nim) as total FROM tb_jawaban")->fetch()['total'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/admin.css">
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <div class="sidebar">
    <div class="text-center py-4 border-bottom">
      <img src="../asset/images/logo-pps.png" style="height: 50px;" alt="PPS UNM">
      <p class="fw-bold mt-2 mb-0 small">TRACER STUDY<br>PROGRAM PASCA SARJANA</p>
    </div>
    <ul class="nav flex-column px-2 mt-4">
      <li><a href="index.php" class="nav-link"><i class="fa fa-home me-2"></i> Dashboard</a></li>
      <li><a href="list_mahasiswa.php" class="nav-link"><i class="fa fa-user-graduate me-2"></i> Data Alumni</a></li>
      <li><a href="kuisioner.php" class="nav-link"><i class="fa fa-file-lines me-2"></i> Kuesioner</a></li>
    </ul>
    <div class="px-3 position-absolute bottom-0 pb-3">
      <a href="logout.php" class="nav-link text-danger"><i class="fa fa-sign-out-alt me-2"></i> Keluar</a>
    </div>
  </div>

  <!-- Konten -->
  <div class="main-content">
    <!-- Header -->
    <div class="header-bar">
      <div>
        <h5>Tracer Study</h5>
        <small>Program Pasca Sarjana<br>Universitas Negeri Makassar</small>
      </div>
      <div class="text-end">
        <span class="fw-bold">Admin</span><br>
        <span class="small">Super Admin</span>
        <i class="fa fa-user-circle fa-lg ms-2"></i>
      </div>
    </div>

    <!-- Dashboard Content -->
    <div class="row mt-4 g-3">
      <div class="col-md-4">
        <div class="card-box">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small>ALUMNI</small>
              <h3><?= $alumni ?></h3>
            </div>
            <i class="fa fa-user-graduate fa-2x"></i>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small>ADMIN</small>
              <h3><?= $admin ?></h3>
            </div>
            <i class="fa fa-users fa-2x"></i>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-box">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <small>ALUMNI MENGISI KUESIONER</small>
              <h3><?= $jawaban ?></h3>
            </div>
            <i class="fa fa-file-circle-check fa-2x"></i>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>
