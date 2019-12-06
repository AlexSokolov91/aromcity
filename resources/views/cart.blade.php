
         @foreach($products as $product)
                @if(!empty($product))
                  <li class="cart__product">

                          <div class="cart__product-links">
                          <div class="cart__product-img">
                              <a href="javascript:void(0);"><img src="{{\Illuminate\Support\Facades\Storage::url($product->attributes->images['path'], $product->id)}}" alt=""></a>
                          </div>
                          <div class="cart__product-title">
                              <a href="javascript:void(0);">{{$product->name, $product->id}}</a>
                          </div>
                      </div>
                      <div class="cart__product-price">{{$product->price}}грн</div>
                      <div class="responsive-devider"></div>
                      <select  data-price="{{$product->price}}" name='quantity[]' class="cart__product-amount" >
                          @for($i =1; $i <= 10; $i++)
                              <option value="{{$i}}" data-price="{{$product->price}}" id="select" selected>{{$i}} шт</option>
                              {{--<input type="hidden" name="quantity" value="{{$i}}">--}}
                          @endfor
                      </select>
                      <div class="cart__product-total">{{\Cart::get($product->id)->getPriceSum()}} грн</div>
                      <a class="cart__product-remove" href="{{route('cart.remove',  $product->id)}}"> </a>
                  </li>
                      @endif
                  @endforeach

             {{--@else--}}
                 {{--<li><div class="cart-is-empty">В корзине пусто</div></li>--}}


                  <!-- <li><div class="cart-is-empty">В корзине пусто</div></li> -->


              <div class="cart__bottom">
                  <a href="javascript:void(0);" class="cart-continue">Продолжить покупки</a>
                  <div class="cart__bottom-checkout">
                      <div class="cart__total">{{\Cart::getSubTotal()}} грн</div>
                      <a href="{{route('cart.view')}}" class="g-btn g-btn--product">Оформить заказ</a>
                  </div>
                  @section('scripts')
                  {{--<script src="{{asset('js/addToCart.js')}}"></script>--}}
                @endsection
                  <script>
                      $('.cart__product-remove').on('click' , function (e) {
                          e.preventDefault();
                          var href = $(e.currentTarget).attr('href');
                          console.log(href);
                          var deleted = $.get(href , function (response) {

                              var result1 = $.get('/cart/show', function (result) {
                            // console.log(result);
                              $('.cart__product-list').html(result);

                                  var sum = 0;
                                  $('.cart__product-total').each(function(){
                                      sum += parseFloat($(this).text());
                                  });
                                  $('.cart__total').html(sum);
                          })
                          });
                          });
                  </script>
                 <script>
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

                 </script>
              </div>