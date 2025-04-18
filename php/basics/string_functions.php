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

//if (str_starts_with($url, "https://")) {
//    echo "URL uses HTTPS.<br>";
//}

$filename = "document.pdf";
if (str_ends_with($filename, ".pdf")) {
    echo "File is a PDF.<br>";
}


// str_replace
$text = "The quick brown fox jumps over the lazy dog.";
$newText1 = str_replace("quick", "PHP", $text);
echo $newText1;
echo "<br>";

$vowels = ["a", "e", "i", "o", "u"];
$noVowels = str_replace($vowels, "", $text);
echo "<br>".$noVowels;

$search = ["fox", "dog"];
$replace = ["cat", "bear"];
$newText2 = str_replace($search, $replace, $text, $count);
echo "<br>" . $newText2;
echo "<br>替换次数: " . $count;
echo "<br>";

// substr_replace
$string = "qwerasdf";
echo substr_replace($string, "XYZ", 3, 2);
echo "<br>";
$url = 'https://google.com';
echo substr_replace($url, 'https://', strpos($url, 'https://'), strlen('https://'));
echo "<br>";
$email = 'lirundian2010@gmail.com';
echo strstr($email, '@');
echo "<br>";
echo substr_replace($string, "XYZ", 3, 0);
echo "<br>";
echo substr_replace($string, "XYZ", -3, 2);
echo "<br>";

// substr
echo substr($email, strpos($email, '@') + 1);
echo "<br>";

$url = 'https://www.youtube.com/watch?v=dP4ZcqQE_Bc&ab_channel=%E7%8E%8B%E5%BF%97%E5%AE%89';
$bilibiliUrl = 'https://www.bilibili.com/video/BV1P5owYhE87/?spm_id_from=333.1007.tianma.1-1-1.click&vd_source=e762e23c8626acae82c8474422147ed4';
echo substr($url, strpos($url, '?') + 1);
echo "<br>";
echo substr($url, 0, -(strlen($url) - strrpos($url, '?')));
echo "<br>";
echo substr($bilibiliUrl, 0, -(strlen($bilibiliUrl) - strrpos($bilibiliUrl, '?')));
echo "<br>";

$code = 'heLLo,MasTer';
echo strtolower($code);
echo "<br>";
echo strtoupper($code);
echo "<br>";
echo ucwords(strtolower($code));
echo "<br>";

$fileName = 'learning_php_construct.php';
$fileName = substr($fileName, 0, -(strlen($fileName) - strpos($fileName, '.')));
$fileName = str_replace('_', ' ', $fileName);
echo ucwords($fileName);
echo "<br>";

// trim
$string = '    LRD    ';
echo strlen($string);
echo "<br>";
$trimString = trim($string);
echo strlen($trimString);
echo "<br>";
// 接收参数: 电话号码、邮箱、验证码、用户名、密码...
$str2 = "/path/to/file/";
echo trim($str2, "/");
echo "<br>";

$name = "LRD";
$age = 28;
$score = 75.8;

$outputString = sprintf("姓名: %s, 年龄: %d, 分数: %.1f%%", $name, $age, $score);
echo $outputString . '<br>';
printf("ID: %05d", 123);
echo "<br>";

// product type: 1,2,8 (ids) 可能对应的就是 categories 表的 ID = 1, ID = 2, ID = 8
//$products = [
//    [
//       'name' => 'iPhone',
//       'price' => 198,
//       'categories' => [
//           ['id' => 1, 'name' => '手机'],
//           ['id' => 1, 'name' => '智能手机'],
//       ]
//    ],
//    [
//        'name' => 'iPhone',
//        'price' => 198,
//        'categories' => [
//            'id' => 1,
//            'name' => '手机'
//        ]
//    ]
//];
$productType = '0,8,3';
$productTypeArr = explode(',', $productType);
var_dump($productTypeArr);
echo "<br>";
$keywordsArr = ["部落", "牛头人", "圣骑士"];
$keywordsStr = implode(', ', $keywordsArr);
echo $keywordsStr;
echo "<br>";

$str = "Warrior";
$chars = str_split($str);
print_r($chars);
echo "<br>";
$chunks = str_split($str, 2);
print_r($chunks);
echo "<br>";

echo '&nbsp;你好 ';
echo "<br>";
echo "<h1>这是一个 h1 标签</h1>";
echo "&lt;h1&gt;这是一个 h1 标签&lt;/h1&gt;";
echo "<br>";

echo htmlspecialchars("<script>alert('你的网站被我黑了!')</script>");

//$userInput = '<script>alert("你好啊,勇士!");</script>';
//echo $userInput;
echo "<br>";

echo strip_tags("<h1>这是一个 h1 标签</h1>");
echo "<br>";
$str = strip_tags("<?php echo 123; ?>ss");
echo $str;
echo "<br>";
$html = "<p><i>这是</i>一段<b>加粗</b>的<script>alert('oops');</script>文本。</p>";
echo strip_tags($html);
echo "\n";
echo strip_tags($html, '<p><b><i>');
$query = "搜索 词";
$url = "https://example.com/search?q=" . urlencode($query);
echo $url;

$path = "文件 名.txt";
$urlPath = "https://example.com/files/" . rawurlencode($path);
echo "\n".$urlPath;
echo "<br>";
parse_str('key1=value1&key2=value2', $result);
var_dump($result);
echo "<br>";
$params = [
    'search' => 'PHP 教程',
    'page' => 1,
    'filters' => ['free', 'beginner'] // 数组会被处理
];
$queryString = http_build_query($params);
echo $queryString;
echo "<br>";

mb_internal_encoding("UTF-8"); // 推荐设置

$str = "你好，世界！";

echo "字节长度 (strlen): " . strlen($str) . "<br>";
echo "字符长度 (mb_strlen): " . mb_strlen($str) . "<br>";

$sub = mb_substr($str, 3, 2);
echo "子串 (mb_substr): " . $sub . "<br>";

$pos = mb_strpos($str, "世界");
if ($pos !== false) {
    echo "'世界' 在索引 (mb_strpos): " . $pos . "<br>";
}