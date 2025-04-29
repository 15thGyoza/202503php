<?php

require_once '../helpers.php';

interface ProductResource
{
    // 获取产品详情
    public function show(int $id): mixed;

    // 获取产品列表
    public function index(): mixed;

    // 创建产品的表单页面
    public function create(): mixed;

    // 新增产品到数据库
    public function store(array $product): mixed;

    // 编辑产品的表单页面
    public function edit(int $id): mixed;

    // 更新产品到数据库
    public function update(int $id, array $product): mixed;

    // 删除产品
    public function destroy(int $id): mixed;
}

// 抽象类不能直接实例化
// $productResource = new ProductResource();

class Product implements ProductResource
{
    public function show(int $id): string
    {
        return "Showing product with ID: $id<br>";
    }

    public function index(): string
    {
        return "Listing all products<br>";
    }

    public function create(): string
    {
        return "Creating a new product<br>";
    }

    public function store(array $product): string
    {
        return "Storing product: " . json_encode($product) . "<br>";
    }

    public function edit(int $id): string
    {
        return "Editing product with ID: $id<br>";
    }

    public function update(int $id, array $product): string
    {
        return "Updating product with ID: $id<br>";
    }

    public function destroy(int $id): string
    {
        return "Deleting product with ID: $id<br>";
    }

    public function search(string $keyword): string
    {
        return "Searching for product with keyword: $keyword<br>";
    }
}

$product = new Product("Sample Product");
$productInfo = $product->show(1);
echoWithBr($productInfo);

// 单例模式
class Database
{
    public static string $host = "localhost";

    public string $dbName = "school";

    public static string $username;

    public static string $password;

    private static ?object $instance = null;

    private function __construct($username, $password)
    {
        self::$username = $username;
        self::$password = $password;
    }

    public static function connect($username, $password): object{
        return self::$instance = new self($username, $password);
    }

    public static function query(string $sql): string{
        return "Executing query: $sql<br>";
    }

    private function __clone(){
        throw new Exception("Cannot clone a singleton class");
    }
}

$connection = Database::connect('root', 'password');
var_dump($connection);
echoWithBr(Database::$host);

// $database = new Database('root', 'password');
// $databaseClone = clone $database;

echoHr();

// 定义一个可记录日志的接口
interface Loggable {
// 定义一个 log 方法签名，所有实现者都必须有这个方法
    public function log(string $message): void;
}

// 定义另一个接口，表示可以被序列化为字符串
interface StringSerializable {
    public function __toString(): string; // 使用了魔术方法签名
}

// FileLogger 类实现了 Loggable 接口
class FileLogger implements Loggable {
    private $logFile;

    public function __construct(string $filename) {
        $this->logFile = $filename;
        // 实际应用中需要处理文件打开和权限
    }

// 必须实现接口中定义的 log 方法
    public function log(string $message): void {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($this->logFile, "[{$timestamp}] " . $message . PHP_EOL, FILE_APPEND);
        echo "消息已记录到文件 {$this->logFile}\n";
    }
}

// DatabaseLogger 类也实现了 Loggable 接口
class DatabaseLogger implements Loggable {
    private $pdo; // 假设有 PDO 连接

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

// 实现 log 方法，将日志写入数据库
    public function log(string $message): void {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO logs (message, created_at) VALUES (:msg, NOW())");
            $stmt->execute([':msg' => $message]);
            echo "消息已记录到数据库\n";
        } catch (PDOException $e) {
            echo "数据库日志记录失败: " . $e->getMessage() . "\n";
        }
    }
}

// User 类同时实现了 Loggable 和 StringSerializable 接口
class User implements Loggable, StringSerializable {
    public string $name;
    private Loggable $logger; // 类型提示为接口，可以是任何实现 Loggable 的对象

    public function __construct(string $name, Loggable $logger) { // 依赖注入 Logger
        $this->name = $name;
        $this->logger = $logger;
        $this->log("User '{$this->name}' created.");
    }

// 实现 Loggable 接口的 log 方法 (委托给内部 logger)
    public function log(string $message): void {
        $this->logger->log($message);
    }

// 实现 StringSerializable 接口的 __toString 方法
    public function __toString(): string {
        return "User(name={$this->name})";
    }
}

// --- 使用 ---
// $pdo = new PDO(...); // 假设已连接数据库
// $dbLogger = new DatabaseLogger($pdo);
$fileLogger = new FileLogger('app.log');

// 创建 User 对象，可以传入 FileLogger 或 DatabaseLogger
$user1 = new User('Alice', $fileLogger); // 使用文件日志
// $user2 = new User('Bob', $dbLogger); // 使用数据库日志

echo $user1; // 调用 $user1 的 __toString() 方法，输出: User(name=Alice)

echoHr();

class Counter {
    public static int $count = 0;

    public static function increment(): void {
        self::$count++; // 在静态方法内部访问静态属性
    }

    public function currentCount(): int {
        return self::$count; // 在非静态方法内部访问静态属性
    }

    public static function getAndIncrement(): int {
        self::increment(); // 在静态方法内部调用其他静态方法
        return self::$count;
    }
}

class SimpleBox {
    public $value;
    public function __construct($value) { $this->value = $value; }
}

$box1 = new SimpleBox(10);
$box2 = new SimpleBox(10);
$box3 = new SimpleBox(20);
$box4 = $box1; // $box4 指向 $box1 同一个对象

varDumpWithBr($box1 == $box2);  // 输出: bool(true)  (类相同，属性值相同)
varDumpWithBr($box1 === $box2); // 输出: bool(false) (不是同一个实例)

