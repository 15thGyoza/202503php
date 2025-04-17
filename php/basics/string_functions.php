<?php

// String Functions in PHP
// strlen() - 获取字符串长度
echo strlen("Hello World!");
echo "<br>";

echo "「你好」所占的字节数是: " . strlen("你好"); // 输出: 6
echo "<br>";

// mb_strlen() - 获取多字节字符串的长度
echo mb_strlen("你好");
echo "<br>";
echo mb_strlen("おはようございます！");
echo "<br>";

$string = "Hello world, hello PHP!";
$find = "hello";

$pos1 = strpos($string, $find);
if ($pos1 === false) {
    echo "'$find' not found (case-sensitive).\n";
} else {
    echo "'$find' found at index: $pos1\n";
}
echo "<br>";

$findUpper = "Hello";
$pos2 = strpos($string, $findUpper);
if ($pos2 !== false) {
    echo "'$findUpper' found at index: $pos2\n";
}
echo "<br>";

// 错误用法示例
if (strpos($string, $findUpper) == false) {
    echo "错误判断：'$findUpper' not found.\n";
}
echo "<br>";

// 从第 7 个字符开始搜索 "hello"
$pos3 = strpos($string, $find, 7);
if ($pos3 !== false) {
    echo "从索引 7 开始，'$find' found at index: $pos3\n";
}
echo "<br>";

$lastPos = strripos($string, $find);
if ($lastPos !== false) {
    echo "Last '$find' found at index (case-insensitive): $lastPos\n";
}
echo "<br>";

$email = "user@example.com";
$domain = strstr($email, '@');
echo $domain . "<br>";

$string = "Hello world, hello PHP!";
$find = "hello";
$lastPos = strripos($string, $find);
if ($lastPos !== false) {
    echo "Last '$find' found at index (case-insensitive): $lastPos\n";
}
echo "<br>";

if (str_starts_with($url, "https://")) {
    echo "URL uses HTTPS.<br>";
}

$filename = "document.pdf";
if (str_ends_with($filename, ".pdf")) {
    echo "File is a PDF.<br>";
}
