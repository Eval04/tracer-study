<?php
function getDbConnection() {
    $host = '127.0.0.1';
    $db   = 'db_pep';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}

function getKuisionerList() {
    $pdo = getDbConnection();
    $sql = "SELECT k.*, c.nama_kategori 
            FROM tb_kuisioner k
            JOIN tb_kategori c ON k.kategori_id = c.id
            ORDER BY k.kategori_id, k.nomor ASC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

function saveAnswer($data) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("INSERT INTO tb_jawaban (nim, kuisioner_id, jawaban, tanggal_submit) VALUES (?, ?, ?, CURDATE())");

    if (!$stmt->execute([$data['nim'], $data['kuisioner_id'], $data['jawaban']])) {
        file_put_contents('error_jawaban.txt', print_r($stmt->errorInfo(), true));
        return false;
    }
    return true;
}

function saveMahasiswa($data) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("
        INSERT INTO tb_mahasiswa 
        (nim, password, nama_lengkap, tgl_lahir, gender, email, no_hp, alamat, tahun_lulus, program_studi)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            nama_lengkap = VALUES(nama_lengkap),
            gender = VALUES(gender),
            email = VALUES(email),
            no_hp = VALUES(no_hp),
            alamat = VALUES(alamat),
            tahun_lulus = VALUES(tahun_lulus),
            program_studi = VALUES(program_studi)
    ");
    $stmt->execute([
        $data['nim'],
        'mhs123',
        $data['nama_lengkap'],
        '2000-01-01',
        $data['gender'],
        $data['email'],
        $data['no_telepon'],
        $data['alamat'],
        $data['tahun_lulus'],
        $data['program_studi']
    ]);
}


function saveQuestion($data) {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare("INSERT INTO tb_kuisioner (judul, kategori_id, nomor, soal, jenis_jawaban, opsi_jawaban) VALUES (?, ?, ?, ?, ?, ?)");
    return $stmt->execute([
        $data['judul'],
        $data['kategori_id'],
        $data['nomor'],
        $data['soal'],
        $data['jenis_jawaban'],
        $data['opsi_jawaban']
    ]);
}

?>
