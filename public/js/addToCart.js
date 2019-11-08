// var route = 'show_cart';
// $('.lang').on('change' , function (l) {
//     locale = (l.currentTarget).attr('data-value');
   // console.log(locale);
// });
//
//         $('.add-to-cart').on('click' , function (e) {
//             e.preventDefault();
//             // console.log(locale);
//             var href = $(e.currentTarget).attr('data-href');
//
//             console.log(href);
//             // $.get(href, function(response) {
//                 var result = $.get( href, function (result) {
//                     console.log(result);
//                     $('.cart__product-list').html(result);
            // $.get(href, function(response) {
            // var result = $.get( href, function (result) {
            //     $('.cart-total').html(result.count);
            //
            //
            //     var view = [];
            //     var name = [];
            //     var img =[];
            //     var getImg = [];
            //     var quantity = [];
            //     console.log(result);
            //     $(result.products).each(function (index, value) {
            //         $('.cart__product-total').html(result.total);
            //         for (productId in value) {
                        // console.log(productId);
                        // console.log(value[productId]);
                        // img = value[productId];
                        // $('.cart__product-title').append(value[productId].name);
                        // $('.cart__product-price').html(value[productId].price);
$('.add-to-cart').on('click' , function (e) {
    e.preventDefault();
    var href = $(e.currentTarget).attr('data-href');
    console.log(href);
    $.get(href, function(response) {
        var result = $.get('/cart/show', function (result) {

            $('.cart__product-list').html(result);
        });
    });
});
                        // for(image in value[productId].images){
                        //     console.log(value[productId].images);
                        // console.log(value[productId].images);
                        // }
                        // console.log(value[productId].gender);
                        // for (attributes in img) {
                        //     getImg = (img[attributes]);
                        //     for (path in getImg) {
                        //
                        //         $('.img').attr("src", getImg[path].path)
                        //
                        //     }
                        // }
                    // }
                    // $('.cart__product-list').html(name);


                    // $(products).each(function (index,value) {
                    //  var name = value.name;
                    // console.log(name);
                    // });

                    // console.log(name);
                    // console.log(products[13]);
                    // for(var i = 0; i < products.length; i++){
                    //    view.push(products[i]);
                    //    console.log(view[13]);
                    //     name = products[name];
                    // }
                    // $('.cart__product-list').html(result);


                    // var product;
                    // $(result).each(function (index, el) {
                    //     var productName = el.result;
                    //
                    //     for (var i = 0; i < productName.length; i++){
                    //         product = productName[i];
                    //         console.log(product);
                    //     }                // console.log(productName);
                    // });

                // });
//                 });
// });
