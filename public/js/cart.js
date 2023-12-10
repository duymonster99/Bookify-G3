function cartUpdate(event) {
    event.preventDefault();
    let id = $(this).data("id");
    let quantity = $(this).parents("tr").find("input").val();
    $.ajax({
        method: "GET",
        url: "/shopping_cart/update-cart",
        data: {
            id: id,
            quantity: quantity,
        },
        success: function (data) {
            if (data.code == 200) {
                $(".container").html(data.cart);
            }
        },
        error: function (err) {
            console.log("error: ", err);
        },
    });
}

function cartDelete(event) {
    // event.preventDefault();
    let urlDelete = $(".row").data("url");
    let id = $(this).data("id");
    let quantity = $(this).parents("tr").find("input").val();
    // alert(urlDelete);
    $.ajax({
        method: "GET",
        url: urlDelete,
        data: {
            id: id,
            quantity: quantity,
        },
        success: function (data) {
            if (data.code === 200) {
                $(".container").html(data.cart);
            }
        },
    });
}

$(function () {
    $(document).on("click", ".cart_update", cartUpdate);
    $(document).on("click", ".cart_delete", cartDelete);
});

function selectCoupon(event) {
    event.preventDefault();
    let urlCoupon = $(this).data("url");
    $.ajax({
        method: "GET",
        url: urlCoupon,
        dataType: "html",
        success: function (data) {
            // Xử lý phản hồi từ server nếu cần thiết
            if (data.code == 200) {
                alert("add ma thanh cong");
            }
        },
    });

}
$(document).on("click", '.selectCouponBtn', selectCoupon);

function couponDelete(event) {
    event.preventDefault();
    let id = $(this).data('id');
    // alert(urlDelete);
    $.ajax({
        method: 'GET',
        url: urlDelete,
        data: {
            'id': id,
        },
        success: function(data) {
            if (data.code === 200) {
                $('.container').html(data.cart);
            }
        }
    })
}

$(function() {
    // $(document).on('click', '.cart_update', cartUpdate);
    $(document).on('click', '.delete_coupon', couponDelete);
})
