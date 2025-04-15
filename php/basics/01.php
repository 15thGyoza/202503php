<?php

echo "Hello world!";
echo "<br>";
$a = "Hello world!";

echo "<br>";
$username = 'を';
var_dump($username);

echo "<br>";
echo PHP_VERSION;
echo "<br>";
echo PHP_OS;

$userName = "巫师学徒";
function getUserInfo()
{

}

class UserInfo
{

}

$city = "达拉然";
$year = 10;
echo "<br>";
echo "我在{$city}生活了{$year}年, 
在字符串中输出特殊符号的时候需要加上转义符号\\, 比如说\$a, 这样就可以输出变量{$a}的值了";

// PHP 中的数据类型
echo "<br>";
$username = "小明";
$username1 = 'LI';
$username2 = 'を';
$age = 18;
$height = 1.75;
$isStudent = true;
$userOrders = null;
//unset($isStudent);
var_dump($username);
echo "<br>";
var_dump($username1);
echo "<br>";
var_dump($username2);
echo "<br>";
var_dump($age);
echo "<br>";
var_dump($isStudent);

// 常量
const PI = 3.14;
const SITE_NAME = "PHP 开发者社区";
var_dump(SITE_NAME);

// 可变变量
$variableName = 'message';
$message = 'Hello from variable variable!';
echo $$variableName;


// 变量引用, 传值赋值和引用赋值
echo "<br>";
$var1 = "Hello";
//$var2 = $var1; // 传值赋值, $var2 是 $var1 的副本
$var3 = &$var1; // 引用赋值, $var3 是 $var1 的引用
var_dump($var3); // 打印变量类型和内容

// 定义一个关联数组
$users = [
    'user1' => 'active',
    'user2' => 'inactive',
    'user3' => 'inactive',
    'user4' => 'active',
];
// 使用引用赋值修改数组中的值
foreach ($users as &$status) {
    if ($status === 'inactive') {
        $status = 'active'; // 修改状态
    }
}
// 释放引用，避免后续操作意外修改最后一个元素
unset($status);
// 输出修改后的数组
echo "<br>";
print_r($users);

// 魔术常量
echo "<br>";
echo __FILE__; // 当前文件的完整路径
echo "<br>";
echo __LINE__; // 当前行号
echo "<br>";
echo __DIR__; // 当前目录的完整路径
echo "<br>";
class MyClass
{
    public function myMethod(): void
    {
        echo __CLASS__; // 当前类名
        echo "<br>";
        echo __METHOD__; // 当前方法名
        echo "<br>";
        echo __FUNCTION__; // 当前函数名
    }
}

$myClass = new MyClass();
$myClass->myMethod();
echo "<br>";
echo defined('PI')? 'PI is defined' : 'PI is not defined';
if (!defined('PI')) {
    define('PI', 3.14);
}

// PHP 预定于常量
echo "<br>";
echo PHP_VERSION; // PHP 版本
echo "<br>";
echo PHP_OS; // 操作系统
echo "<br>";
echo PHP_INT_MAX; // 整数的最大值
echo "<br>";
echo PHP_INT_SIZE; // 整数的字节数
echo "<br>";
echo PHP_FLOAT_MAX; // 浮点数的最大值
echo "<br>";
echo PHP_FLOAT_MIN; // 浮点数的最小值
echo "<br>";
echo PHP_EOL; // 换行符
echo "<br>";
echo TRUE; // 布尔值 true
echo "<br>";
echo FALSE; // 布尔值 false
echo "<br>";
echo NULL; // 空值 null
echo "<br>";

$a = [];
if ($a) {
    echo "a is true";
} else {
    echo "a is false";
}
echo "<br>";
$a[0] = 1;
if ($a) {
    echo "a is true";
} else {
    echo "a is false";
}

echo "<br>";
$stringA = "Hello";
echo $stringA[0];

// 数组
// 索引数组
$fruits = ["apple", "banana", "orange"];
$fruits[0] = "pear";
// 关联数组
$person = [
    "name" => "小明",
    "age" => 18,
    "city" => "东京"
];
$person["age"] = 20;
echo "<br>";
echo $fruits[0];
echo "<br>";
echo $person["age"];
echo "<br>";

// 类型强制转换
$price = "100";
var_dump((int)$price);

echo "<br>";
var_dump(is_int($price));
echo "<br>";
var_dump(is_bool($isStudent));
echo "<br>";
var_dump(is_numeric($price));
echo "<br>";
$b = null;
var_dump(isset($b));
echo "<br>";
var_dump(empty($b));
echo "<br>";
var_dump(gettype($person));
echo "<br>";

// 赋值运算符
$str = "Hello";
$str .= " World";
echo $str; //
echo "<br>";

$a = 10;
$b = 20;
var_dump($a <=> $b);