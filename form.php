<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim         = $_POST['nim'] ?? '';
    $namaLengkap = $_POST['nama_lengkap'] ?? '';
    $email       = $_POST['email'] ?? '';
    $noTelepon   = $_POST['no_telepon'] ?? '';
    $alamat      = $_POST['alamat'] ?? '';
    $tahunLulus  = $_POST['tahun_lulus'] ?? '';
    $program_studi       = $_POST['program_studi'] ?? '';
    $gender      = $_POST['gender'] ?? '';
    $answers     = $_POST['jawaban'] ?? [];

    if (empty($nim)) {
        $error = "NIM harus diisi.";
    } else {
        // Simpan data mahasiswa
        saveMahasiswa([
            'nim'           => $nim,
            'nama_lengkap'  => $namaLengkap,
            'email'         => $email,
            'no_telepon'    => $noTelepon,
            'alamat'        => $alamat,
            'tahun_lulus'   => $tahunLulus,
            'program_studi'         => $program_studi,
            'gender'        => $gender
        ]);

        // Simpan jawaban
        foreach ($answers as $kuisionerId => $jawaban) {
            $jawabanText = is_array($jawaban) ? implode(', ', array_filter($jawaban)) : $jawaban;

            if (!empty($_POST['jawaban_lainnya'][$kuisionerId])) {
                $jawabanText .= (empty($jawabanText) ? '' : ', ') . $_POST['jawaban_lainnya'][$kuisionerId];
            }

            saveAnswer([
                'nim'          => $nim,
                'kuisioner_id' => $kuisionerId,
                'jawaban'      => $jawabanText
            ]);
        }

        $success = "Terima kasih! Jawaban Anda telah tersimpan.";
    }
}

$kuisionerList = getKuisionerList();

// Kelompokkan pertanyaan per kategori
$grouped = [];
foreach ($kuisionerList as $item) {
    $grouped[$item['nama_kategori']][] = $item;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kuesioner Tracer Study</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<section class="hero">
    <h1>Tracer Study</h1>
    <p>Alumni Program Pascasarjana<br>Universitas Negeri Makassar</p>
</section>

<div class="container">
    <?php if (isset($success)): ?>
        <div class="alert success"><?= $success ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <table class="question-table" style="margin-bottom: 30px;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Data Diri</th>
                    <th>Jawab</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Nama Lengkap</td>
                    <td><input type="text" name="nama_lengkap" required value="<?= htmlspecialchars($_POST['nama_lengkap'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>NIM Sebelum Lulus</td>
                    <td><input type="text" name="nim" required value="<?= htmlspecialchars($_POST['nim'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Email</td>
                    <td><input type="text" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>No Telepon</td>
                    <td><input type="text" name="no_telepon" required value="<?= htmlspecialchars($_POST['no_telepon'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat" required value="<?= htmlspecialchars($_POST['alamat'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Tahun Lulus</td>
                    <td><input type="number" name="tahun_lulus" min="1990" max="2100" required value="<?= htmlspecialchars($_POST['tahun_lulus'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Program Studi</td>
                    <td><input type="text" name="prodi" required value="<?= htmlspecialchars($_POST['prodi'] ?? '') ?>"></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Jenis Kelamin</td>
                    <td>
                        <label><input type="radio" name="gender" value="pria" <?= (($_POST['gender'] ?? '') === 'pria') ? 'checked' : '' ?>> Pria</label>
                        <label><input type="radio" name="gender" value="wanita" <?= (($_POST['gender'] ?? '') === 'wanita') ? 'checked' : '' ?>> Wanita</label>
                    </td>
                </tr>
            </tbody>
        </table>

        <?php foreach ($grouped as $kategori => $pertanyaanList): ?>
            <div class="question-group">
                <h3><?= htmlspecialchars($kategori) ?></h3>
                <table class="question-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pertanyaan</th>
                            <th>Jawaban</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pertanyaanList as $index => $kuisioner): ?>
                            <?php $opsi = json_decode($kuisioner['opsi_jawaban'], true); ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= htmlspecialchars($kuisioner['soal']) ?></td>
                                <td>
                                    <?php if ($kuisioner['jenis_jawaban'] === 'select' || $kuisioner['jenis_jawaban'] === 'radio'): ?>
                                        <select name="jawaban[<?= $kuisioner['id'] ?>]" required>
                                            <option value="">Pilih Jawaban</option>
                                            <?php foreach ($opsi['opsi'] as $option): ?>
                                                <option value="<?= htmlspecialchars($option) ?>"><?= htmlspecialchars($option) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php elseif ($kuisioner['jenis_jawaban'] === 'text'): ?>
                                        <input type="text" name="jawaban[<?= $kuisioner['id'] ?>]" required>
                                    <?php elseif ($kuisioner['jenis_jawaban'] === 'checkbox'): ?>
                                        <?php foreach ($opsi['opsi'] as $option): ?>
                                            <label>
                                                <input type="checkbox" name="jawaban[<?= $kuisioner['id'] ?>][]" value="<?= htmlspecialchars($option) ?>">
                                                <?= htmlspecialchars($option) ?>
                                            </label>
                                        <?php endforeach; ?>
                                        <?php if (!empty($opsi['ada_lainnya'])): ?>
                                            <label>
                                                <input type="checkbox" class="toggle-lainnya" data-question="<?= $kuisioner['id'] ?>"> Lainnya:
                                            </label>
                                            <input type="text" name="jawaban_lainnya[<?= $kuisioner['id'] ?>]" class="input-lainnya" style="display:none;">
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>

        <button type="submit" class="button-kirim">Kirim Jawaban</button>
    </form>
</div>

<script src="script/script.js"></script>
</body>
</html>
