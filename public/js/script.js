

$(document).ready (function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    });
});


$('.catalog-checkbox-list__item').on('change' , function () {

    $.post("/show/products", $('#brands').serialize(),

        function (response) {
            $('.product-list-3').empty();
            var a = $(".product-list-3").append(response);
            // $('.pagination').empty();
            // $('.test').empty();
            // $('.pagination').html();
        });
});

