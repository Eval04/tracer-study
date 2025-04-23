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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/admin.css">
</head>
<body>

<div class="d-flex">
  <!-- Sidebar -->
  <?php include('includes/sidebar.php'); ?>

  <!-- Main Content -->
  <div class="main-content">
    <!-- Header -->
    <?php include('includes/header.php'); ?>

    <!-- Cards -->
    <div class="container mt-4">
      <div class="row g-3">
        <div class="col-md-4">
          <div class="card-box d-flex justify-content-between align-items-center">
            <div>
              <small class="text-uppercase">ALUMNI</small>
              <h3><?= $alumni ?></h3>
            </div>
            <i class="fa fa-user-graduate fa-2x"></i>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box d-flex justify-content-between align-items-center">
            <div>
              <small class="text-uppercase">ADMIN</small>
              <h3><?= $admin ?></h3>
            </div>
            <i class="fa fa-users fa-2x"></i>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-box d-flex justify-content-between align-items-center">
            <div>
              <small class="text-uppercase">ALUMNI MENGISI KUESIONER</small>
              <h3><?= $jawaban ?></h3>
            </div>
            <i class="fa fa-file-circle-check fa-2x"></i>
          </div>
        </div>
      </div>
    </div>

  </div><!-- END main-content -->
</div><!-- END d-flex -->

</body>
</html>
