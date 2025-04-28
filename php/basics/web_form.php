<?php

require '../helpers.php';

header('Content-type: text/html; charset=utf-8');

printRWithBr($_GET);
echoHr();
printRWithBr($_POST);
echoHr();
printRWithBr($_REQUEST);
echoHr();
printRWithBr($_FILES);
echoHr();
printRWithBr($_COOKIE);
echoHr();
session_start();
printRWithBr($_SESSION);
echoHr();
printRWithBr($_SERVER);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echoHr();
    echoWithBr('只有 POST 请求才会输出以下内容:');
    // 处理表单提交
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';

    printRWithBr($_POST);

    echo "Name: $name<br>";
    echo "Email: $email<br>";
    echo "Age: $age<br>";
}

// cURL 请求

echoHr();
// 目标 URL
$url = "http://localhost/202503php/php/basics/01.php";

// 1. 初始化 cURL 会话
$ch = curl_init();

// 2. 设置选项
// 设置要获取的 URL
curl_setopt($ch, CURLOPT_URL, $url);
// 设置 TRUE 将获取结果作为字符串返回，而不是直接输出
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// (可选) 设置 User Agent，模仿浏览器
curl_setopt($ch, CURLOPT_USERAGENT, 'My PHPCurlClient/1.0');
// (可选) 设置连接超时时间 (例如 10 秒)
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
// (可选) 设置总执行超时时间 (例如 30 秒)
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
// (可选) 跟随重定向
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); // 默认即是 true
// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);    // 默认即是 2

// 3. 执行请求
echo "正在请求: {$url} ...<br>";
$response = curl_exec($ch);

// 4. 检查错误
if ($response === false) {
    $error_no = curl_errno($ch);
    $error_msg = curl_error($ch);
    echo "<b class='text-red-600'>cURL Error ({$error_no}): {$error_msg}</b><br>";
} else {
    // 请求成功
    echo "请求成功！<br>";

    // 5. 获取信息 (例如 HTTP 状态码)
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP Status Code: {$http_code}<br>";

// (可选) 获取内容类型
    $content_type = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    echo "Content-Type: {$content_type}<br>";

// 处理响应内容 ($response 包含了网页 HTML)
    echo "<h4>响应内容 (前 200 字符):</h4>";
    echo "<pre>" . htmlspecialchars(substr($response, 0, 200)) . "...</pre>";
}

// 6. 关闭 cURL 句柄
curl_close($ch);
echo "cURL handle closed.";



// 大家自己按照文档尝试一下使用 cURL 发起 POST 请求, 到我们自己本机的 PHP 服务器上
// 目标 URL (假设这个 URL 会接收并处理 POST 数据)
$post_url = "http://localhost/202503php/php/basics/recive_01.php";

// 要发送的数据 (模拟表单字段)
//$config = include 'admin_info.php';
//file_get_contents();
$post_data = [
    'username' => 'root',
    'password' => 'root',
    'action' => 'login'
];

// 1. 初始化
$ch = curl_init();

// 2. 设置选项
curl_setopt($ch, CURLOPT_URL, $post_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// 设置为 POST 请求
curl_setopt($ch, CURLOPT_POST, true);

// 设置 POST 数据
// 方式一：直接传递关联数组，cURL 通常会使用 multipart/form-data
// curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

// 方式二：将数组转换为 URL 编码的字符串 (更像传统表单)
// 并设置 Content-Type 头
$post_fields = http_build_query($post_data);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);

// 其他选项 (超时等)
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);

// 3. 执行
echo "正在向 {$post_url} 发送 POST 请求...<br>";
$response = curl_exec($ch);

// 4. 检查错误
if ($response === false) {
    $error_no = curl_errno($ch);
    $error_msg = curl_error($ch);
    echo "<b class='text-red-600'>cURL Error ({$error_no}): {$error_msg}</b><br>";
} else {
// 5. 获取信息
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP Status Code: {$http_code}<br>";

// httpbin.org/post 会返回包含请求信息的 JSON
    echo "<h4>响应内容:</h4>";
    echo "<pre>" . htmlspecialchars($response) . "</pre>";

// 你可以尝试 json_decode() 来解析响应
// $decoded_response = json_decode($response, true);
// if ($decoded_response) { print_r($decoded_response['form'] ?? $decoded_response['data']); }
}

// 6. 关闭
curl_close($ch);
echo "cURL handle closed.";

// 那就需要一个页面来接收你的 cURL 请求, 你接收到请求之后返回一个 JSON 字符串给你的 cURL 请求, 然后解析打印出来