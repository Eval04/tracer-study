<?php
require '../functions.php';

$nim = $_GET['nim'] ?? '';

if (!$nim) {
    die("NIM tidak ditemukan.");
}

$pdo = getDbConnection();

try {
    $stmt = $pdo->prepare("DELETE FROM tb_jawaban WHERE nim = ?");
    $stmt->execute([$nim]);

    header("Location: jawaban_list.php?status=sukses");
    exit;
} catch (PDOException $e) {
    echo "Gagal menghapus: " . $e->getMessage();
}
