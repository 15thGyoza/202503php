<?php
$arr1 = ['a' => 1, 'b' => 2];
$arr2 = ['b' => 20, 'c' => 3];
$union = $arr1 + $arr2;
var_dump($union);

$arr3 = ['a' => 1, 'b' => '2'];
$arr4 = ['b' => 2, 'a' => 1];

var_dump($arr1 == $arr3);
var_dump($arr1 === $arr3);
var_dump($arr1 == $arr4);
var_dump($arr1 === $arr4);

echo "<br>";
var_dump(array_merge($arr1, $arr2));

$name = $_GET['username'] ?? '默认用户';
echo $name;
$preferred_name = $user_nickname ?? $user_realname ?? '访客';

$age = 20;
$status = ($age >= 18) ? '成年' : '未成年';
echo "<br>";
echo $status;

$user_class ??= 'new';
echo "<br>";
echo $user_class;

$output = `ls -la`; // 执行 ls -la 命令
echo "<pre>$output</pre>"; // 输出命令结果
$who = `whoami`; // 获取当前用户名

$result = 2 + 3 * 4; // 14 (乘法优先)
$result_grouped = (2 + 3) * 4; // 20 (括号优先)

$a = 5; $b = 10; $c = 15;
$check = $a < $b && $b < $c; // true (逻辑运算符优先级低于比较运算符)
$check = ($a < $b) && ($b < $c); // 加括号更清晰

$x = $y = $z = 10; // 赋值运算符是右结合，等同于 $x = ($y = ($z = 10));

// 条件语句
$age = 25;
echo "<br>";
if ($age >= 20) {
    echo "成年";
}
echo "<br>";

$is_logged_in = true;
if ($is_logged_in) {
    echo "您已登录。";
}

$username = "巫师学徒";
if ($username) {
    echo "用户已存在。";
}
echo "<br>";


$score = 75;

if ($score >= 60) {
    echo "成绩及格！";
} else {
    echo "成绩不及格。";
}

if ($score >= 90) {
    echo "优秀 (A)";
} elseif ($score >= 80) {
    echo "良好 (B)";
} elseif ($score >= 70) {
    echo "中等 (C)";
} elseif ($score >= 60) {
    echo "及格 (D)";
} else {
    echo "不及格 (F)";
}
echo "<br>";

// switch 语句
$weekday = '1';

switch ($weekday) {
    case '1':
        echo "周一";
        break;

    case '2':
        echo "周二";
        break;

    case '3':
        echo "周三";
        break;

    case '4':
        echo "周四";
        break;

    default:
        echo "未输入";
}
echo "<br>";

// for 循环
for ($i = 0; $i <5; $i++) {
    $h = $i+1;
    echo "第 $h 次循环";
}
echo "<br>";

for ($j = 10; $j > 0; $j--) {
    echo $j . "... ";
}
echo "发射！";
echo "<br>";

// while 循环
$i = 0;
while ($i < 5) {
    echo "当前是： " . $i;
    echo "<br>";
    $i++;
}

$try = 0;
$success = false;

do {
    $try++;
    echo "尝试第" . $try . "次连接...";
    if ($try >= 5) {
        if (rand(0,1)){
            $success = true;
            echo "连接成功！";
        }elseif ($try >= 3){
            echo "尝试次数过多，放弃。";
            break;
        }
    }
} while (!$success);

echo "总共尝试了 " .$try . " 次。";
echo "<br>";

// foreach 循环
$fruits = ['apple', 'banana', 'orange'];
foreach ($fruits as $fruit) {
    echo "水果: " . $fruit;
    echo "<br>";
}

foreach ($fruits as $index => $fruit) {
    echo "索引: " . $index . ", 水果: " . $fruit;
    echo "<br>";
}

$user = [
    'name' => '巫师学徒',
    'age' => 25,
    'city' => '达拉然'
];
echo "用户信息: ";
foreach ($user as $key => $value) {
    echo $key . ": " . $value;
}
echo "<br>";

$numbers = [1, 2, 3];
foreach ($numbers as &$num) {
    $num = $num * 2;
}
unset($num);
var_dump($numbers);
echo "<br>";

$orders = [
    ['productName' => 'apple', 'price' => 20, 'userId' => 1],
    ['productName' => 'banana', 'price' => 30, 'userId' => 2],
    ['productName' => 'orange', 'price' => 18, 'userId' => 3]
];
foreach ($orders as $order) {
    echo "商品名称: " . $order['productName'];
    echo "<br>";
    echo "价格: " . $order['price'];
    echo "<br>";
    echo "用户ID: " . $order['userId'];
    echo "<br>";
}
echo "<br>";

for ($i = 0; $i < 10; $i++) {
    if ($i == 5) {
        echo "找到 5 了，停止循环！";
        break;
    }
    echo "当前数字: " . $i;
}
echo "循环结束。";
echo "<br>";

for ($i = 0; $i < 5; $i++) {
    if ($i == 2) {
        echo "(跳过数字 2)";
        continue;
    }
    echo "处理数字: " . $i;
}
echo "<br>";

$users = [
    ['name' => '巫师学徒', 'age' => 18, 'isMaster' => 0],
    ['name' => '法师', 'age' => 30, 'isMaster' => 0],
    ['name' => '大法师', 'age' => 70, 'isMaster' => 1]
];
foreach ($users as $user) {
    if (!$user['isMaster']) {
        continue;
    }
    echo "欢迎回家，Master";
}