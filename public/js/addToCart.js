
$('.add-to-cart').on('click' , function (e) {
    e.preventDefault();
    var href = $(e.currentTarget).attr('data-href');
    $.get(href, function(response) {
        var result = $.get('/cart/show', function (result) {

            $('.cart__product-list').html(result);
        });
    });
});

