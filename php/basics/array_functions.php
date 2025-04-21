<?php

require_once '../helpers.php';

$userInfo = array();
$userInfo = array(1,2,3);
$userInfo = array(
    'username' => '巫师学徒',
    'age' => 28
);

$userInfo = [
    'username' => '巫师学徒',
    'age' => 28
];

varDumpWithBr($userInfo);
$emptyArr = [];
varDumpWithBr($emptyArr);

$fruits = ["apple", "banana", "dragonfruit"];
echo count($fruits) . "<br>";

$nested = [1, 2, [3, 4], 5];
echo count($nested) . "<br>";
echo count($nested, COUNT_RECURSIVE) . "<br>";

$arr = [];
$str = "hello";
varDumpWithBr(is_array($arr));
varDumpWithBr(is_array($str));

$orders = [
    [
        "id" => 1,
        'amount' => 300,
        'product_name' => 'iphone',
        'status' => 1,
    ],
    [
        "id" => 1,
        'amount' => 300,
        'product_name' => 'iphone',
        'status' => 2,
    ],
    '',
];

foreach ($orders as $order) {
    if(is_array($order) && array_key_exists('amount', $order)) {
        if ($order['status'] === 1) $order['status'] = '已支付';
        if ($order['status'] === 2) $order['status'] = '已发货';
    }
}
varDumpWithBr($orders);

$stack = ["a", "b"];
$count = array_push($stack,"c", "d");
printRWithBr($stack);

echoWithBr($count);

$stack[] = "e";
printRWithBr($stack);

$stack = ["a", "b", "c"];
foreach ($stack as $item) {
    $last = array_pop($stack);
    echo "Popped: " . $last; //
    echo "<br>";
}
printRWithBr($stack);

$queue = ["b", "c"];
$count = array_unshift($queue, "a", "x");
printRWithBr($queue);
echoWithBr($count);

$queue = ["a", "b", "c"];
$first = array_shift($queue);
echo "Shifted: " . $first . "<br>";
printRWithBr($queue);

$buyXiaomiQueue = [];
$user1 = '张三';
$user2 = '李四';
$user3 = '王五';
array_unshift($buyXiaomiQueue, $user2);
// ...
array_unshift($buyXiaomiQueue, $user1);
// ...
array_unshift($buyXiaomiQueue, $user3);
varDumpWithBr($buyXiaomiQueue);

$userOrder1 = array_pop($buyXiaomiQueue);
echoWithBr($userOrder1);
$userOrder2 = array_pop($buyXiaomiQueue);
echoWithBr($userOrder2);
varDumpWithBr($buyXiaomiQueue);

$userOrder1 = array_pop($buyXiaomiQueue);
echo $userOrder1 . "<br>";
$userOrder2 = array_pop($buyXiaomiQueue);
echo $userOrder2 . "<br>";
varDumpWithBr($buyXiaomiQueue);

$arr = [0 => "apple", 1 => "banana", 2 => "cherry"];
unset($arr[1]);
printRWithBr($arr);

$reindexed = array_values($arr);
printRWithBr($reindexed);

echo $fruits[0] . "<br>";
echo $userInfo['username'] . "<br>";
varDumpWithBr(array_key_exists('username', $userInfo));
varDumpWithBr(array_key_exists('email', $userInfo));

$user = ['name' => 'Bob', 'age' => 25, 'city' => 'London', 'status' => 'active'];
$keys = array_keys($user);
printRWithBr($keys);

$values = array_values($user);
printRWithBr($values);

$ages = ['Alice' => 30, 'Bob' => 25, 'Charlie' => 30];
$keysOf30 = array_keys($ages, 30);
printRWithBr($keysOf30);

$os = ['Mac', 'Windows', 'Linux', 0];

varDumpWithBr(in_array('Linux', $os));
varDumpWithBr(in_array('linux', $os));
varDumpWithBr(in_array(0, $os));
varDumpWithBr(in_array('0', $os));
varDumpWithBr(in_array('0', $os, true));

$roleRelationPermissions = [
    1 => ['create', 'update', 'view'],
    2 => ['create', 'update', 'view', 'delete'],
];
$userCanOptionsArticleRoles = [1, 2];
// $authorPermissions = ['create', 'update', 'view'];
$userRole = 1;
$can = in_array($userRole, $userCanOptionsArticleRoles);
varDumpWithBr($can);

