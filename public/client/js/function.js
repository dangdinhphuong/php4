
function addToCart(id) { // thêm sản phẩm có sô lượng
    let quantity = $("#quantity").val();
    let _token = $("input[name=_token]").val();
    let url = "/api/add-to-cart/" + id;
    let data = { quantity, _token };

    $.ajax({
        type: "post",
        url: url,
        data: data,
        success: function (res) {
            swal(res.message, {
                icon: res.status,
                timer: 1000
            });
        },
        error: function (response) {
            console.log('response', response.responseJSON)
            if(response.responseJSON.message){
                swal(response.responseJSON.message, {
                    icon: response.responseJSON.status,
                });
            }
           else swal(response.message, {
                icon: response.status,
            });
        },
    });


}

function addCart(id) { // thêm sản phẩm măc định sô lượng là 1

    let url = "/api/add-cart/" + id;
    $.ajax({
        type: "get",
        url: url,
        success: function (res) {
            console.log('res',res)
            swal(res.message, {
                icon: res.status,
                timer: 2000
            });
        },
        error: function (response) {
            console.log('response', response.responseJSON)
            if(response.responseJSON.message){
                swal(response.responseJSON.message, {
                    icon: response.responseJSON.status,
                });
            }
           else swal(response.message, {
                icon: response.status,
            });
        },
    });


}

function removeCart(id) { // xóa sản phẩm theo id trong giỏ hàng
    let url = "/api/remove-cart/" + id;
    $.ajax({
        type: "get",
        url: url,
        success: function (res) {
            console.log('res',res)
            swal(res.message, {
                icon: res.status,
                timer: 2000
            }).then(function() {
                console.log("#pro" + id,res)
                $("#pro" + id).fadeOut(300, function () { // Thêm hiệu ứng fadeOut
                    $(this).remove(); // Sau khi hiệu ứng hoàn tất, phần tử được remove
                    updateSummarys(); // Chạy hàm updateSummarys
                });
            });
        },
        error: function (response) {
            console.log('response', response.responseJSON)
            if(response.responseJSON.message){
                swal(response.responseJSON.message, {
                    icon: response.responseJSON.status,
                });
            }
           else swal(response.message, {
                icon: response.status,
            });
        },
    });
}

// Hàm cập nhật SUBTOTAL và GRAND TOTAL
function updateSummarys() {
    let subtotal = 0;
    const shippingFees = 0; // Phí vận chuyển cố định

    // Tính tổng tiền của tất cả các sản phẩm
    let count = 0;
    $(".cart__table--body__items").each(function () {
        count ++
        let total = parseFloat($(this).find(".total-price").text().replace(/\./g, '').replace(" VNĐ", '')) || 0;
        subtotal += total;
    });
console.log('count',count);
    // Cập nhật SUBTOTAL
    $(".subtotal").text(formatCurrencys(subtotal) + " VNĐ");

    // Cập nhật GRAND TOTAL
    let grandTotal = subtotal + shippingFees;
    $(".grand-total").text(formatCurrencys(grandTotal) + " VNĐ");
}
function formatCurrencys(amount) {
    return amount.toLocaleString("vi-VN");
}
