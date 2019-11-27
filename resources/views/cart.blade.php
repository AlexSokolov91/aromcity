
         @foreach($products as $product)
                @if(!empty($product))
                  <li class="cart__product">
                      {{--@if(!empty($product))--}}
                      {{--@dd($product->attributes->images)--}}
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
                      <select name="" class="cart__product-amount">
                          @for($i =1; $i <= 9; $i++)
                              <option value="{{$i}}" selected>{{$i}} шт</option>
                          @endfor
                      </select>
                      <div class="cart__product-total">{{\Cart::get($product->id)->getPriceSum()}} грн</div>
                      <a class="cart__product-remove" href="{{route('cart.remove',  $product->id)}}"> </a>
                  </li>
                  {{--{{Cart::remove()}}--}}
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


                  <script>
                      $('.cart__product-remove').on('click' , function (e) {
                          e.preventDefault();
                          var href = $(e.currentTarget).attr('href');
                          console.log(href);
                          var deleted = $.get(href , function (response) {

                              var result1 = $.get('/cart/show', function (result) {
                            // console.log(result);
                              $('.cart__product-list').html(result);

                          })
                          });
                          });
                  </script>
              {{--</div>--}}