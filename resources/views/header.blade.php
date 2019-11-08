
{{--@push('scripts')--}}
    {{--<script src="{{asset('js/jquery.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/scripts.js')}}"></script>--}}
    {{--<script src="{{asset('js/addTocart.js')}}"></script>--}}
{{--@endpush--}}
<div class="container">
    <div class="top-line">
        <div class="opening-hours">
            <div class="opening-hours__mode">Режим работы:</div>
            <div class="opening-hours__text">
                <span>Онлайн круглосуточно</span>
                <span>Call-center с 9:00 до 21:00</span>
            </div>
        </div>

        <div class="controls-phones">

            <div class="controls">
                <div class="search" id="search">
                    <input type="text" name="search" placeholder="Поиск по сайту...">
                    <button type="button"><i class="fa fa-search"></i></button>
                </div>
                <a href="#callback-popup" class="g-btn g-btn--low g-btn--callback callback-show-up">
                    <i class="phone-icon phone-icon--white"></i><span>ОБРАТНЫЙ ЗВОНОК</span>
                </a>
                <a href="#cart-popup" class="g-btn g-btn--product add-to-cart">
                    <i class="basket-cart-icon"><span class="cart-total-number">3</span></i>
                    <span class="cart-total">@if(!empty(\Cart::session(session_id())->getTotalQuantity()))  {{ \Cart::session(session_id())->getTotalQuantity()}} @else Корзина пуста @endif</span>
                </a>
                <!-- <a href="#cart-popup" class="g-btn g-btn--low g-btn--cart cart-show-up active">
                  <i class="basket-cart-icon"><span class="cart-total-number">3</span></i>
                  <span class="cart-total">3 200 грн.</span>
                </a> -->
            </div>

            <div class="phones phones__top-line">
                <a href="tel:0950041553" class="phone">
                    <i class="phone-icon phone-icon--black"></i>(095) 00-41-553
                </a>
                <a href="tel:0678141693" class="phone">
                    <i class="phone-icon phone-icon--black"></i>(067) 81-41-693
                </a>
                <a href="tel:0639866708" class="phone">
                    <i class="phone-icon phone-icon--black"></i>(063) 98-66-708
                </a>
            </div>

        </div>

    </div>

    <div class="banner">

        <div class="timer"></div>

        <div class="banner__items">
            <div class="banner__item">
                <div class="banner__item-icon">
                    @foreach($headerBannerImages as $image)
                    <img src="{{$image->delivery_icon}}" alt="" class="img-fluid">
                </div>
                <div class="banner__item-text">
                    <div class="banner__item-text-title">Бесплатная доставка</div>
                    <div class="banner__item-text-descr">При заказе от 2х единиц любых товаров</div>
                </div>
            </div>
            <div class="banner__item">
                <div class="banner__item-icon">
                    <img src="{{$image->payment_icon}}" alt="" class="img-fluid">
                </div>
                <div class="banner__item-text">
                    <div class="banner__item-text-title">Оплата при получении</div>
                    <div class="banner__item-text-descr">Никаких дополнительных платежей</div>
                </div>
            </div>
            <div class="banner__item">
                <div class="banner__item-icon">
                    <img src="{{$image->trust_icon}}" alt="" class="img-fluid">
                </div>
                <div class="banner__item-text">
                    <div class="banner__item-text-title">Нам доверяют</div>
                    <div class="banner__item-text-descr">Более 96 000 клиентов</div>
                </div>
            </div>
            <div class="banner__item">
                <div class="banner__item-icon">
                    <img src="{{$image->discount_icon}}" alt="" class="img-fluid">
                </div>
                <div class="banner__item-text">
                    <div class="banner__item-text-title">Скидки</div>
                    <div class="banner__item-text-descr">Регулярные акции <a href="promotion.html" class="discount-details">Подробнее</a></div>
                </div>
            </div>
        @endforeach
        </div>

        {{--<script src="{{asset('js/jquery.min.js')}}"></script>--}}
        {{--<script src="{{asset('js/scripts.js')}}"></script>--}}
        {{--<script src="{{asset('js/libs.min.js')}}"></script>--}}
        {{--<script src="{{asset('js/addTocart.js')}}"></script>--}}

    </div>
</div>

