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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color:rgb(255, 255, 255);
        font-family: 'Segoe UI', sans-serif;
    }

    .custom-header {
        background-color:rgb(255, 255, 255);
        padding: 20px 30px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        border-bottom: 3px solid rgb(2, 63, 124);
        position: relative;
    }

    .custom-header img {
        max-height: 50px;
        z-index: 1;
    }

    .custom-header .title {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
    }

    .custom-header .title h4 {
        margin: 0;
        font-weight: 700;
        color: #003366;
    }

    .custom-header .title p {
        margin: 0;
        font-size: 14px;
        color: #003366;
    }

    .container-box {
        max-width: 960px;
        margin: 30px auto;
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .section-box {
        margin-bottom: 30px;
    }

    .section-box h5 {
        font-weight: bold;
        color: #004a99;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .soal-label {
        font-weight: 500;
        margin-top: 15px;
    }

    .jawaban-box {
        background: #f9f9f9;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px 15px;
        margin-top: 5px;
    }

    h4, p {
        color: black;
    }
</style>

</head>
<body>

<!-- Custom Header -->
<div class="custom-header">
    <img src="includes/img/Logo-PPSUNM 1.png" alt="PPS UNM">
    <div class="title">
        <h4>Tracer Study</h4>
        <p>Program Pascasarjana - Universitas Negeri Makassar</p>
    </div>
</div>

<!-- Main Content -->
<div class="container-box">
    <h4 class="mb-4 text-center text-primary">Detail Jawaban Mahasiswa: <?= htmlspecialchars($nim) ?></h4>

    <?php foreach ($grouped as $kategori => $items): ?>
        <div class="section-box">
            <h5><?= htmlspecialchars($kategori) ?></h5>
            <?php foreach ($items as $item): ?>
                <div>
                    <label class="soal-label"><?= htmlspecialchars($item['nomor']) ?>. <?= htmlspecialchars($item['soal']) ?></label>
                    <div class="jawaban-box"><?= nl2br(htmlspecialchars($item['jawaban'])) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