varDumpWithBr($box1 == $box3);  // 输出: bool(false) (属性值不同)
varDumpWithBr($box1 === $box3); // 输出: bool(false)

varDumpWithBr($box1 == $box4);  // 输出: bool(true)  (指向同一个对象，当然相等)
varDumpWithBr($box1 === $box4); // 输出: bool(true)  (指向同一个实例)

echoHr();

class Detail { public $info = "original"; }
class Container {
    public $scalar = 1;
    public $object; // 包含一个对象属性
    public function __construct() { $this->object = new Detail(); }
}

$obj1 = new Container();
$obj2 = clone $obj1; // 浅拷贝

// 修改标量属性
$obj2->scalar = 2;
echoWithBr("Obj1 scalar: " . $obj1->scalar . "\n"); // 输出: Obj1 scalar: 1 (未受影响)
echoWithBr("Obj2 scalar: " . $obj2->scalar . "\n"); // 输出: Obj2 scalar: 2

// 修改对象属性 (!!!)
$obj2->object->info = "modified by clone";
echoWithBr("Obj1 object info: " . $obj1->object->info . "\n"); // 输出: Obj1 object info: modified by clone (受到影响!)
echoWithBr("Obj2 object info: " . $obj2->object->info . "\n"); // 输出: Obj2 object info: modified by clone

echoHr();

// 定义一个用于分享功能的 Trait
trait Shareable {
    // 公共方法，用于执行分享
    public function share(string $name): string
    {
        return "Sharing this{$name}<br>";
    }

    // 受保护方法，供 Trait 内部或使用 Trait 的类调用
    protected function log(string $message): string
    {
        return "logging message: $message<br>";
    }

    // Trait 也可以定义抽象方法，强制使用它的类去实现
    abstract protected function getShareTitle(): string;
}

class Controller
{
    // ... 基础类!!!

    public function responseJson(array $data, int $status = 200, string $message = 'success'): string
    {
        return json_encode([
            'status' => 200,
            'message' => 'success',
            'data' => $data
        ]);
    }
}

class Post extends Controller
{
    use Shareable;

    public function getShareTitle(): string
    {
        return "Sharing a post<br>";
    }

    public function getShare(): string
    {
        return $this->share('あなただけを見つめてる');
    }

// 获取 Post 详情
    public function show(): string
    {
        $post = [
            'id' => 1,
            'title' => 'Hello World',
            'content' => 'This is a sample post'
        ];

        return $this->responseJson($post);
    }
}

// 实例化一个Post类
$post = new Post();
echoWithBr($post->getShare());
echoWithBr($post->show());

echoHr();

trait A {
    public function commonMethod() { echo "Method from A\n"; }
}
trait B {
    public function commonMethod() { echo "Method from B\n"; }
}

class MyClass {
    use A, B {
        // 指定当调用 commonMethod 时，使用 Trait A 的版本，忽略 Trait B 的
        A::commonMethod insteadof B;
    }
}
$obj = new MyClass();
$obj->commonMethod(); // 输出: Method from A
echo "<br>";

trait C {
    public function method1() { echo "C::method1\n"; }
    protected function method2() { echo "C::method2 (protected)\n"; }
}
trait D {
    public function method1() { echo "D::method1\n"; }
}

class YourClass {
    use C, D {
        // 解决 method1 冲突：选择 C 的，并把 D 的重命名
        C::method1 insteadof D;
        D::method1 as dMethod1; // 将 D 的 method1 重命名为 dMethod1

        // 修改 method2 的可见性为 public
        C::method2 as public;
        // 也可以重命名并修改可见性
        // C::method2 as public renamedMethod2;
    }
}

$obj = new YourClass();
$obj->method1(); // 输出: C::method1
echo "<br>";
$obj->dMethod1(); // 输出: D::method1
echo "<br>";
$obj->method2(); // 输出: C::method2 (protected) (现在可以从外部调用了)
// $obj->renamedMethod2(); // 如果使用了重命名
echo "<br>";

echoHr();

class UseMagic
{
    public string $name = "UseMagic";

    public function __construct()
    {
        echo "Constructor called<br>";
    }

    // 当 PHP 试图访问一个不存在的方法时， 会自动调用 __call() 方法

    public function __call(string $name, mixed $arguments)
    {
        echoWithBr("你正在尝试访问一个不存在的方法: $name 这时 __call 会被自动调用, 当前被自动调用的方法名是:" . __FUNCTION__ . "<br>");
        echo "Method $name does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    public static function __callStatic($name, $arguments)
    {
        echo "Static method $name does not exist. Arguments: " . implode(", ", $arguments) . "<br>";
    }

    // 当读取不可访问属性时调用，$name 是属性名。必须有返回值。
    public function __get($name)
    {
        echo "Getting property '$name'<br>";
        return $this->$name;
    }

    // $name 是属性名，$value 是要赋的值。
    public function __set($name, $value)
    {
        echo "Setting property '$name' to '$value'<br>";
        $this->name = $value;
    }

    // 当对一个**不可访问或不存在**的属性调用 isset() 或 empty() 时被调用。
    public function __isset($name)
    {
        echo "Checking if property '$name' is set<br>";
        return isset($this->$name);
    }

    // 当对一个**不可访问或不存在**的属性调用 unset() 时被调用。
    public function __unset($name)
    {
        echo "Unsetting property '$name'<br>";
        unset($this->$name);
    }
}

echoHr();
$testMagic = new UseMagic();
$testMagic->nonExistentMethod("arg1", "arg2");
$testMagic->nonExistentProp = "あなただけを見つめてる!";
unset($testMagic->nonExistentProp);