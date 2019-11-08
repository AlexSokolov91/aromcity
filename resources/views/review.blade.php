@extends('.layouts.app')
    @section('product-content')
        @include('header')
        @include('breadcrums')

        <div class="reviews">
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

                    <h2 class="section-title reviews-title"><span class="section-title-fixed">Отзывы наших клиентов</span></h2>

                    <div class="comments-news">
                        <a class="comments-news__img" href="promotion.html">
                            <img src="img/content/comments-img.png" alt="" class="img-fluid">
                        </a>
                        <div class="comments-news__conditions">За отзыв, оставленный на сайте*, Вы получите дополнительный подарок при следующем заказе**!!! Ждём Ваших отзывов!!!</div>
                        <div class="comments-news__asterisk1">*В отзыве указывайте фамилию и имя</div>
                        <div class="comments-news__asterisk2">**В подарок Вы можете выбрать пробник парфюмерии или косметика. Точный список подарков Вам назовет менеджер. При следующем заказе обязательно назовите менеджеру пароль: "Подарок за отзыв"</div>
                    </div>

                    <div class="comments">

                        <div class="comment">
                            <div class="comment__info">
                                <div class="comment__author">
                                    <div class="comment__author-img">
                                        <img src="img/general/comment-default.jpg" alt="">
                                    </div>
                                    <div class="comment__name-rating">
                                        <div class="comment__author-name">Викатория Седкова</div>
                                        <div class="comment__rating product__rating">
                  <span id="" class="rating" data-val="4.49" data-stars='5' data-input=".rating-value" data-change="true">
                  <input type="hidden" name="" class="rating-value" size="5">
                  </span>
                                            <span class="rating-value-number">4.49</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment__date-time">
                                    <span class="comment__date">16. 08.2018</span>
                                    <span class="comment__time">16:24</span>
                                </div>
                            </div>
                            <div class="comment__text">Виктория, добрый день. Аромат держится на коже до 6 часов. Если вы желаете получить более стойкий аромат, обратите внимание на категорию "Французские духи". Представленные в ней ароматы держатся на коже до 18 часов, а не одежде - до нескольких суток.</div>
                        </div>
                        <div class="comment">
                            <div class="comment__info">
                                <div class="comment__author">
                                    <div class="comment__author-img">
                                        <img src="img/general/comment-default.jpg" alt="">
                                    </div>
                                    <div class="comment__name-rating">
                                        <div class="comment__author-name">Викатория Седкова</div>
                                        <div class="comment__rating product__rating">
                  <span id="" class="rating" data-val="4.49" data-stars='5' data-input=".rating-value" data-change="true">
                  <input type="hidden" name="" class="rating-value" size="5">
                  </span>
                                            <span class="rating-value-number">4.49</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment__date-time">
                                    <span class="comment__date">16. 08.2018</span>
                                    <span class="comment__time">16:24</span>
                                </div>
                            </div>
                            <div class="comment__text">Виктория, добрый день. Аромат держится на коже до 6 часов. Если вы желаете получить более стойкий аромат, обратите внимание на категорию "Французские духи". Представленные в ней ароматы держатся на коже до 18 часов, а не одежде - до нескольких суток.</div>
                        </div>

                    </div>
                    <div class="form__leave-comment-wrapper">

                        <p class="leave-comment__title"><b>Оставить отзыв о магазине</b></p>

                        <form action="" class="form__leave-comment main-form">
                            <input type="text" class="g-input" placeholder="Имя">
                            <div class="leave-comment__rating">
                                <span class="rate-text">Ваша оценка магазина:</span>
                                <span id="" class="rating" data-val="0.0" data-stars='5' data-input=".rating-value" data-change="true">
              <input type="hidden" name="" class="rating-value" size="5">
            </span>
                            </div>
                            <textarea name="" class="g-text-area" placeholder="Отзыв"></textarea>
                            <input type="submit" class="g-btn g-btn--main-form" value="Отправить">
                        </form>

                    </div>

                </div>

            </div>
        </div>
        @include('footer')
        @endsection