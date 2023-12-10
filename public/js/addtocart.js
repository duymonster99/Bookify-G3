function addToCart(event) {
    event.preventDefault();
    let urlCart = $(this).data('url');
    $.ajax({
        method: 'GET',
        url: urlCart,
        dataType: 'html',
        success: function(data) {
            if (data.code === 200) {
                alert('thêm sản phẩm thành công');
            }
        }
        // error: function() {

        // }
    });
}
$(function() {
    $('.add_to_cart').on('click', addToCart);
});
