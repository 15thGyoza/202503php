<?php

require_once '../helpers.php';

class User
{
    public string $name = "Unknown";
    public int $age = 0;
    public string $race = "Unknown";
    public string $raceClass = "Unknown";

    protected string $isCreated = "Yes";

    private ?string $idNumber = '000001';

    public function __construct(string $name, int $age, string $race, string $raceClass)
    {
        $this->name = $name;
        $this->age = $age;
        $this->race = "Unknown";
        $this->raceClass = "Unknown";
    }

    public function login(): void
    {
        $name = $this->name ?? "user";
        echo "$name 登录中<br>";
    }

    public function setUserIDNumber($idNumber): void
    {
        $this->idNumber = $idNumber;
    }

    public function getUserIDNumber(): ?string
    {
        return $this->idNumber;
    }
}

class Car
{
    public static string $runningMethod = "手动后驱";

    public string $maker = "Unknown";
    public string $model = "Unknown";

    public $speed = 0;

    public function __construct(string $maker, string $model)
    {
        echo "Car is purchased<br>";
        echo "Car " . $maker . " " . $model . " is purchased！\n";
        // 使用 $this 将传入的参数值赋给对象的属性
        $this->maker = $maker;
        $this->model = $model;
    }

    // ... 其他方法 (accelerate, brake, getInfo) ...
    public function getInfo() {
        return $this->maker . " " . $this->model;
    }
    public function accelerate($amount)
    { /* ... */ echo $this->getInfo() . " 加速 " . $amount . "\n"; $this->speed+=$amount;}
    public function brake($amount)
    { /* ... */ echo $this->getInfo() . " 减速 " . $amount . "\n"; $this->speed-=$amount;
        if($this->speed<0) $this->speed = 0;}
}

class player1 extends user
{
    public ?string $hometown = null;

    public static string $species = "Char1";

    public function __construct(string $name, int $age, string $race, string $raceClass, string $hometown =null)
    {
        parent::__construct($name, $age, $race, $raceClass);

        $this->hometown = $hometown;
    }

    public function spell(): void
    {
        echo "player1 is spelling<br>";
    }

    public function speak(): void
    {
        echo "player1 speaks<br>";
    }

    public function getCharHostPrivateProp(): ?string
    {
        return $this->getUserIDNumber();
    }

    public function showClassSelf(): static
    {
        return $this;
    }

    public static function getSelfStaticProp(): string
    {
        return self::$species;
    }

}

$playerLi = new player1("Li", 22,  'Orc', 'Rouge');
$playerLi->spell();
echo $playerLi->name . "<br>";
echoWithBr("User`s idNumber: " . $playerLi->getCharHostPrivateProp() . "<br>");

$playerLi->setUserIDNumber("003-Li");
echoWithBr("User`s idNumber: " . $playerLi->getCharHostPrivateProp() . "<br>");

varDumpWithBr($playerLi->showClassSelf());

echoWithBr("这是 playerLi 的角色1: " . $playerLi::$species);

echoWithBr("这是 playerLi 的角色1: " . $playerLi::getSelfStaticProp());

echoHr();

$player2 = new User("Wang", 26,  'Gnome', 'warlock');
$player3 = new User("Chen", 25,  'undead', 'mage');
$player2->login();
$player3->login();
echoWithBr("这是被修改之前的类的属性: name = " . $player2->name);
$player2->name = "巫师学徒";
echoWithBr("这里是被修改之后的类的属性: name = " . $player3->name);

echoHr();

varDumpWithBr(gettype($player2));
varDumpWithBr($player2);

echoHr();

$Car1 = new car("BMW", "E30 M3");
$Car2 = new car("Honda", "S2000 ap2");

echoHr();

echoWithBr($Car1->getInfo());
echoWithBr("我们可以通过在3降2的时候弹离合，来实现" . Car::$runningMethod ."车型的起飘。尽情驯服这头“疯牛”吧！");


