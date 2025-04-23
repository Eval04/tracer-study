<?php
require '../functions.php';

$pdo = getDbConnection();
$id = $_GET['id'] ?? null;

if (!$id) {
    die("ID tidak ditemukan.");
}

// Ambil data pertanyaan
$stmt = $pdo->prepare("SELECT * FROM tb_kuisioner WHERE id = ?");
$stmt->execute([$id]);
$pertanyaan = $stmt->fetch();

if (!$pertanyaan) {
    die("Pertanyaan tidak ditemukan.");
}

$opsiData = json_decode($pertanyaan['opsi_jawaban'], true);
$opsiList = $opsiData['opsi'] ?? [];
$adaLainnya = $opsiData['ada_lainnya'] ?? false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'judul' => $_POST['judul'],
        'kategori_id' => $_POST['kategori_id'],
        'nomor' => $_POST['nomor'],
        'soal' => $_POST['soal'],
        'jenis_jawaban' => $_POST['jenis_jawaban'],
        'opsi_jawaban' => json_encode([
            'opsi' => $_POST['opsi'] ?? [],
            'ada_lainnya' => isset($_POST['ada_lainnya'])
        ])
    ];

    $stmt = $pdo->prepare("UPDATE tb_kuisioner SET judul = ?, kategori_id = ?, nomor = ?, soal = ?, jenis_jawaban = ?, opsi_jawaban = ? WHERE id = ?");
    if ($stmt->execute([
        $data['judul'], $data['kategori_id'], $data['nomor'],
        $data['soal'], $data['jenis_jawaban'], $data['opsi_jawaban'], $id
    ])) {
        header("Location: daftar_pertanyaan.php");
        exit;
    } else {
        $error = "Gagal menyimpan perubahan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pertanyaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        h2 {
            color: #003366;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Pertanyaan</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required value="<?= htmlspecialchars($pertanyaan['judul']) ?>">
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori_id" class="form-control" required>
                <option value="1" <?= $pertanyaan['kategori_id'] == 1 ? 'selected' : '' ?>>Keadaan Sekarang</option>
                <option value="2" <?= $pertanyaan['kategori_id'] == 2 ? 'selected' : '' ?>>Tingkat Kompetensi (Lulus)</option>
                <option value="3" <?= $pertanyaan['kategori_id'] == 3 ? 'selected' : '' ?>>Tingkat Kompetensi (Sekarang)</option>
                <option value="4" <?= $pertanyaan['kategori_id'] == 4 ? 'selected' : '' ?>>Masa Transisi</option>
                <option value="5" <?= $pertanyaan['kategori_id'] == 5 ? 'selected' : '' ?>>Kuesioner Kepuasan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Nomor</label>
            <input type="number" name="nomor" class="form-control" required value="<?= $pertanyaan['nomor'] ?>">
        </div>

        <div class="mb-3">
            <label>Soal</label>
            <textarea name="soal" rows="3" class="form-control" required><?= htmlspecialchars($pertanyaan['soal']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Jenis Jawaban</label>
            <select name="jenis_jawaban" id="jenis-jawaban" class="form-control">
                <option value="radio" <?= $pertanyaan['jenis_jawaban'] == 'radio' ? 'selected' : '' ?>>Radio Button</option>
                <option value="checkbox" <?= $pertanyaan['jenis_jawaban'] == 'checkbox' ? 'selected' : '' ?>>Checkbox</option>
                <option value="select" <?= $pertanyaan['jenis_jawaban'] == 'select' ? 'selected' : '' ?>>Dropdown Select</option>
                <option value="text" <?= $pertanyaan['jenis_jawaban'] == 'text' ? 'selected' : '' ?>>Text Input</option>
            </select>
        </div>

        <div id="opsi-container" style="display: none;">
            <label>Opsi Jawaban:</label>
            <div id="opsi-list">
                <?php foreach ($opsiList as $opsi): ?>
                    <div class="mb-2">
                        <input type="text" name="opsi[]" class="form-control d-inline w-75" value="<?= htmlspecialchars($opsi) ?>" required>
                        <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove()">Hapus</button>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="tambahOpsi()">+ Tambah Opsi</button>

            <div class="form-check mt-3">
                <input type="checkbox" class="form-check-input" name="ada_lainnya" id="ada-lainnya" <?= $adaLainnya ? 'checked' : '' ?>>
                <label class="form-check-label" for="ada-lainnya">Sertakan opsi "Lainnya"</label>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="kuisioner_list.php" class="btn btn-secondary">← Kembali</a>
        </div>
    </form>
</div>

<script>
    function tambahOpsi() {
        const div = document.createElement('div');
        div.className = 'mb-2';
        div.innerHTML = `
            <input type="text" name="opsi[]" class="form-control d-inline w-75" required>
            <button type="button" class="btn btn-sm btn-danger" onclick="this.parentElement.remove()">Hapus</button>
        `;
        document.getElementById('opsi-list').appendChild(div);
    }

    function toggleOpsiBox() {
        const jenis = document.getElementById('jenis-jawaban').value;
        const opsiContainer = document.getElementById('opsi-container');
        if (['radio', 'checkbox', 'select'].includes(jenis)) {
            opsiContainer.style.display = 'block';
        } else {
            opsiContainer.style.display = 'none';
        }
    }

    document.getElementById('jenis-jawaban').addEventListener('change', toggleOpsiBox);
    toggleOpsiBox(); // initial check
</script>
</body>
</html>
