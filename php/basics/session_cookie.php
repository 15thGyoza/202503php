<?php

require_once '../helpers.php';

// cookie

//setcookie(
//    string $name,                // Cookie 的名称
//string $value = "",          // Cookie 的值 (会被自动 URL 编码)
//int $expires_or_options = 0, // 过期时间 (Unix 时间戳) 或 选项数组 (PHP 7.3+)
//string $path = "",           // 有效路径 (默认当前目录, '/' 表示整个域名)
//string $domain = "",         // 有效域名 (默认当前域名, '.example.com' 可用于子域名)
//bool $secure = false,         // true 表示仅通过 HTTPS 发送
//bool $httponly = false        // true 表示禁止 JavaScript 访问 (提高安全性)
//): bool

// 设置一个名为 "theme" 的 Cookie，值为 "dark"，有效期为 30 天
$cookie_name = "theme";
$cookie_value = "dark";
$expiry_time = time() + (86400 * 30); // 86400 秒 = 1 天

// 调用 setcookie()，在所有 HTML 输出之前
setcookie($cookie_name, $cookie_value, $expiry_time, "/", "", true, true); // 路径设为'/', 开启 secure 和 httponly

// PHP 7.3+ 的选项数组方式:
/*
setcookie($cookie_name, $cookie_value, [
'expires' => $expiry_time,
'path' => '/',
'domain' => '', // 默认当前域名
'secure' => true,
'httponly' => true,
'samesite' => 'Lax' // Lax 或 Strict 通常比 None 更安全
]);
*/

echoHr();

// 开启会话
session_start();

setcookie('username', '巫师学徒', time() + 3600, '/');

varDumpWithBr($_COOKIE['username']);

// 自己查询
// 同源策略
// 跨域请求
// HTTP头字段 https://zh.wikipedia.org/wiki/HTTP%E5%A4%B4%E5%AD%97%E6%AE%B5

// --- 存储数据 ---
// 假设用户登录成功
$_SESSION['user_id'] = 123;
$_SESSION['username'] = 'Alice';
$_SESSION['login_time'] = time();
$_SESSION['preferences'] = ['theme' => 'dark', 'lang' => 'zh'];
echo "Session 数据已设置。<br>";

// --- 读取数据 ---
if (isset($_SESSION['username'])) {
    echo "欢迎回来, " . htmlspecialchars($_SESSION['username']) . "!<br>";
} else {
    echo "用户未登录。<br>";
}

// 使用 ?? 提供默认值
$lang = $_SESSION['preferences']['lang'] ?? 'en';
echo "用户语言设置: " . htmlspecialchars($lang) . "<br>";

// --- 修改数据 ---
$_SESSION['preferences']['lang'] = 'en_US';

// --- 删除单个 session 变量 ---
unset($_SESSION['login_time']);