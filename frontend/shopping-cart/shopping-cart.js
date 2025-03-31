$(document).ready(function () {
// 商品数据
    let products = {
        add1: { name: "HTML course", price: 100 },
        add2: { name: "CSS course", price: 120 },
        add3: { name: "JavaScript course", price: 150 },
        add4: { name: "jQuery course", price: 130 }
    };

// 监听“add to cart” 按钮点击事件
$(".add").click(function() {
    let productId = $(this).data("id");
    let product = products[productId]
    let existingRow = $("#cart-body").find(`tr[data-id='${productId}']`);

    if (existingRow.length > 0) {
        let qtyCell = existingRow.find(".quantity");
        let newQty = parseInt(qtyCell.text()) + 1;
        qtyCell.text(newQty);
        let subtotalCell = existingRow.find(".subtotal");
        subtotalCell.text((product.price * newQty).toFixed(2));
    } else {
        let newRow = `
            <tr data-id="${productId}">
                <td>${product.name}</td>
                <td>￥${product.price.toFixed(2)}</td>
                <td class="quantity">1</td>
                <td class="subtotal">￥${product.price.toFixed(2)}</td>
                <td><button class="remove">Remove</button></td>
            </tr>
        `;
        $("#cart-body").append(newRow);
    }
    updateTotal(); 
});

// 监听“Remove” 按钮点击事件（使用事件委托）
$("#cart-body").on("click", ".remove", function () {
    $(this).closest("tr").remove();
    updateTotal();
});

// 更新购物车总价
function updateTotal() {
    let total = 0;
    $(".subtotal").each(function () {
        total += parseFloat($(this).text().replace("￥", ""));
    });
    $("#total-amount").text(total.toFixed(2));
}
});