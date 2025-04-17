<?php

function sayHello(): void{
    echo "你好，欢迎来到魔兽世界！";
}
echo sayHello();
echo "<br>";


function helloUser($name): void
{
    echo "愿风指引你的道路, " . $name;
}
$name = "巫师学徒";
echo helloUser($name);
echo "<br>";
echo helloUser("战士");
echo "<br>";

function addNumbers(int &$num1, int $num2): int
{
    $num1 = 1;
    return $num1 + $num2;
}
$num1 = 0;
echo addNumbers($num1, 2);
echo "<br>";

function incrementValue($number) {
    $number++;
    echo "函数内部的值: " . $number;
}
$value = 10;
incrementValue($value);
echo "函数外部的值: " . $value;
echo "<br>";

function getWeather(string $city, string $date = '2025-04-15'): ?array
{
    $weather = [
        '北京' => ['2025-04-15' => '晴', '2025-04-16' => '阴', '2025-04-17' => '雨'],
        '上海' => ['2025-04-15' => '阴', '2025-04-16' => '雨', '2025-04-17' => '晴'],
        '广州' => ['2025-04-15' => '雨', '2025-04-16' => '晴', '2025-04-17' => '阴']
    ];

    $result = [];
    if (isset($weather[$city][$date])) {
        $result['city'] = $city;
        $result['date'] = $date;
        $result['weather'] = $weather[$city][$date];
        return $result;
    }
    return null;
}

$weather = getWeather('广州', '2025-04-17');
echo $weather['date'] . ' ' . $weather['city'] . "的天气是: " . $weather['weather'] . "<br>";
echo "<br>";


// $message 是必需参数，$name 有默认值
function showMessage($message, $name = "访客") {
    echo "[" . $name . "] 说: " . $message;
}

showMessage("今天天气不错！");
echo "<br>";
showMessage("该吃饭了！", "张三");
echo "<br>";

function sumNumbers(...$numbers) {
    $total = 0;
    foreach ($numbers as $num) {
        $total += $num;
    }
    return $total;
}

echo sumNumbers(1, 2, 3);
echo "<br>";
echo sumNumbers(10, 20, 30, 40, 50);
echo "<br>";
echo sumNumbers(5);
echo "<br>";
echo sumNumbers();
echo "<br>";

function createUser($username, $email, $isActive = true, $isAdmin = false) {
    echo "创建用户: ";
    echo "  用户名: " . $username;
    echo "  邮箱: " . $email;
    echo "  激活状态: " . ($isActive ? '是' : '否');
    echo "  管理员: " . ($isAdmin ? '是' : '否');
    echo "----";
}
//$name = '巫师学徒';
//createUser(username: $name, $email: wow.com, $isActive: true, $isAdmin: true);
echo "<br>";

function multiply($a, $b) {
    $result = $a * $b;
    return $result;
}
$product = multiply(6, 7);
echo "6 * 7 = " . $product;
echo "<br>";

function getUserInfo($id) {
    $name = "巫师学徒";
    $age = 25;
    return ['name' => $name, 'age' => $age];
}

$userInfo = getUserInfo(1);
echo "用户名: " . $userInfo['name'] . ", 年龄: " . $userInfo['age'];
echo "<br>";


function calculateSum(float $a, float $b) : float {
    return $a + $b;
}
echo "<br>";
function processData(array $data) : void { // void 表示函数不应该 return 任何值
    // 处理数据...
    // return 123; // 错误！void 函数不能返回值
    // return; // 可以，相当于 return null;
}

// 变量的作用域
$userAge = 25; // 全局变量
function getUserinfo1($userAge): void
{
    echo $userAge . '<br>';
    $username = '巫师学徒';
}
getUserinfo1($userAge);

// 静态变量
function staticVariableExample(): void
{
    static $count = 0;
    $count++;
    echo "函数被调用了 $count 次<br>";
}

staticVariableExample(); // 输出: 函数被调用了 1 次
staticVariableExample(); // 输出: 函数被调用了 2 次
staticVariableExample(); // 输出: 函数被调用了 3 次

// 可变函数
function helloWorld(): void
{
    echo "Hello, World!<br>";
}

$helloWorld = 'helloWorld';
$helloWorld();

// 匿名函数
$greet = function ($name) {
    echo "你好, " . $name . "！<br>";
};
$greet('巫师学徒');

// 使用 use 捕获外部变量
$messagePrefix = "重要消息: ";
$sendMessage = function ($text) use ($messagePrefix) {
    echo $messagePrefix . $text . "<br>";
};
$sendMessage("会议推迟了");

$count = 0;
$increment = function () use (&$count) {
    $count++;
};
$increment();
$increment();
echo "Count is now: " . $count . '<br>';

// 作为回调函数传递给 array_map
$numbers = [1, 2, 3, 4];
$squares = array_map(function ($iem) {
    return $iem * $iem;
}, $numbers);
print_r($squares);
echo "<br>";

// 箭头函数
$numbers = [1, 2, 3, 4];
$factor = 3;

// 箭头函数自动捕获 $factor
$multiplied = array_map(fn($item) => $item * $factor, $numbers);

print_r($multiplied);
echo "<br>";

// 箭头函数自动捕获 $factor
$numbers = [1, 2, 3, 4];
$factor = 3;
$multiplied = array_map(fn($n) => $n * $factor, $numbers);

print_r($multiplied);
echo "<br>";

// 递归函数


// 斐波拉契数列
function fib(int $n): int {
    if ($n === 0) return 0;
    if ($n === 1) return 1;
        return fib($n - 1) + fib($n - 2);
}
for ($n = 1; $n <= 10; $n++) {
    echo fib($n);
}