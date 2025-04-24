<?php

require_once '../helpers.php';

// PHP - Supplement D: 文件系统函数
$path1 = "/laragon/www/202503php/frontend/asset/picture/E30/BMW_E30_M3_1.jfif";
$path2 = "C:\\Users\\Li Rundian\\Pictures\\Screenshots\\屏幕截图 2025-03-01 185815.png";
$path3 = "myfile.txt"; // 只有文件名
$path4 = "D:/202504test";    // 目录

echo basename($path1);
echo "<br>";
echo basename($path1, ".png");
echo "<br>";
echo basename($path2);
echo "<br>";
echo basename($path3);
echo "<br>";
echo basename($path4);

echoHr();
$path = "/laragon/www/202503php/frontend/asset/picture/E30/BMW_E30_M3_1.jfif";
echo dirname($path);
echo "<br>";
echo dirname($path, 2);
echo "<br>";
echo dirname("/laragon/www/202503php");
echo "<br>";
echo dirname("myfile.txt");

echoHr();
$path = "/laragon/www/202503php/frontend/asset/picture/E30/BMW_E30_M3_1.jfif";
// 获取所有信息
$infoAll = pathinfo($path);
echo "<pre>All info: ";
print_r($infoAll);
echo "</pre>";

$extension = pathinfo($path, PATHINFO_EXTENSION);
echo "Extension: " . $extension;

echoWithBr(DIRECTORY_SEPARATOR); // 输出: /

echoHr();
$file = './array_functions.php';
$dir = 'D:/laragon/www/202503php/php/basics';
if (file_exists($file)) {
    echoWithBr("文件 $file 存在。");
} else {
    echoWithBr("文件 $file 不存在。");
}

if (is_dir($dir)) {
    echoWithBr("目录 $dir 存在。");
} else {
    echoWithBr("目录 $dir 不存在。");
}

if (is_file($file)) {
    echoWithBr("文件 $file 是一个文件。");
} else {
    echoWithBr("文件 $file 不是一个文件。");
}

echoWithBr(filetype($file)); // 输出: file

echoWithBr(disk_free_space($dir)); // 返回当前磁盘上可用的空间
echoWithBr(disk_total_space($dir)); // 返回当前磁盘的总空间

$childes = scandir($dir);
printRWithBr($childes); // 输出: 目录下的所有文件和目录

echoHr();

$file = 'my_document.txt';
$dir = 'my_directory';
$link = 'my_link';

if (file_exists($file)) {
    echo "'{$file}' exists.\n";
    if (is_file($file)) {
        echo "'{$file}' is a regular file.\n";
    }
    if (is_readable($file)) {
        echo "'{$file}' is readable.\n";
    }
    if (is_writable($file)) {
        echo "'{$file}' is writable.\n";
    }
} else {
    echo "'{$file}' does not exist.\n";
}
echo "<br>";

if (file_exists($dir)) {
    echo "'{$dir}' exists.\n";
    if (is_dir($dir)) {
        echo "'{$dir}' is a directory.\n";
    }
    if (is_writable($dir)) {
        echo "'{$dir}' is writable (important for creating files inside!).\n";
    }
}
echo "<br>";

unlink($link);
unlink($file);
rmdir($dir);

$filename = 'my_temp_file.txt';
file_put_contents($filename, "Hello again!");

if (file_exists($filename)) {
    $size = filesize($filename);
    $mtime = filemtime($filename);
    $type = filetype($filename);

    echo "文件: {$filename}\n";
    echo "大小: {$size} bytes\n";
    echo "类型: {$type}\n";
    echo "最后修改时间: " . date('Y-m-d H:i:s', $mtime) . "\n";

    $stats = stat($filename);
    if ($stats) {
        echo "权限 (八进制): " . decoct($stats['mode'] & 0777) . "\n";
        echo "所有者 UID: " . $stats['uid'] . "\n";
    }

    unlink($filename);
}

$baseDir = 'test_dir';
$subDir = $baseDir . DIRECTORY_SEPARATOR . 'subdir';

echoHr();

// 1. 创建目录 (递归创建)
if (!is_dir($subDir)) {
    if (mkdir($subDir, 0755, true)) {
        echo "目录 '{$subDir}' 创建成功。\n";
    } else {
        echo "创建目录 '{$subDir}' 失败！\n";
    }
}

// 2. 在目录中创建一些文件
file_put_contents($baseDir . DIRECTORY_SEPARATOR . 'file1.txt', 'content1');
file_put_contents($subDir . DIRECTORY_SEPARATOR . 'file2.log', 'content2');
file_put_contents($subDir . DIRECTORY_SEPARATOR . 'image.jpg', 'content3');

