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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Kuesioner</title>
<link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="container">
<h1>Tambah Pertanyaan Kuesioner</h1>

<?php if (isset($success)): ?>
<div class="alert success"><?= $success ?></div>
<?php elseif (isset($error)): ?>
<div class="alert error"><?= $error ?></div>
<?php endif; ?>

<form method="post">
<div class="form-group">
<label>Judul Kuesioner:</label>
<input type="text" name="judul" required>
</div>

<div class="form-group">
<label>Kategori:</label>
<select name="kategori_id" required>
<option value="1">Keadaan Sekarang</option>
<option value="2">Tingkat Kompetensi (Lulus)</option>
<option value="3">Tingkat Kompetensi (Sekarang)</option>
<option value="4">Masa Transisi</option>
<option value="5">Kuesioner Kepuasan</option>
</select>
</div>

<div class="form-group">
<label>Nomor:</label>
<input type="number" name="nomor" required>
</div>

<div class="form-group">
<label>Soal:</label>
<textarea name="soal" rows="3" required></textarea>
</div>

<div class="form-group">
<label>Jenis Jawaban:</label>
<select name="jenis_jawaban" id="jenis-jawaban">
<option value="">-- Pilih --</option>
<option value="radio">Radio Button</option>
<option value="checkbox">Checkbox</option>
<option value="select">Dropdown Select</option>
<option value="text">Text Input</option>
</select>
</div>

<div id="opsi-container" style="display:none;">
<h3>Opsi Jawaban</h3>
<div id="opsi-list"></div>
<button type="button" onclick="tambahOpsi()">Tambah Opsi</button>

<div class="form-group">
<label>
<input type="checkbox" name="ada_lainnya" id="ada-lainnya">
Sertakan opsi "Lainnya"
</label>
</div>
</div>

<button type="submit">Simpan Pertanyaan</button>
</form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-lainnya").forEach((checkbox) => {
        checkbox.addEventListener("change", function () {
            const questionId = this.getAttribute("data-question");
            const inputLainnya = document.querySelector(
            `.input-lainnya[name="jawaban_lainnya[${questionId}]"]`
            );
            
            if (this.checked) {
                inputLainnya.style.display = "block";
                inputLainnya.required = true;
            } else {
                inputLainnya.style.display = "none";
                inputLainnya.required = false;
                inputLainnya.value = "";
            }
        });
    });
});

document.getElementById('jenis-jawaban').addEventListener('change', function() {
    const jenis = this.value;
    const opsiContainer = document.getElementById('opsi-container');
    
    if (jenis === 'radio' || jenis === 'checkbox' || jenis === 'select') {
        opsiContainer.style.display = 'block';
        document.getElementById('ada-lainnya').disabled = jenis === 'select';
    } else {
        opsiContainer.style.display = 'none';
    }
});

function tambahOpsi() {
    const div = document.createElement('div');
    div.className = 'opsi-item';
    div.innerHTML = `
    <input type="text" name="opsi[]" placeholder="Tulis opsi jawaban" required>
    <button type="button" onclick="this.parentNode.remove()">Hapus</button>
    `;
    document.getElementById('opsi-list').appendChild(div);
}
</script>
</body>
</html>