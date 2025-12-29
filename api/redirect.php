<?php
require __DIR__ . '/../config.php';

$code = $_GET['code'] ?? '';

if (!preg_match('/^[a-zA-Z0-9]{3,8}$/', $code)) {
    http_response_code(404);
    exit('Not Found');
}

$pdo = db();

$stmt = $pdo->prepare(
    'SELECT id, original_url FROM short_links WHERE short_code = ? AND status = 1 LIMIT 1'
);
$stmt->execute([$code]);
$row = $stmt->fetch();

if (!$row) {
    http_response_code(404);
    exit('Link not found');
}

// 统计点击
$pdo->prepare(
    'UPDATE short_links SET clicks = clicks + 1 WHERE id = ?'
)->execute([$row['id']]);

header('Location: ' . $row['original_url'], true, 302);
exit;
