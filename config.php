<?php
// config.php
declare(strict_types=1);

// ==== 基础配置 ====
define('DB_HOST', '127.0.0.1');
define('DB_NAME', ''); // 数据库名
define('DB_USER', ''); // 数据库名
define('DB_PASS', ''); // 数据库密码
define('DB_CHARSET', 'utf8mb4');

// ==== Redis 配置 ====
define('REDIS_HOST', '127.0.0.1');
define('REDIS_PORT', 6379);
define('REDIS_TIMEOUT', 1.5);


define('BASE_DOMAIN', 'https://tz.aa1.cn'); // 项目域名
define('MAX_URL_LENGTH', 2000);

// ==== PDO 连接 ====
function db(): PDO
{
    static $pdo = null;
    if ($pdo === null) {
        $dsn = sprintf(
            'mysql:host=%s;dbname=%s;charset=%s',
            DB_HOST,
            DB_NAME,
            DB_CHARSET
        );

        $pdo = new PDO($dsn, DB_USER, DB_PASS, [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ]);
    }
    return $pdo;
}


function redis(): Redis
{
    static $redis = null;

    if ($redis === null) {
        $redis = new Redis();
        $redis->connect(REDIS_HOST, REDIS_PORT, REDIS_TIMEOUT);
        // $redis->auth('password');
        $redis->setOption(Redis::OPT_PREFIX, '');
    }

    return $redis;
}

// function checkRateLimit(string $ip): void
// {
//     $pdo = db();

//     $minuteKey = date('YmdHi');
//     $dayKey    = date('Ymd');

//     $stmt = $pdo->prepare(
//         'SELECT minute_count, day_count 
//          FROM ip_rate_limit 
//          WHERE ip_address = ? AND minute_key = ?'
//     );
//     $stmt->execute([$ip, $minuteKey]);
//     $row = $stmt->fetch();

//     if ($row) {
//         if ($row['minute_count'] >= 10 || $row['day_count'] >= 200) {
//             jsonResponse([
//                 'success' => false,
//                 'code' => 'RATE_LIMIT',
//                 'message' => '请求过于频繁，请稍后再试'
//             ], 429);
//         }

//         $pdo->prepare(
//             'UPDATE ip_rate_limit 
//              SET minute_count = minute_count + 1,
//                  day_count = day_count + 1
//              WHERE ip_address = ? AND minute_key = ?'
//         )->execute([$ip, $minuteKey]);

//     } else {
//         // 查询今天是否已有记录
//         $stmt = $pdo->prepare(
//             'SELECT day_count FROM ip_rate_limit 
//              WHERE ip_address = ? AND day_key = ? 
//              ORDER BY updated_at DESC LIMIT 1'
//         );
//         $stmt->execute([$ip, $dayKey]);
//         $day = $stmt->fetchColumn() ?: 0;

//         if ($day >= 200) {
//             jsonResponse([
//                 'success' => false,
//                 'code' => 'DAILY_LIMIT',
//                 'message' => '今日创建次数已达上限'
//             ], 429);
//         }

//         $pdo->prepare(
//             'INSERT INTO ip_rate_limit 
//              (ip_address, minute_key, day_key, minute_count, day_count)
//              VALUES (?, ?, ?, 1, ?)'
//         )->execute([$ip, $minuteKey, $dayKey, $day + 1]);
//     }
// }

function checkRateLimitRedis(string $ip): void
{
    $redis = redis();

    $minuteKey = "rl:ip:$ip:m";
    $dayKey    = "rl:ip:$ip:d";

    // ===== 每分钟 =====
    $minute = $redis->incr($minuteKey);
    if ($minute === 1) {
        $redis->expire($minuteKey, 60);
    }

    if ($minute > 10) {
        jsonResponse([
            'success' => false,
            'code' => 'RATE_LIMIT',
            'message' => '请求过于频繁，请稍后再试'
        ], 429);
    }

    // ===== 每日 =====
    $day = $redis->incr($dayKey);
    if ($day === 1) {
        $redis->expire($dayKey, 86400);
    }

    if ($day > 200) {
        jsonResponse([
            'success' => false,
            'code' => 'DAILY_LIMIT',
            'message' => '今日创建次数已达上限'
        ], 429);
    }
}


function base62Encode(int $num): string
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $base  = strlen($chars);

    if ($num === 0) {
        return $chars[0];
    }

    $result = '';
    while ($num > 0) {
        $result = $chars[$num % $base] . $result;
        $num = intdiv($num, $base);
    }
    return $result;
}

function generateSequentialCode(PDO $pdo): string
{
    // 插入一条空记录，拿自增 ID
    $pdo->exec('INSERT INTO short_sequence () VALUES ()');
    $id = (int)$pdo->lastInsertId();

    $code = base62Encode($id);

    // 保证最小 3 位
    if (strlen($code) < 3) {
        $code = str_pad($code, 3, 'a', STR_PAD_LEFT);
    }

    return $code;
}

// ==== 获取真实 IP（防代理）====
function getClientIp(): string
{
    $keys = [
        'HTTP_CF_CONNECTING_IP',
        'HTTP_X_REAL_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR'
    ];

    foreach ($keys as $key) {
        if (!empty($_SERVER[$key])) {
            return explode(',', $_SERVER[$key])[0];
        }
    }
    return '0.0.0.0';
}

// ==== JSON 输出 ====
function jsonResponse(array $data, int $code = 200): void
{
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}
