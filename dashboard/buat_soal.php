<?php
require '../functions.php';

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
    
    if (saveQuestion($data)) {
        $success = "Pertanyaan berhasil disimpan!";
    } else {
        $error = "Gagal menyimpan pertanyaan";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Pertanyaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-box {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        h3 {
            font-weight: 600;
            margin-bottom: 20px;
            color: #003366;
        }

        .form-label {
            font-weight: 500;
            color: #333;
        }

        .alert {
            padding: 12px 18px;
            border-radius: 8px;
        }

        .opsi-item input {
            width: calc(100% - 90px);
            display: inline-block;
        }

        .opsi-item button {
            margin-left: 10px;
        }

        #opsi-container {
            margin-top: 20px;
        }

        button[type="submit"] {
            background-color: #004a99;
            border: none;
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 8px;
        }

        button[type="submit"]:hover {
            background-color: #0065d1;
        }
        .btn-secondary {
    padding: 8px 20px;
    font-weight: 500;
    border-radius: 8px;
    background-color: #6c757d;
    color: white;
    border: none;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

    </style>
</head>
<body>

<div class="container-box">
    <h3 class="text-center">Tambah Pertanyaan Kuesioner</h3>

    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Judul Kuesioner:</label>
            <input type="text" class="form-control" name="judul" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori:</label>
            <select name="kategori_id" class="form-select" required>
                <option value="1">Keadaan Sekarang</option>
                <option value="2">Tingkat Kompetensi (Lulus)</option>
                <option value="3">Tingkat Kompetensi (Sekarang)</option>
                <option value="4">Masa Transisi</option>
                <option value="5">Kuesioner Kepuasan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor:</label>
            <input type="number" class="form-control" name="nomor" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Soal:</label>
            <textarea class="form-control" name="soal" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Jawaban:</label>
            <select name="jenis_jawaban" id="jenis-jawaban" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="radio">Radio Button</option>
                <option value="checkbox">Checkbox</option>
                <option value="select">Dropdown Select</option>
                <option value="text">Text Input</option>
            </select>
        </div>

        <div id="opsi-container" style="display:none;">
            <label class="form-label">Opsi Jawaban:</label>
            <div id="opsi-list" class="mb-2"></div>
            <button type="button" class="btn btn-outline-primary btn-sm" onclick="tambahOpsi()">+ Tambah Opsi</button>

            <div class="form-check mt-3">
                <input type="checkbox" class="form-check-input" name="ada_lainnya" id="ada-lainnya">
                <label for="ada-lainnya" class="form-check-label">Sertakan opsi "Lainnya"</label>
            </div>
        </div>

        <div class="mt-4 text-center">
            <button type="submit">Simpan Pertanyaan</button>
        </div>
    </form>
</div>
<div class="text-center mt-4">
    <button class="btn btn-secondary" onclick="history.back()">← Kembali Ke Dashboard</button>
</div>

<script>
    document.getElementById('jenis-jawaban').addEventListener('change', function() {
        const jenis = this.value;
        const opsiContainer = document.getElementById('opsi-container');
        const lainnyaCheck = document.getElementById('ada-lainnya');

        if (jenis === 'radio' || jenis === 'checkbox' || jenis === 'select') {
            opsiContainer.style.display = 'block';
            lainnyaCheck.disabled = jenis === 'select';
        } else {
            opsiContainer.style.display = 'none';
        }
    });

    function tambahOpsi() {
        const div = document.createElement('div');
        div.className = 'opsi-item mb-2';
        div.innerHTML = `
            <input type="text" class="form-control d-inline-block" name="opsi[]" placeholder="Tulis opsi jawaban" required style="width:85%; display:inline-block">
            <button type="button" class="btn btn-danger btn-sm" onclick="this.parentNode.remove()">Hapus</button>
        `;
        document.getElementById('opsi-list').appendChild(div);
    }
</script>

</body>
</html>
