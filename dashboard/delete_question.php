<?php
require '../functions.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $questionId = (int)$_POST['id'];

    try {
        $pdo = getDbConnection();
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("DELETE FROM tb_jawaban WHERE kuisioner_id = ?");
        $stmt->execute([$questionId]);

        $stmt = $pdo->prepare("DELETE FROM tb_kuisioner WHERE id = ?");
        $stmt->execute([$questionId]);

        $pdo->commit();

        echo json_encode(['success' => true, 'message' => 'Pertanyaan dan semua jawaban terkait berhasil dihapus']);
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Gagal menghapus: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Request tidak valid']);
}
