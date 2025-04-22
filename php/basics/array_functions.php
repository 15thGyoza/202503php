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
echo "<br>";
$array_str = explode(" ", $string2);// 拆分字符串
printRWithBr($str);

$replaceItem = ['city' => 'Melbourne', 'date' => '2022-04-08', 'weather' => '晴天'];
$cityArray = ['city' => $replaceItem['city']];// 拆分原数组，以便后续替换时带入
$dateArray = ['date' => $replaceItem['date']];// 拆分原数组，以便后续替换时带入
$weatherArray = ['weather' => $replaceItem['weather']];// 拆分原数组，以便后续替换时带入

print_r($string2);
$removed = array_splice($array_str, 7, 3, $cityArray);
printRWithBr($array_str);// 打印第一次替换结果

$removed = array_splice($array_str, 9, 3, $dateArray);
printRWithBr($array_str);// 打印第二次替换结果

$removed = array_splice($array_str, 11, 3, $weatherArray);
printRWithBr($array_str);// 打印第三次替换结果

$string2 = implode(" ", $array_str);// 合并字符串
printRWithBr($string2);// 打印最终结果

echoHr();
// 方法三
// 流程图↓↓↓

// 识别'{{' & '}}'
// 提取{{}}中的keyword对应数组中的key
// 用array_key_exists方法，str_ireplace方法替换，strlen方法移动指针
// 输出结果


//$result = [];
// for($i = 0; $i < count($array_str); $i++) {
//     if ($skip) {
//         $skip = false;
//         continue;
//     }
// }

//$colors = ["blue", "green", "blue"];
//$fixedColors = str_replace("blue", "red", $colors);
//print_r($fixedColors);

$string3 = "The next F1 race will be in {{ city }} on {{ date }} ssas {{ weather }}.";
$replaceItem = ['city' => 'Melbourne', 'date' => '2022-04-08', 'weather' => '晴天'];

function replaceString($string3, $replaceItem): array|string
{
    $i = 0; // 从位置0开始查找
    while
        (($startPos = strpos($string3, '{{', $i)) !== false) {
        $endPos = strpos($string3, '}}', $startPos);
        if ($endPos === false) break;

        $space = substr($string3, $startPos, $endPos - $startPos + 2);
        $key = trim(substr($string3, $startPos, $endPos - $startPos));

        if (array_key_exists($key, $replaceItem)) {
            $string3 = str_ireplace($space, $replaceItem[$key], $string3);
            $i = $startPos + strlen($replaceItem[$key]);
        }else {
            $i = $endPos + 2;
        }
    }
    return $string3;
}

echo replaceString($string3, $replaceItem);















echoHr();
$numbers = [1, 2, 3, 4, 5, 6];
$even = array_filter($numbers, fn($n) => $n % 2 == 0);
printRWithBr($even);

$mixed = [0, 1, false, true, "", "hello", null, []];
$notEmpty = array_filter($mixed);
printRWithBr($notEmpty);

$assoc = ['a' => 1, 'b' => 2, 'c' => 3];
$onlyA = array_filter($assoc, fn($key) => $key === 'a', ARRAY_FILTER_USE_KEY);
printRWithBr($onlyA);

echoHr();
$numbers = [1, 2, 3, 4, 5];

// 计算数组元素的和
$sum = array_reduce($numbers, fn($carry, $item) => $carry + $item, 0);
echoWithBr("Sum: " . $sum); // 输出: Sum: 15

// 将数组元素连接成字符串
$string = array_reduce($numbers, fn($carry, $item) => $carry . "-" . $item, "Numbers:");
echoWithBr("\nString: " . $string);

echoHr();
$fruits = ['a' => 'apple', 'b' => 'banana'];

// 打印每个元素
array_walk($fruits, function($value, $key) {
    echoWithBr($key . " => " . $value . "\n");
});

// 修改数组元素（注意 &）
$numbers = [1, 2, 3];
array_walk($numbers, function(&$value, $key) {
    $value *= 10;
});
printRWithBr($numbers);

echoHr();
$numbers = [3, 1, 4, 1, 5, 9];
sort($numbers);
printRWithBr($numbers);
rsort($numbers);
printRWithBr($numbers);
$scores = ['Alice' => 85, 'Bob' => 92, 'Charlie' => 78];
asort($scores);
printRWithBr($scores);
arsort($scores);
printRWithBr($scores);
$files = ['img12.png', 'img10.png', 'img2.png', 'img1.png'];
natsort($files);
printRWithBr($files);
$input = ["a", "b", "a", "c", "b", "b"];
$unique = array_unique($input);
printRWithBr($unique);

$array1 = ["a" => "green", "red", "blue", "red"];
$array2 = ["b" => "green", "yellow", "red"];

$diff = array_diff($array1, $array2);
printRWithBr($diff);

$intersect = array_intersect($array1, $array2);
print_r($intersect);

$numbers = [1, 2, 3, 4.5];
echoWithBr("Sum: " . array_sum($numbers));

$input = ["a" => 1, "b" => 2, "c" => 3];
$flipped = array_flip($input);
printRWithBr($flipped);
printRWithBr(array_flip($scores));
$numbers = [3, 1, 4, 1, 5, 9];
printRWithBr(array_reverse($numbers));