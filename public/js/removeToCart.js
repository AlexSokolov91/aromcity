$(document).on('click' , '.cart__product-remove', function (e) {
    e.preventDefault();
    var href = $(e.currentTarget).attr('href');
    console.log(href);
    var deleted = $.get(href, function (response) {
        var price = $('#cart__product-amount').attr('data-price');


        // var result = $('/cart/remove', function (result) {
        // console.log(result);
        $('.cart__product-list').html(response);
        var sum = 0;
        $('.cart__product-total').each(function(){
            sum += parseFloat($(this).text());
        });
        $('.cart__total').html(sum);
            // })
    });
});