// 3. 扫描目录
echo "\n扫描目录 '{$baseDir}':\n";
$entries = scandir($baseDir);
if ($entries !== false) {
    foreach ($entries as $entry) {
        if ($entry != "." && $entry != "..") {
            $entryPath = $baseDir . DIRECTORY_SEPARATOR . $entry;
            $type = is_dir($entryPath) ? '目录' : '文件';
            echo "- {$entry} ({$type})\n";
        }
    }
}

// 4. 使用 glob 查找文件
echo "\n使用 glob 查找 .log 文件:\n";
$logFiles = glob($baseDir . DIRECTORY_SEPARATOR . '/*.log');
if ($logFiles !== false) {
    print_r($logFiles);
} else {
    echo "查找失败或没有匹配项。\n";
}

// 5. 清理 (先删除文件，再删除空目录)
unlink($subDir . DIRECTORY_SEPARATOR . 'file2.log');
unlink($subDir . DIRECTORY_SEPARATOR . 'image.jpg');
rmdir($subDir);
unlink($baseDir . DIRECTORY_SEPARATOR . 'file1.txt');
rmdir($baseDir);
echo "\n清理完成。\n";

echoHr();

$source = 'original.txt';
$copyDest = 'copy_of_original.txt';
$renameDest = 'renamed_original.txt';

// 1. 创建源文件
file_put_contents($source, 'Original content.');

// 2. 复制文件
if (copy($source, $copyDest)) {
    echo "'{$source}' 复制到 '{$copyDest}' 成功。\n";
} else {
    echo "复制失败！\n";
}

// 3. 重命名/移动文件
if (rename($copyDest, $renameDest)) {
    echo "'{$copyDest}' 重命名为 '{$renameDest}' 成功。\n";
} else {
    echo "重命名失败！\n";
}

// 4. 删除文件
if (file_exists($renameDest)) {
    unlink($renameDest);
    echo "'{$renameDest}' 已删除。\n";
}
if (file_exists($source)) {
    unlink($source);
    echo "'{$source}' 已删除。\n";
}

echoHr();

$userInfo = [
    'full_name' => 'Chen Stormstout',
    'nickname' => 'Chen',
    'age' => 27,
    'profile_picture' => 'https://example.com/images/alice.jpg',
    'email' => 'Chen.Stormstout@example.com',
    'phone_number' => '+1-234-567-8901',
    'location' => '456 Innovation Drive, Tech City, USA',
    'about_me' => 'Full-stack developer passionate about building intuitive web applications.',
    'personal_website' => 'https://chen.dev',
    'social_profiles' => [
        'github' => 'https://github.com/ChenStormstout',
        'twitter' => 'https://twitter.com/ChenStormstout',
        'linkedin' => 'https://linkedin.com/in/ChenStormstout',
    ],
    'technical_skills' => [
        'PHP',
        'JavaScript',
        'HTML',
        'CSS',
        'MySQL',
    ],
    'portfolio_projects' => [
        [
            'project_title' => 'Task Manager App',
            'project_summary' => 'A productivity app to manage daily tasks and deadlines.',
            'project_link' => 'https://projects.chen.dev/taskmanager',
        ],
        [
            'project_title' => 'Travel Blog Platform',
            'project_summary' => 'A blogging site for travel enthusiasts to share stories and photos.',
            'project_link' => 'https://projects.chen.dev/travelblog',
        ],
    ],
    'academic_background' => [
        [
            'degree' => 'Bachelor of Information Technology',
            'university' => 'Tech State University',
            'graduation_year' => 2014,
        ],
        [
            'degree' => 'Master of Computer Science',
            'university' => 'Global Institute of Technology',
            'graduation_year' => 2018,
        ],
    ],
];

echo "<hr>";

