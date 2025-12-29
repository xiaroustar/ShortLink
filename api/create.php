<?php
require __DIR__ . '/../config.php';

// 只允许 POST JSON
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['success' => false, 'message' => 'Method Not Allowed'], 405);
}

$input = json_decode(file_get_contents('php://input'), true);
$url   = trim($input['url'] ?? '');

$ip = getClientIp();
// checkRateLimit($ip);

checkRateLimitRedis($ip);


// 蜜罐字段检测
if (!empty($input['website']) || !empty($input['confirm_email'])) {
    jsonResponse([
        'success' => false,
        'code' => 'HONEYPOT',
        'message' => '非法请求'
    ], 400);
}

// URL 校验
if (!$url || strlen($url) > MAX_URL_LENGTH) {
    jsonResponse(['success' => false, 'message' => 'URL 无效'], 400);
}

if (!filter_var($url, FILTER_VALIDATE_URL)) {
    jsonResponse(['success' => false, 'message' => 'URL 格式错误'], 400);
}

$scheme = parse_url($url, PHP_URL_SCHEME);
if (!in_array($scheme, ['http', 'https'], true)) {
    jsonResponse(['success' => false, 'message' => '不支持的协议'], 400);
}

$pdo = db();

// 是否已存在
$stmt = $pdo->prepare(
    'SELECT short_code FROM short_links WHERE original_url = ? AND status = 1 LIMIT 1'
);
$stmt->execute([$url]);
$exist = $stmt->fetch();

if ($exist) {
    jsonResponse([
        'success' => true,
        'is_duplicate' => true,
        'short_code' => $exist['short_code'],
        'short_url' => BASE_DOMAIN . '/' . $exist['short_code']
    ]);
}

// 生成短码
function generateCode(int $length): string
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[random_int(0, strlen($chars) - 1)];
    }
    return $code;
}

// 从 3 位开始尝试
// $shortCode = '';
// for ($len = 3; $len <= 8; $len++) {
//     for ($i = 0; $i < 5; $i++) { // 每个长度最多尝试 5 次
//         $code = generateCode($len);
//         $check = $pdo->prepare('SELECT 1 FROM short_links WHERE short_code = ?');
//         $check->execute([$code]);
//         if (!$check->fetch()) {
//             $shortCode = $code;
//             break 2;
//         }
//     }
// }

$shortCode = generateSequentialCode($pdo);


if (!$shortCode) {
    jsonResponse(['success' => false, 'message' => '生成失败'], 500);
}

// 插入
$stmt = $pdo->prepare(
    'INSERT INTO short_links (short_code, original_url, ip_address) VALUES (?, ?, ?)'
);
$stmt->execute([
    $shortCode,
    $url,
    getClientIp()
]);

jsonResponse([
    'success' => true,
    'short_code' => $shortCode,
    'short_url' => BASE_DOMAIN . '/' . $shortCode
]);
