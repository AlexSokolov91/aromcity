@extends('.layouts.app')

@section('product-content')
    @include('.header')
@include('.breadcrums')
    <div class="promotions">
        <div class="container flex-container">

            <div class="side-container">

                <div class="side-container-title">ВЫ СМОТРЕЛИ</div>

                <div class="product">
                    <div class="product__sale">
                        <span class="product__sale-text">sale</span>
                    </div>
                    <div class="product__discount discount-75">
                        <span class="product__discount-text">-50%</span>
                    </div>
                    <div class="product__img">
                        <a href="product.html">
                            <img src="img/content/products/woman/01.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="product__title">Dolce&Gabbana 3 L'Imperatrice</div>
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
                </div>

                <div class="product">
                    <div class="product__sale">
                        <span class="product__sale-text">sale</span>
                    </div>
                    <div class="product__discount discount-75">
                        <span class="product__discount-text">-50%</span>
                    </div>
                    <div class="product__img">
                        <a href="product.html">
                            <img src="img/content/products/woman/01.png" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="product__title">Dolce&Gabbana 3 L'Imperatrice</div>
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
                </div>

            </div>

            <div class="main-container">

                <h2 class="section-title promotions-title"><span class="section-title-fixed">Акции</span></h2>

                <div class="promotion">
                    <div class="promotion__title promotion__title--green">Распродажа на ParfumCity</div>
                    <p class="promotion__percentage">Скидка до -75%</p>
                    <p class="promotion__conditions">Акция до 09 июня 2018 года !!! Parfumcity.com.ua радует своих клиентов и устраивает распродажу. Скидки до 76% на весь ассортимент парфюмерии и косметики!!! Торопитесь, количество ограничено!</p>
                    <p>Желаем Вам и Вашим близким хорошего настроения и позитива от покупок!</p>
                    <div class="promotion__links">
                        <a href="category.html">Женская парфюмерия</a>
                        <a href="category.html">Мужская парфюмерия</a>
                    </div>
                </div>

                <div class="promotion">
                    <div class="promotion__title promotion__title--red">Подарки за покупки!</div>
                    <div class="promotion__conditions">Покупая в Parfumcity более 1-го товара, Вы гарантированно получаете подарки!*</div>
                    <div class="promotion__img"><img src="img/content/slideshow/bg/3.jpg" alt="" class="img-fluid"></div>
                    <p class="promotion__asterisk1">*В подарок можно выбрать любой аромат 110мл из раздела Французские духи (уточнять у менеджера по телефону).</p>
                </div>

                <div class="promotion">
                    <div class="promotion__title promotion__title--blue">Подарок за отзыв</div>
                    <div class="promotion__conditions">За отзыв, оставленный на сайте*, Вы получите дополнительный подарок при следующем заказе**!!! Ждём Ваших отзывов!!!</div>
                    <a class="promotion__img" href="review.html">
                        <img src="img/content/comments-img.png" alt="" class="img-fluid">
                    </a>
                    <div class="promotion__asterisk1">*В отзыве указывайте фамилию и имя</div>
                    <div class="promotion__asterisk2">**В подарок Вы можете выбрать пробник парфюмерии или косметика. Точный список подарков Вам назовет менеджер. При следующем заказе обязательно назовите менеджеру пароль: "Подарок за отзыв"</div>
                </div>

            </div>

        </div>
    </div>

    @include('footer')
    @endsection