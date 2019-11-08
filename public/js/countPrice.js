
$('.cart__product-amount').on('click' ,function (e) {
    e.preventDefault();
    var value = (e.currentTarget).attr('value');
    console.log(value)
});

