<?php
require '../functions.php';

// Ambil semua pertanyaan dari database
$pdo = getDbConnection();
$stmt = $pdo->query("
    SELECT k.*, c.nama_kategori
    FROM tb_kuisioner k
    JOIN tb_kategori c ON k.kategori_id = c.id
    ORDER BY k.kategori_id, k.nomor ASC
");
$questions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pertanyaan Kuisioner</title>
    <link rel="stylesheet" href="style/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f0f0f0;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-delete:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Daftar Pertanyaan Kuisioner</h1>

    <?php if (count($questions) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Pertanyaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions as $index => $row): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($row['judul']) ?></td>
                        <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
                        <td><?= htmlspecialchars($row['soal']) ?></td>
                        <td>
                            <button class="btn-delete" onclick="hapusPertanyaan(<?= $row['id'] ?>)">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada pertanyaan tersedia.</p>
    <?php endif; ?>
</div>

<script>
function hapusPertanyaan(id) {
  if (confirm('Yakin ingin menghapus pertanyaan ini beserta jawabannya?')) {
    fetch('delete_question.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(response => response.json())
    .then(data => {
      alert(data.message);
      if (data.success) {
        location.reload();
      }
    })
    .catch(error => {
      alert('Terjadi kesalahan saat menghapus: ' + error);
    });
  }
}
</script>
</body>
</html>
