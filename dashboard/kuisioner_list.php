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
    <title>Daftar Pertanyaan Kuesioner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f5f5;
            font-family: 'Segoe UI', sans-serif;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        h1 {
            margin-bottom: 25px;
            font-weight: bold;
            color: #003366;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            vertical-align: middle;
        }

        th {
            background-color: #f1f1f1;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
        }

        .btn-delete:hover {
            background-color: #bb2d3b;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            margin-right: 5px;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-back {
            margin-top: 25px;
        }
        .action-buttons .btn {
  padding: 6px 14px;
  font-size: 13px;
  border-radius: 6px;
  font-weight: 500;
  transition: all 0.2s ease-in-out;
}

.btn-edit {
  background-color: #007bff;
  color: white;
  margin-bottom: 6px;
  display: inline-block;
  width: 60px;
  text-align: center;
  border: none;
}

.btn-edit:hover {
  background-color: #0056b3;
}

.btn-delete {
  background-color: #dc3545;
  color: white;
  display: inline-block;
  width: 60px;
  text-align: center;
  border: none;
}

.btn-delete:hover {
  background-color: #b02a37;
}

    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Pertanyaan Kuesioner</h1>

    <?php if (count($questions) > 0): ?>
        <table class="table table-hover">
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
                        <td class="action-buttons">
    <a href="edit_question.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a><br>
    <button class="btn btn-delete" onclick="hapusPertanyaan(<?= $row['id'] ?>)">Hapus</button>
</td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-muted">Belum ada pertanyaan tersedia.</p>
    <?php endif; ?>
    <div class="main-content">
  <div class="btn-back text-start mb-3">
    <a href="index.php" class="btn btn-secondary">← Kembali ke Dashboard</a>
  </div>

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
