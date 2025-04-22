<?php

require_once '../helpers.php';

echoWithBr(is_numeric("123"));
echoWithBr(is_numeric("123abc"));
echoWithBr(is_numeric("123.45"));
echoWithBr(is_numeric("abc"));
echoWithBr(is_numeric(""));
echoWithBr(is_numeric(123));

echoHr();
$data = 100;
$typeString = gettype($data);

echoWithBr("变量 $data 的类型是: {$typeString}\n");

switch ($typeString) {
    case 'integer':
        echo "这是一个整数。\n";
        break;
    case 'string':
        echo "这是一个字符串。\n";
        break;

    default:
        echo "这是一个其他类型。\n";
}
if ($typeString == 'integer') {
    echoWithBr("这是一个整数。\n");
} elseif ($typeString == 'string') {
    echo "这是一个字符串。\n";
} else {
    echoWithBr("这是一个其他类型。\n");
}

$value = "123.45";
echoWithBr("初始类型: " . gettype($value) . ", 值: ");
varDumpWithBr($value);
echoWithBr("<br>");

// 转换为整数
settype($value, "integer");
echoWithBr("转换为 int 后: " . gettype($value) . ", 值: ");
varDumpWithBr($value);
echoWithBr("<br>");

echoHr();
$value = "123.45";
varDumpWithBr(intval($value));
varDumpWithBr((int)$value);
varDumpWithBr((float)$value);

echoHr();
varDumpWithBr(empty($student));
$classes = [
    'class1' => ['student1', 'student2'],
    'class2' => ['student3', 'student4'],
];
unset($classes['class1']);
varDumpWithBr($classes);

echoHr();
$pi = 3.1415926;
echoWithBr(round($pi, 2));
echoWithBr(round($pi, 3));

echoWithBr(mt_rand(1, 100));

try {
    $password = random_int(100000, 999999) . bin2hex(random_bytes(10));
} catch (\Random\RandomException $e) {
    echo "生成随机密码失败: " . $e->getMessage();
    exit;
}
echoWithBr($password);

echoHr();
echoWithBr(time());
echoWithBr(microtime(true));
echoWithBr("请求开始时间 (秒): " . ($_SERVER['REQUEST_TIME'] ?? 'N/A') . "\n");
echoWithBr("请求开始时间 (带微秒): " . ($_SERVER['REQUEST_TIME_FLOAT'] ?? 'N/A') . "\n");
//echoWithBr(date('Y-m-d', strtotime('-1 year')));
echoWithBr(date("L", strtotime(date('Y-m-d', strtotime('-1 year')))));