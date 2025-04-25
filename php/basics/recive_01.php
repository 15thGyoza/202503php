<?php
// 接收 POST 数据
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取原始 POST 数据（如果是 JSON）
    $rawData = file_get_contents("php://input");

    // 尝试解析 JSON 数据
    $jsonData = json_decode($rawData, true);

    // 获取表单 POST 数据（如 application/x-www-form-urlencoded 或 multipart/form-data）
    $formData = $_POST;

    // 输出数据用于调试
    header('Content-Type: application/json');

    echo json_encode([
        'message' => 'POST 数据接收成功！',
        'json_raw_data' => $rawData,
        'parsed_json' => $jsonData,
        'form_data' => $formData,
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
} else {
    // 如果不是 POST 请求
    http_response_code(405); // 方法不被允许
    echo "请使用 POST 请求访问此接口。";
}
