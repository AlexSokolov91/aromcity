
$('.add-to-cart').on('click' , function (e) {
    e.preventDefault();
    var href = $(e.currentTarget).attr('data-href');
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
