let age = 25;
let userclass = "巫师学徒";
console.log(userclass);

const PI = 3.14;
console.log(PI);

let num_a1 = 12;
let name_user = "Lirundian";
let greeting = "Lok-tar,";
console.log(greeting + userclass);

let isLoggedIn = true;

let value;
console.log(value);

let empty = null;
console.log(empty);

let person = {
    name_user:"Lirundian",
    userclass:"巫师学徒",
    isStudent:true,
};
console.log(person);

let numbers = [1,2,3,4,5,6,7,8,9,0];
console.log(numbers[9]);
// numbers[默认是从0为第一位数]

function greet(userclass) {
    return"Lok-tar," + userclass
};
console.log(greet(userclass));

console.log(typeof "巫师学徒");
console.log(typeof true);
console.log(typeof null);
console.log(typeof {});
console.log(typeof function(){});

let a1 = 10;
let b1 = 3;

console.log(a1 + b1);
console.log(a1 - b1);
console.log(a1 * b1);
console.log(a1 / b1);
console.log(a1 % b1);
console.log(a1 ^ b1);
// 在 JavaScript 中，^ 是按位异或运算符（Bitwise XOR）。
// 它的作用是 对两个数的二进制位进行异或运算：
// 相同位的数字相同（0 或 1），结果为 0
console.log(b1 ** 5);

console.log(a1 > b1);
console.log(a1 >= b1);
console.log(a1 === '10');
console.log(a1 === 10);
console.log(a1 !== b1);

let a2 = true;
let b2 = false;

console.log(a2 && b2);
console.log(a2 || b2);
console.log(!a2);

let classnum = 2;

if(classnum < 2){
    console.log("你是巫师学徒")
} else {
    console.log("需要在您的导师那学习新的技能")
}

if (classnum >= 3){
    console.log("你是大法师")   
}else if (classnum >= 2){
    console.log("你是法师")
} else {
    console.log("你是巫师学徒")
}

let isPermitted = false;
let permission = isPermitted ? "正在加载副本" : "你还不能进入这个副本";
console.log(permission);

let inputkey = 1;

switch (inputkey) {
    case 1:
        console.log("正在释放火球术")
        break;
    case 2:
        console.log("正在释放火焰冲击")
        break;
    case 3:
        console.log("正在释放炎爆术")
        break;
    default:
        console.log("已打断")
        break;    
}