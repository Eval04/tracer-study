<?php
session_start();
require '../functions.php';

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$pdo = getDbConnection();
$stmt = $pdo->query("
    SELECT DISTINCT j.nim, COALESCE(m.nama_lengkap, '-') AS nama_lengkap
    FROM tb_jawaban j
    LEFT JOIN tb_mahasiswa m ON j.nim = m.nim
    ORDER BY j.nim
");
$mahasiswa = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jawaban Alumni</title>
    <link rel="stylesheet" href="styles/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<div class="d-flex">
    <?php include('includes/sidebar.php'); ?>

    <div class="main-content">
        <?php include('includes/header.php'); ?>

        <div class="container mt-4">
            <h4 class="mb-4">Daftar Mahasiswa Pengisi Kuesioner</h4>

            <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
                <div class="alert alert-success">Jawaban berhasil dihapus.</div>
            <?php endif; ?>

            <table class="table table-bordered table-striped">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th style="width: 180px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($mahasiswa as $i => $m): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= htmlspecialchars($m['nim']) ?></td>
                        <td><?= htmlspecialchars($m['nama_lengkap']) ?></td>
                        <td>
                            <a href="jawaban_detail.php?nim=<?= urlencode($m['nim']) ?>" class="btn btn-sm btn-primary me-1">
                                <i class="fa fa-eye"></i> Lihat
                            </a>
                            <a href="hapus_jawaban.php?nim=<?= urlencode($m['nim']) ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Yakin ingin menghapus semua jawaban mahasiswa ini?');">
                                <i class="fa fa-trash"></i> Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>
