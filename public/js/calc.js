
$(document).on('change', '.cart__product-amount' , function (e) {
    e.preventDefault();
    var count = $(this).find("option:selected").val();
    console.log(count);
    var price = $('.cart__product-amount').attr('data-price');
    // var price = document.querySelectorAll('[data-price]');
    // $(price).click(function () {
        //
    console.log($(this).data('price'));
        // parseInt(price).text();
    var result = price * count;
    console.log(result);
    var leng = $('.cart__product').length;
    var priceLeng =$('.cart__product-total').length;

    $(this).parents('li').find('.cart__product-total').html(result);

    sumTotalCart();


});
function sumTotalCart() {
    var sum = 0;
    $('.cart__product-total').each(function(){
        sum += parseFloat($(this).text());
    });
    $('.cart__total').html(sum);
}