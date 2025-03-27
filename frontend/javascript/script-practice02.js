for (let i = 0; i < 5; i++){
console.log("当前值为:" + i);
}

let i = 0
while (i < 5){
    console.log("当前值为:" + i);
    i++;   
}

let j = 0;
do {
    console.log("当前值为:" + j);
    j++;
}while(j < 5)

let userInfo = {
    username: "巫师学徒", age: 20, city:"Orgrimmar"
};

let phones = ["iPhone", "samsumg", "mi"];

for(let key in userInfo) {
    console.log(key + ":" + userInfo[key]);
}

for (let phone of phones) {
    console.log(phone);
}

let username = "Li"

for (let byte of username) {
    console.log(byte)
}

for (let i = 0; i <= 10; i++) {
    if(i === 3) {
        break;
    }
    console.log("当前值为:" + i);
}

for (let i = 0; i <= 10; i++) {
    if (i === 5) {
        continue;
    }
    console.log("当前值为：" + i);
}

function add(a,b) {
    return a + b;
}

let sum = add(10, 20);
console.log(sum);

let totalPrice = function (price, count) {
    return price * count;
}
console.log(totalPrice(5, 2));

let divide = (a, b) => a / b;
console.log(divide(10, 2));

function greeting(name = "巫师学徒") {
    console.log("Lok-tar," + name);
}

greeting("法师");
greeting();

function sayhi(name, age, callback) {
    console.log("你好，" + name + "，今年" + age + "岁")
    callback();
}

sayhi("王五", 25 , function() {
    console.log("这是回调函数")
})

function sumAll(...args) {
    let sum = 0;
    for (let arg of args) {
        sum += arg;
    }
    return sum;
}
console.log(sumAll(1,3,5,7,9));

function printInfo({name, age}) {
    console.log("姓名：" + name + "年龄：" + age);
}

let user = {name: "张三", age: 20};
printInfo(user);

function sayGoodbye() {
}

let goodbye = sayGoodbye();
console.log(goodbye);

function factorial(n) {
    if (n===1) return 1;
    return n * factorial(n - 1);
}

console.log(factorial(5));


function createCounter() {
    let count = 0;
    return function () {
        count++; // count = count + 1;
        return count;
    }
}

let counter = createCounter();
console.log(counter());
console.log(counter());
console.log(counter()); 


document.getElementById("btn-onclick").onclick = function () {
    alert("这是鼠标点击事件");
}

document.getElementById("btn-dblclick").ondblclick = function () {
    alert("这是鼠标双击事件");
}

// 鼠标移入事件, 当鼠标移入按钮时, 按钮的背景颜色变为 #FF0080
document.getElementById("btn-mouseover").onmouseover = function () {
    document.getElementById("btn-mouseover").style.backgroundColor = "#FF0080";
}
document.getElementById("btn-mouseover").onmouseout = function () {
    document.getElementById("btn-mouseover").style.backgroundColor = "#4C4C4C";
}

document.getElementById("username").onfocus = function () {
    document.getElementById("username").style.backgroundColor = "#E5E5E5";
}
document.getElementById("username").onblur = function () {
    document.getElementById("username").style.backgroundColor = "#ffffff";
}

document.getElementById("btn-mousemove").onmousemove = function () {
    document.getElementById("btn-mousemove").style.backgroundColor = "#FF0080";
}