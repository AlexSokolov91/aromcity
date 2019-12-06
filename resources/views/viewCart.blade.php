@extends('.layouts.app')

@section('product-content')

    <div class="checkout">
        <div class="container flex-container">
            <div class="side-container">
                <div class="side-container-title">Хит продаж</div>
                    <div class="product">
{{--                        @foreach($populars as $popular)--}}
                        {{--@dd($popular)--}}
                            <div class="product__sale">
                        <span class="product__sale-text">sale</span>
                            </div>
                            <div class="product__discount discount-75">
                        <span class="product__discount-text">-50%</span>
                            </div>
                                <div class="product__img">
                                <a href="product.html">
                                    <img src="{{\Illuminate\Support\Facades\Storage::url($populars->images['path']), $populars->id}}" alt="" class="img-fluid">
                                </a>
                                    </div>
                    <div class="product__title">{{$populars->name}}</div>
                    <div class="product__title-descr">Туалетная вода 100ml</div>
                    <div class="product__rating">
        <span id="" class="rating" data-val="3.83" data-stars='5' data-input=".rating-value" data-change="false">
          <input type="hidden" name="" class="rating-value" size="5">
        </span>
                        <span class="rating-value-number">3.83</span>
                    </div>
                    <div class="product__price">
                        <span class="old-price">1500грн</span>
                        <span class="new-price">299грн</span>
                    </div>
                    <a href="#cart-popup" class="g-btn g-btn--product add-to-cart"><i class="product-cart-icon"></i>Купить со скидкой</a>
               {{--@endforeach--}}
                    </div>
                </div>
            <div class="main-container">
        <h2 class="section-title checkout-title"><span class="section-title-fixed">Оформление заказа</span></h2>
        <div class="cart">
    <div class="cart__banner">Купите любые ДВА товара и мы Вам подарим ДУХИ 110мл ! Купите ТРИ и мы подарим Вам ТРИ флакона духов по 110 мл или косметику, на Ваш выбор! Подробнее: Акция 1 + 1 =</div>
        <form action="{{route('new_order')}}" class="form__checkout" id="form__checkout" method="post">
        <ul class="cart__product-list">
            @csrf
    @foreach($products as $product)
        {{--@dd($product)--}}
                <input type="hidden" name="product_id[]"   value="{{$product->id}}">
                <input type="hidden" name="one_unit_price" value="{{$product->price}}">
        <li class="cart__product">
    <div class="cart__product-links">
    <div class="cart__product-img">
    <a href="javascript:void(0);"><img src="{{\Illuminate\Support\Facades\Storage::url($product->attributes->images['path'], $product->id)}}" alt=""></a>
    </div>
    <div class="cart__product-title">
    <a href="javascript:void(0);">{{$product->name, $product->id}}</a>
    </div>
    </div>
            <div class="cart__product-price">{{$product->price, $product->id}} грн</div>
            <div class="responsive-devider"></div>
    <select  data-price="{{$product->price}}" name='quantity[]' class="cart__product-amount" >
        @for($i =1; $i <= 10; $i++)
            <option value="{{$i}}" data-price="{{$product->price}}" id="select" selected>{{$i}} шт</option>
        {{--<input type="hidden" name="quantity" value="{{$i}}">--}}
        @endfor
    </select>
    <input type="hidden" name="total_price" value="{{$total}}">
            <input type="hidden" name="one_unit_price" value="{{$product->price}}">
    <div class="cart__product-total"  data-value="">{{\Cart::get($product->id)->getPriceSum()}} грн</div>
            <a class="cart__product-remove" href="{{route('cart.remove',  $product->id)}}"> </a>
    </li>
        @endforeach

        </ul>
    <div class="cart__bottom">
        <div class="cart__bottom-form-wrapper">
        <div class="form-group">
    <label for="name" >Имя</label>
    <input id="name" name="client_name" type="text" class="g-input" placeholder="Введите Имя">
    </div>
    <div class="form-group">
    <label for="phone" >Телефон * <span>обязательное поле</span></label>
    <input id="phone" name="client_phone" type="text" class="g-input" placeholder="Номер телефона" required>
    </div>

    <div class="cart__total">@if(empty(\Cart::isEmpty())){{$total}} грн  @endif</div>

        <button type="submit" class="g-btn g-btn--checkout" value="Заказать">Заказать</button>
    </div>
        {{--</div>--}}
    </div>
        </form>
        <div class="checkout__info">
            <div class="checkout__info-title">Доставка Новой почтой!</div>
            <div class="checkout__info-title-descr checkout-highlight">При заказе от 2-х единиц любого товара доставка совершенно БЕСПЛАТНАЯ.</div>
            <div class="checkout__info-content">
                <div class="checkout__info-contact">
                    <p class="checkout-highlight">Если у Вас возникли трудности с оформлением заказа, вы можете связаться с нами по телефонам:</p>
                    <div class="checkout__info-links">
                        <div><span>Киевстар: </span><a href="tel:0678141693">(067) 81-41-693</a></div>
                        <div><span>Лайф: </span><a href="tel:0639866708">(063) 98-66-708</a></div>
                    </div>
                </div>
                <div class="checkout-info-text">
                    <p>Оплата заказа производится в отделении Новой почты послеполучения и осмотра парфюма. Никаких предоплат и переводов.</p>
                    <p>Срок доставки 1-3 дня.</p>
                    <p>Внимание! Каждый флакон проверяется перед отправкой. Тем самым мы гарантируем качество полученной Вами парфюмерии.</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
     </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/calc.js')}}"></script>
    <script src="{{asset('js/removeToCart.js')}}"></script>
@endsection
{


{{--<script>--}}
    {{--var count = '';--}}
     {{--$('#cart__product-amount').on('change' , function (e) {--}}
         {{--e.preventDefault();--}}
     {{--var count = $(this).find("option:selected").val();--}}
         {{--console.log(count);--}}
         {{--var price = $('#cart__product-amount').attr('data-price');--}}
         {{--var number = $('#cart__product-amount option').val();--}}
         {{--var price = document.querySelectorAll('[data-price]');--}}
        {{--$(price).click(function () {--}}
            {{--//--}}
            {{--console.log($(this).data('price'));--}}
            {{--// parseInt(price).text();--}}


            {{--// var result = price * count;--}}
            {{--// console.log(result);--}}

    {{--});--}}
    {{--});--}}
    {{--</script>--}}
    {{--<script>--}}
        {{--$("cart__product-amount").change(function () {--}}
            {{--var option = $(this).val();--}}
            {{--console.log(option);--}}
            {{--$("#form__checkout").attr("actions", "list/" + option);--}}
        {{--});--}}
    {{--</script>--}}

    {{--<script>--}}
        {{--$('.cart__product-remove').on('click' , function (e) {--}}
            {{--e.preventDefault();--}}
            {{--var href = $(e.currentTarget).attr('href');--}}
            {{--var deleted = $.get(href , function (response) {--}}
                {{--// console.log(deleted);--}}

                {{--var result1 = $.get('/cart/show', function (result) {--}}
                    {{--// console.log(result);--}}
                    {{--$('.cart__product-list').html(result);--}}

                {{--})--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}