// 使用 json_encode() 将数组转换为 JSON 字符串
echoWithBr(json_encode($userInfo));
$jsonString = json_encode($userInfo, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
echoWithBr("<pre>$jsonString</pre>");

$userInfoJson = '{"full_name":"Chen Stormstout","nickname":"Chen","age":27,"profile_picture":"https:\/\/example.com\/images\/alice.jpg","email":"Chen.Stormstout@example.com","phone_number":"+1-234-567-8901","location":"456 Innovation Drive, Tech City, USA","about_me":"Full-stack developer passionate about building intuitive web applications.","personal_website":"https:\/\/chen.dev","social_profiles":{"github":"https:\/\/github.com\/ChenStormstout","twitter":"https:\/\/twitter.com\/ChenStormstout","linkedin":"https:\/\/linkedin.com\/in\/ChenStormstout"},"technical_skills":["PHP","JavaScript","HTML","CSS","MySQL"],"portfolio_projects":[{"project_title":"Task Manager App","project_summary":"A productivity app to manage daily tasks and deadlines.","project_link":"https:\/\/projects.chen.dev\/taskmanager"},{"project_title":"Travel Blog Platform","project_summary":"A blogging site for travel enthusiasts to share stories and photos.","project_link":"https:\/\/projects.chen.dev\/travelblog"}],"academic_background":[{"degree":"Bachelor of Information Technology","university":"Tech State University","graduation_year":2014},{"degree":"Master of Computer Science","university":"Global Institute of Technology","graduation_year":2018}]}';
$userInfoArray = json_decode($userInfoJson, true);

echo "<pre>";
printRWithBr($userInfoArray);
echo "</pre>";

echo "<hr>";

echoWithBr($userInfoArray['nickname']); // 输出: Chen

$indexed_array = ["apple", "banana"];
echo "编码索引数组: " . json_encode($indexed_array) . "<br>";

$empty_array = [];
echo "编码空数组 (默认): " . json_encode($empty_array) . "<br>";
echo "编码空数组 (FORCE_OBJECT): " . json_encode($empty_array, JSON_FORCE_OBJECT) . "<br>"; // 输出: {}
echo "<hr>";

$json_null = 'null';
$php_null = json_decode($json_null);
echo "解码 JSON null:<br>";
var_dump($php_null); // 输出: NULL
// 此时如果不用异常处理，需要检查 json_last_error()
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "解码 'null' 时发生错误: " . json_last_error_msg();
} else {
    echo "'null' 字符串成功解码为 PHP NULL。";
}

// 正则表达式
echoHr();
$string = "bdfc123qwer789";
$preg = '/\w{6}/';

$html = "<b>bold text</b> and <i>italic text</i>";

preg_match('#<b>(.*)</b>#', $html, $matches_greedy);
printRWithBr($matches_greedy);

echoHr();

preg_match('#<b>(.*?)</b>#', $html, $matches_lazy);
print_r($matches_lazy);

///cat|dog|fish/  # 匹配 "cat" 或 "dog" 或 "fish"
///gr(a|e)y/       # 匹配 "gray" 或 "grey" (使用了分组)

echoHr();

$email = "chen.stormstout@example.com";

$pattern = '/^([a-zA-Z0-9.-]+)@([a-zA-Z0-9.-]+)$/i';
// 使用 preg_match 进行验证和捕获
if (preg_match($pattern, $email, $matches)) {
    // 如果 preg_match 返回 1，表示匹配成功
    echo "有效的 Email 地址。\n";
    echo "完整匹配: " . htmlspecialchars($matches[0]) . "\n";
    echo "用户名部分 (捕获组 1): " . htmlspecialchars($matches[1]) . "\n";
    echo "域名部分 (捕获组 2): " . htmlspecialchars($matches[2]) . "\n";
} else {
    // 如果 preg_match 返回 0 或 false
    echo "无效的 Email 地址格式。\n";
}

echoHr();

$text = "访问我们的网站 https://www.example.com 或查看 ftp://files.example.org/data.zip";

$pattern = '^\b(https?|ftps?)://[-A-Z0-9+&@#/%?=~|!:,.;]*[-A-Z0-9+&@#/%=~|]^i'; // i 不区分大小写

// 使用 preg_match_all 查找所有匹配项
$match_count = preg_match_all($pattern, $text, $all_matches, PREG_SET_ORDER); // 使用 PREG_SET_ORDER

if ($match_count > 0) {
    echo "找到了 " . $match_count . " 个 https://www.google.com/search?q=URL:\n";
    echo "<ul>";
    foreach ($all_matches as $match) {
        $url = htmlspecialchars($match[0]);
        $protocol = htmlspecialchars($match[1]);
        echo "<li>协议: {$protocol}, https://www.google.com/search?q=URL: {$url}</li>";
    }
    echo "</ul>";
} else {
    echo "没有找到 https://www.google.com/search?q=URL。\n";
}

echoHr();

// 隐藏手机号中间四位
$phone = "用户手机号: 12345678901";
$pattern3 = '#(\d{3})\d{4}(\d{4})#';
$replacement3 = '$1****$2';
$masked_phone = preg_replace($pattern3, $replacement3, $phone);
echo "原始: {$phone}\n";
echo "隐藏后: {$masked_phone}\n";