<?php

// include "../helpers.php"; // 如果失败的话, 会抛出一个 warning, 但是脚本会继续执行
// require  "../helpers.php"; // 如果失败的话, 会抛出一个 fatal error, 脚本会停止执行

require_once "../helpers.php";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// throw抛出异常
function divide($a, $b) {
    if ($b == 0) {
// 检测到错误条件（除数为零），抛出异常
        throw new InvalidArgumentException("除数不能为零！");
    }
    if (!is_numeric($a) || !is_numeric($b)) {
        throw new InvalidArgumentException("参数必须是数字！");
    }
    return $a / $b;
}

try {
    echo divide(10, 2) . "\n"; // 输出: 5
    echo divide(10, 0) . "\n"; // 这会抛出异常
    echo "这句不会执行\n";
} catch (InvalidArgumentException $e) {
    echo "计算错误: " . $e->getMessage() . "\n"; // 输出: 计算错误: 除数不能为零！
}

try {
    // 创建 PDO 连接实例
    $pdo = new PDO("mysql:host=localhost;dbname=school;charset=utf8mb4", "root", "cptbtptp1", $options);

    echo "数据库连接成功!";
} catch (PDOException $e) {
    // 如果连接失败，PDO 会抛出 PDOException 异常
//    echo "数据库连接失败: " . $e->getMessage();

    echoWithBr("服务器网络异常, 请稍后再试!");
} finally {
    // 这里是无论是否发生异常都会执行的代码
    echoWithBr("数据库连接结束");
    // exit(0);
}

// 我们可以使用 throw 语句来抛出异常
//if (!isset($_POST['token'])) {
//    throw new Exception("没有权限访问该页面", 403);
//}

// 自定义异常类
class UserNotFoundException extends Exception {
// 可以添加自定义属性或方法
    protected $userId;

    public function __construct(int $userId, string $message = "", int $code = 0, ?Throwable $previous = null) {
        $this->userId = $userId;
        // 如果没有提供 message，可以生成一个默认的
        if (empty($message)) {
            $message = "ID 为 " . $userId . " 的用户未找到。";
        }
        // 调用父类的构造函数
        parent::__construct($message, $code, $previous);
    }

    public function getUserId(): int {
        return $this->userId;
    }
}

function findUser(int $id) {
// ... 模拟查找 ...
    if ($id === 404) { // 假设 ID 404 未找到
        throw new UserNotFoundException($id); // 抛出自定义异常
    }
    return ['id' => $id, 'name' => 'Found User'];
}

try {
    $user = findUser(404);
} catch (UserNotFoundException $e) { // 只捕获 UserNotFoundException
    echo "捕获到错误: " . $e->getMessage() . " (用户 ID: " . $e->getUserId() . ")";
} catch (Exception $e) { // 捕获其他通用异常
    echo "捕获到其他错误: " . $e->getMessage();
}