<?php
require '../functions.php';

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
    <title>Daftar Mahasiswa</title>
    <style>
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background: #f0f0f0;
        }

        .btn {
            padding: 5px 10px;
            font-size: 13px;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #0d6efd;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Daftar Mahasiswa Pengisi Kuesioner</h1>

    <?php if (isset($_GET['status']) && $_GET['status'] === 'sukses'): ?>
        <div class="alert-success">Jawaban berhasil dihapus.</div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $i => $m): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= htmlspecialchars($m['nim']) ?></td>
                <td><?= htmlspecialchars($m['nama_lengkap']) ?></td>
                <td>
                    <a href="jawaban_detail.php?nim=<?= urlencode($m['nim']) ?>" class="btn btn-primary">Lihat</a>
                    <a href="hapus_jawaban.php?nim=<?= urlencode($m['nim']) ?>" 
                       class="btn btn-danger"
                       onclick="return confirm('Yakin ingin menghapus semua jawaban mahasiswa ini?');">
                       Hapus
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>