$key1 = array_search('Windows', $os);
varDumpWithBr($key1);

$arr1 = ['color' => 'red', 0 => 'a', 1 => 'b'];
$arr2 = ['color' => 'green', 'shape' => 'circle', 1 => 'c', 2 => 'd'];

$merged = array_merge($arr1, $arr2);
printRWithBr($merged);

$base = ['color' => 'red', 'shape' => 'square', 0 => 10, 1 => 20];
$replacements = ['color' => 'blue', 1 => 25, 'border' => 'dotted'];
$replaced = array_replace($base, $replacements);
printRWithBr($replaced);

$input = ['a', 'b', 'c', 'd', 'e'];
$slice1 = array_slice($input, 2);
$slice2 = array_slice($input, 2, 2);
$slice3 = array_slice($input, 1, -1);
$slice4 = array_slice($input, -2, 1);
$assoc = ['x' => 10, 'y' => 20, 'z' => 30];
$slice5 = array_slice($assoc, 1, null, true);
printRWithBr($slice1);
printRWithBr($slice2);
printRWithBr($slice3);
printRWithBr($slice4);
printRWithBr($slice5);

echoHr();
$input = ["red", "green", "blue", "yellow"];
$removed1 = array_splice($input, 2, 2);
printRWithBr($input);
printRWithBr($removed1);

$input = ["red", "green", "blue", "yellow"];
$removed2 = array_splice($input, 1, 1, ["orange", "purple"]);
printRWithBr($input);
printRWithBr($removed2);

echoHr();
function square($n): float|int
{
    return $n * $n;
}

$numbers = [1, 2, 3, 4];
$squares = array_map('square', $numbers);
printRWithBr($squares);

$lower = ['a', 'b', 'c'];
$upper = array_map('strtoupper', $lower);
printRWithBr($upper);

$nums1 = [1, 2, 3];
$nums2 = [10, 20, 30];
$sums = array_map(fn($n1, $n2) => $n1 + $n2, $nums1, $nums2);
printRWithBr($sums);

$users = [
    ['id' => 1, 'username' => '张三', 'is_admin' => 1, 'register_from' => 1],
    ['id' => 1, 'username' => '张三', 'is_admin' => 0, 'register_from' => 2]
];
$usersData = array_map(function ($user) {
    $user['is_admin'] = $user['is_admin'] ? '管理员' : '用户';
    if ($user['register_from'] === 1) $user['register_from'] = 'Google';
    if ($user['register_from'] === 2) $user['register_from'] = 'Apple';
    return $user;
}, $users);
echoWithBr(json_encode($usersData));

# 7.6 迭代与函数式处理
// 需要渲染的字符串 The next F1 race will be in {{ city }} on {{ date }}.
// 给定的变量值 ['city' => 'Melbourne', 'date' => '2022-04-08']
// 执行结果 The next F1 race will be in Melbourne on 2022-04-08.
///
// ['city' => 'Melbourne', 'date' => '2022-04-08', 'weather' => '晴天']
// The next F1 race will be in {{ city }} on {{ date }} ssas {{ weather }}.

// 方法一：直接带入变量
$city = 'Melbourne';
$date = '2022-04-02';
$weather = '晴天';

$string = function($city, $date, $weather) {
    echo "The next F1 race will be in" . "&nbsp" . $city . "&nbsp" . "on" . "&nbsp".  $date . "&nbsp". "ssas" . "&nbsp" . $weather . ".";
};

$string($city, $date, $weather);
echo "<br>";

// 方法二：拆分，替换，合并
$string2 = "The next F1 race will be in {{ city }} on {{ date }} ssas {{ weather }}.";
$str = explode(" ", $string2);
printRWithBr($str);

$replaceItem = ['city' => 'Melbourne', 'date' => '2022-04-08', 'weather' => '晴天'];
$cityArray = ['city' => $replaceItem['city']];
$dateArray = ['date' => $replaceItem['date']];
$weatherArray = ['weather' => $replaceItem['weather']];

$removed = array_splice($str, 7, 3, $cityArray);
printRWithBr($str);

$removed = array_splice($str, 9, 3, $dateArray);
printRWithBr($str);

$removed = array_splice($str, 11, 3, $weatherArray);
printRWithBr($str);

$string2 = implode(" ", $str);
printRWithBr($string2);