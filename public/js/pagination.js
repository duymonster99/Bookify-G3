$(document).ready(function() {
    $(document).on('click', '.pagination a', function(event) {
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getMoreProducts(page);
    });
});

function getMoreProducts(page) {
    $.ajax({
        method: 'GET',
        url: "{{ route('products.getMoreProducts') }}",
        data: {
            page: page
        },
        dataType: 'html',
        success: function(data) {
            $('.product-page-body .row').html(data);
            // Xử lý ẩn biểu tượng loading ở đây (nếu có)
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
