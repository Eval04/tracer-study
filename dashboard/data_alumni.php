<?php
session_start();
include('../functions.php');

if (!isset($_SESSION['admin'])) {
  header('Location: login.php');
  exit;
}

$pdo = getDbConnection();
$edit_nim = $_GET['edit'] ?? null;

function getAlumni($pdo) {
  $query = "SELECT * FROM tb_mahasiswa";
  $stmt = $pdo->query($query);
  return $stmt->fetchAll();
}

// DELETE DATA
if (isset($_POST['delete_data'])) {
  $nim = $_POST['student_nim'];
  try {
    $stmt = $pdo->prepare("DELETE FROM tb_mahasiswa WHERE nim = ?");
    $stmt->execute([$nim]);
    $_SESSION['message'] = "Data berhasil dihapus!";
  } catch (Exception $e) {
    $_SESSION['error'] = "Gagal menghapus data: " . $e->getMessage();
  }
  header("Location: data_alumni.php");
  exit();
}

// UPDATE DATA
if (isset($_POST['update_data'])) {
  $nim = $_POST['edit_nim'];
  $nama = $_POST['edit_nama'];
  $program_studi = $_POST['edit_prodi'];
  $lulus = $_POST['edit_lulus'];
  $email = $_POST['edit_email'];
  $hp = $_POST['edit_hp'];
  $alamat = $_POST['edit_alamat'];
  $gender = $_POST['edit_gender'];

  $stmt = $pdo->prepare("UPDATE tb_mahasiswa 
                         SET nama_lengkap = ?, program_studi = ?, tahun_lulus = ?, email = ?, no_hp = ?, alamat = ?, gender = ?
                         WHERE nim = ?");
  $stmt->execute([$nama, $prodi, $lulus, $email, $hp, $alamat, $gender, $nim]);
  $_SESSION['message'] = "Data berhasil diperbarui!";
  header("Location: data_alumni.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Alumni</title>
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

  <div class="p-4 w-100">
    <h3 class="mb-3">Data Alumni</h3>

    <?php if (isset($_SESSION['message'])): ?>
      <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
      <?php unset($_SESSION['message']); ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
      <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="table-light">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Program Studi</th>
            <th>Tahun Lulus</th>
            <th>Email</th>
            <th>HP</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $alumni = getAlumni($pdo);
          $no = 1;
          foreach ($alumni as $row):
            $edit = $edit_nim === $row['nim'];
          ?>
          <tr>
            <?php if ($edit): ?>
              <form method="POST">
                <input type="hidden" name="edit_nim" value="<?= $row['nim'] ?>">
                <td><?= $no++ ?></td>
                <td><input name="edit_nama" value="<?= $row['nama_lengkap'] ?>" class="form-control"></td>
                <td><?= $row['nim'] ?></td>
                <td><input name="edit_prodi" value="<?= $row['program_studi'] ?>" class="form-control"></td>
                <td><input name="edit_lulus" value="<?= $row['tahun_lulus'] ?>" class="form-control"></td>
                <td><input name="edit_email" value="<?= $row['email'] ?>" class="form-control"></td>
                <td><input name="edit_hp" value="<?= $row['no_hp'] ?>" class="form-control"></td>
                <td><input name="edit_alamat" value="<?= $row['alamat'] ?>" class="form-control"></td>
                <td>
                  <select name="edit_gender" class="form-select">
                    <option value="Pria" <?= $row['gender'] == 'Pria' ? 'selected' : '' ?>>Pria</option>
                    <option value="Wanita" <?= $row['gender'] == 'Wanita' ? 'selected' : '' ?>>Wanita</option>
                  </select>
                </td>
                <td>
                  <button class="btn btn-success btn-sm" name="update_data">Simpan</button>
                  <a href="data_alumni.php" class="btn btn-secondary btn-sm">Batal</a>
                </td>
              </form>
            <?php else: ?>
              <td><?= $no++ ?></td>
              <td><?= $row['nama_lengkap'] ?></td>
              <td><?= $row['nim'] ?></td>
              <td><?= $row['program_studi'] ?></td>
              <td><?= $row['tahun_lulus'] ?></td>
              <td><?= $row['email'] ?></td>
              <td><?= $row['no_hp'] ?></td>
              <td><?= $row['alamat'] ?></td>
              <td><?= $row['gender'] ?></td>
              <td>
                <form method="POST" style="display:inline-block">
                  <input type="hidden" name="student_nim" value="<?= $row['nim'] ?>">
                  <button class="btn btn-danger btn-sm" name="delete_data" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                </form>
                <a href="?edit=<?= $row['nim'] ?>" class="btn btn-primary btn-sm">Edit</a>
              </td>
            <?php endif; ?>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>
