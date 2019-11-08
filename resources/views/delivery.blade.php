@extends('.layouts.app')

@section('product-content')
    @include('header')
    @include('breadcrums')

    <div class="delivery-payment">
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

        <h2 class="section-title delivery-title"><span class="section-title-fixed">Доставка</span></h2>

        <div class="delivery">
            <div class="delivery-payment-title">Бесплатная по всей Украине</div>
            <p>Доставка осуществляется компанией Новая Почта до выбранного Вами отделения. <b>При заказе от 2-х единиц</b> и более доставка <b>совершенно бесплатная.</b></p>
            <p>После оформления заказа, любым удобным для Вас способом, наши менеджеры свяжутся с Вами для уточнения места доставки, а также даты доставки. Обычно, доставка <b>осуществляется в течении 1-3 дней</b> после оформления заказа.</p>
            <p>Отправка заказов осуществляется два раза в день: в 12:00 и в 18:00; с понедельника по субботу. Заказы оформленные в воскресенье - будут отправлены в понедельник.</p>
            <p><b>Минимальной суммы заказа нет.</b></p>
            <p>При заказе одной единицы товара доставка - 40 грн.</p>
        </div>

        <h2 class="section-title delivery-title"><span class="section-title-fixed">Оплата</span></h2>

        <div class="payment">
            <div class="delivery-payment-title">Оплата осуществляется наложенным платежом при получении заказа</div>
            <p>Перед отправкой весь ассортимент товара <b>проверяется и упаковывается</b> для безопасной транспортировки. В связи с этим, мы абсолютно уверены в качестве получаемого Вами аромата. Кроме этого, Вы можете лично осмотреть Ваши духи, и только после этого совершать оплату в отделении Новой почты.</p>
            <p>При этом, никаких скрытых платежей, оплаты услуг транспортной компании, платы за перевод денег, комиссий и прочее! <b>Вы оплачиваете только сумму заказа!</b></p>
        </div>

        <div class="delivery-peyment-items">
            <div class="delivery-peyment-item">
                <div class="dpi__icon"><img src="img/general/delivery-request.png" alt="" class="img-fluid"></div>
                <div class="dpi__title">Оформление заказа</div>
                <div class="dpi__descr">Вы оформляете заявку по телефону или на сайте</div>
            </div>
            <div class="delivery-peyment-item">
                <div class="dpi__icon"><img src="img/general/delivery-approvement.png" alt="" class="img-fluid"></div>
                <div class="dpi__title">Подтверждение заказа</div>
                <div class="dpi__descr">Менеджер подтверждает с Вами заявку</div>
            </div>
            <div class="delivery-peyment-item">
                <div class="dpi__icon"><img src="img/general/delivery-dispatch.png" alt="" class="img-fluid"></div>
                <div class="dpi__title">Доставка</div>
                <div class="dpi__descr">Мы доставим вашу посылку в течении 1-2 дней</div>
            </div>
            <div class="delivery-peyment-item">
                <div class="dpi__icon"><img src="img/general/delivery-payment.png" alt="" class="img-fluid"></div>
                <div class="dpi__title">Оплата при получении</div>
                <div class="dpi__descr">Вы подтверждаете посылку и только потом оплачиваете</div>
            </div>
            <div class="delivery-peyment-item">
                <div class="dpi__icon"><img src="img/general/delivery-enjoying.png" alt="" class="img-fluid"></div>
                <div class="dpi__title">Наслаждайтесь покупкой</div>
                <div class="dpi__descr">Хорошего настроения</div>
            </div>
        </div>

        <div class="delivery-condition">
            <p>Доставка осуществляется в города, где есть отделения Новой почты.</p>
            <p>Выбрать ближайший склад Вы можете на сайте новой почты:</p>
            <a href="https://novaposhta.ua/ru/office">https://novaposhta.ua/ru/office</a>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
@endsection