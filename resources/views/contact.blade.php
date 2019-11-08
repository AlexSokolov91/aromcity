@extends('.layouts.app')
    @section('product-content')
    @include('header')
    @include('breadcrums')

    <div class="contacts">
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

            <div class="main-container contact-container">

                <h2 class="section-title contacts-title"><span class="section-title-fixed">Контакты</span></h2>
                <div class="contact">

                    <div class="contact__staff">

                        <div class="managers">
                            <div class="managers__title">Наши менеджеры</div>
                            <div class="managers__items">
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="managers">
                            <div class="managers__title">Старшие менеджеры</div>
                            <div class="managers__items">
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                                <div class="managers__item">
                                    <img src="img/general/manager.png" alt="">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="contact__details">

                        <div class="details-phones">
                            <div class="details-phones__title">Звоните нам по телефонам:</div>
                            <div class="details-phones__item">
                                <span>Vodafone: </span><a href="tel:0950041553">095 004 15 53</a>
                            </div>
                            <div class="details-phones__item">
                                <span>Kyivstar: </span><a href="tel:0678141693">067 814 16 93</a>
                            </div>
                            <div class="details-phones__item">
                                <span>Lifecell: </span><a href="tel:0639866708">063 986 67 08</a>
                            </div>
                        </div>

                        <div class="details-address">Адрес отдела продаж: г. Днепр, ул. Глинки, 2</div>

                        <div class="details-opening-hours">
                            <p>Прием заказов на сайте онлайн круглосуточно <span>(без выходных)</span></p>
                            <p>Прием заказов по телефону с 9:00 до 21:00 <span>(без выходных)</span></p>
                        </div>

                    </div>

                </div>

                <!-- contact-us -->
                <h2 class="section-title contacts-title"><span class="section-title-fixed">Обратная связь</span></h2>

                <form action="" class="form__contact-us main-form">
                    <input type="text" class="g-input" placeholder="Имя">
                    <input type="text" class="g-input" placeholder="Телефон">
                    <textarea name="" class="g-text-area" placeholder="Сообщение"></textarea>
                    <input type="submit" class="g-btn g-btn--main-form" value="Отправить">
                </form>

            </div>

        </div>
    </div>
        @include('footer')
    @endsection