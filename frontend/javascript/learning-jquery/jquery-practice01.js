// 学习 jQuery

// document.getElementById('title').style.display = 'none';
$('#title').hide(); // 隐藏元素

// ID 选择器
// document.getElementById('title').style.background-color = '#B2B2B2';
$("#header").css("background-color", "#B2B2B2"); // 设置元素的样式

// 类选择器
$(".content").addClass('active'); // 添加类名

// 标签选择器
// $("p").text('Hello World!'); // 设置元素的文本内容

// 通配符选择器
// $("*").css("margin", "0"); // 设置所有元素的 margin 为 0

// 多重选择器
// $("h1, p, .note").hide(); // 隐藏多个元素

// 后代选择器(空格)
// $("p .note").css("color", "red"); // 设置后代元素的样式

// 直接子元素选择器(>), 会选择 class 为 content-5 的元素下面的所有 span 元素
$(".content-5 > span").css("color", "#00FF00"); // 设置子元素的样式

// 兄弟选择器(+), 会选择 class 为 content-2 的元素后面的第一个 p 元素
$("#content-2 + p").css("color", "#FF0000"); // 设置兄弟元素的样式

// 内容操作

// 获取元素
let titleElement = $("#title");

// 获取或设置 HTML 内容
let html = titleElement.html();

// 获取元素的文本内容
let text = titleElement.text();
console.log(html, text);

// 设置元素的 HTML 内容, 会覆盖原有标签内的内容
let content6 = $("#content-6")
content6.html("<h2>这是一个标题</h2>");
content6.text("<h1>这是一个标题</h1>");

// .val 方法用于获取或设置表单元素的值
let input = $("#input-1");
let value = input.val();
console.log(value);
input.val("Hello World!");

// .attr 方法用于获取或设置元素的属性
let link = $("#link-1");
let href = link.attr("href");
console.log(href);
link.attr("href", "https://en.wikipedia.org/wiki/BMW_3_Series_(E30)");
link.text("跳转到E30");

// .removeAttr 方法用于移除元素的属性
let input2 = $("#input-2");
input2.removeAttr("disabled");
input2.removeAttr("placeholder");

let optionChengdu = $("#city option[value='chengdu']");
let isSelected = optionChengdu.prop("selected");
console.log(isSelected);

let btn1 = $("#btn-1");
if (!btn1.hasClass("btn-bg")) {
    btn1.addClass("btn-bg");
}

let main = $("#main");
let mainList = $("#main-ul");
mainList.prepend("<li>这是第零个 li</li>");
mainList.append("<li>这是第六个 li</li>");
mainList.after("<p>这是一个 p 标签</p>");
mainList.before("<p>这是一个 p 标签</p>");
mainList.children()[0].remove();
mainList.empty();

// 事件操作
let btn2 = $("#btn-2");
btn2.on("click", function () {
    alert("Hello World!");
});
btn2.on("mouseover", function () {
    btn2.css("background-color", "#FF0000");
});
btn2.on("mouseout", function () {
    btn2.removeAttr("style");
});

let btn3 = $("#btn-3");
btn3.one("click", function () {
    alert("Hello World!");
});

let input3 = $("#input-3");
input3.focus(function () {
    input3.attr("value", "");
});

function clickHandler() {
    alert("这是 btn 4 的 click 事件");
}

let btn4 = $("#btn-4");
btn4.on("click", clickHandler);
btn4.off("click", clickHandler);

// 事件对象
let btn5 = $("#btn-5");
btn5.on("click", function (event) {
    console.log(event);
    console.log(event.target);
    console.log(event.currentTarget);
    console.log(event.type);
    console.log(event.clientX, event.clientY);
});

// 事件委托
let list = $("#list");
list.on("click", "li", function () {
    alert("点击了列表项：" + $(this).text());
});

let box = $("#box");
box.hide();
box.show('slow');

let box2 = $("#box-2");

let toggleBox2Btn = $("#toggle-box-2");
toggleBox2Btn.on("click", function () {
    box2.toggle();
});

let box3 = $("#box-3");

// Ajax 操作
let ajaxBtn = $("#ajax-btn");
let ajaxContentUl = $("#ajax-content-ul");
ajaxBtn.on("click", function () {
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/posts",
        method: "GET",
        dataType: "json",
        success: function (data) {
            data.forEach(function (item) {
                ajaxContentUl.append(
                    "<li>UserID: " + item.userId +
                    ", ID: " + item.id +
                    ", Title: " + item.title +
                    ", Body: " + item.body + "</li>");
            });
        },
        error: function (error) {
            console.log(error.message);
        }
    });
});

ajaxBtn.on("click", function () {
    $.ajax({
        url: "https://jsonplaceholder.typicode.com/posts",
        method: "POST",
        dataType: "json",
        formData: {
            userId: 1,
            title: "Hello World!",
            body: "Hello World!"
        },
        success: function (data) {
            console.log(data);
        },
        error: function (error) {
            console.log(error.message);
        }
    });
});