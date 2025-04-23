<?php
require '../functions.php';

$nim = $_GET['nim'] ?? '';
if (empty($nim)) {
    die("NIM tidak ditemukan.");
}

$pdo = getDbConnection();

// Ambil semua jawaban mahasiswa berdasarkan kuisioner & kategori
$stmt = $pdo->prepare("
    SELECT j.jawaban, j.tanggal_submit, k.soal, k.nomor, c.nama_kategori
    FROM tb_jawaban j
    JOIN tb_kuisioner k ON j.kuisioner_id = k.id
    JOIN tb_kategori c ON k.kategori_id = c.id
    WHERE j.nim = ?
    ORDER BY k.kategori_id, k.nomor
");
$stmt->execute([$nim]);
$jawabanList = $stmt->fetchAll();

// Kelompokkan berdasarkan kategori
$grouped = [];
foreach ($jawabanList as $item) {
    $grouped[$item['nama_kategori']][] = $item;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jawaban Mahasiswa</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        .container {
            max-width: 960px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            vertical-align: top;
        }

        th {
            background: #f8f8f8;
        }

        h2 {
            margin-top: 40px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Jawaban Mahasiswa: <?= htmlspecialchars($nim) ?></h1>

    <?php if (count($grouped) > 0): ?>
        <?php foreach ($grouped as $kategori => $items): ?>
            <h2><?= htmlspecialchars($kategori) ?></h2>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($items as $i => $row): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($row['soal']) ?></td>
                            <td><?= htmlspecialchars($row['jawaban']) ?></td>
                            <td><?= htmlspecialchars($row['tanggal_submit']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Belum ada jawaban dari mahasiswa ini.</p>
    <?php endif; ?>
</div>
</body>
</html>
