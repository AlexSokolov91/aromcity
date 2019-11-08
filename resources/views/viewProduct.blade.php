@extends('.layouts.app')
{{--@dd($product)--}}
@section('product-content')
    @include('header')

    <div class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Главная</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Женские духи</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Versace Versace</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Bright Crystal</a></li>
                <li class="breadcrumb-item active">Туалетная вода 90 ml</li>
            </ul>
        </div>
    </div>
    <div class="container product-details-container">
        <h2 class="section-title">
            <span>{{$product->name}} <span class="product-descr">{{$product->type}}</span></span>
        </h2>
            <div class="product-details">
                <div class="product-details__img">
                <div class="product__sale product__sale-details">
                    <span class="product__sale-text">sale</span>
                </div>
                <a href="javascript:void(0);">
                    <img src="{{$product->images->path}}" alt="">
                </a>
            </div>
                <div class="product-details__information">
                    <div class="product__information">
                    <p><b>Артикул:</b> {{$product->article}}</p>
                    <p><b>Пол:</b> {{$product->gender}}</p>
                    <p><b>Объем:</b> {{$product->volume}}</p>
                    <p><b>Страна производитель:</b> {{$product->country}}</p>
                </div>
                    <div class="product__price product__price--details">
                    <span class="old-price">{{$product->old_price}}грн</span>
                    <span class="new-price">{{$product->price}}грн</span>
                    <span class="saving">Вы экономите: {{$product->discount}}грн</span>
                </div>
                <div class="product__rating product__rating--details">
        <span id="" class="rating" data-val="2.49" data-stars='5' data-input=".rating-value" data-change="true">
        <input type="hidden" name="" class="rating-value" size="5">
        </span>
                    <span class="rating-value-number">3.3 (52 отзыва)</span>
                </div>
                    <div class="product-details__controls">
                    <select name="" class="cart__product-amount">
                        @for($i =1; $i <= 9; $i++)
                        <option value="{{$i}}" selected>{{$i}} шт</option>
                        @endfor
                    </select>
                    <a href="#cart-popup" class="g-btn g-btn--product add-to-cart"><i class="product-cart-icon"></i>Купить со скидкой</a>
                    <a href="#callback-popup" class="g-btn g-btn--callback callback-show-up">
                        <span>Купить в 1 клик</span>
                    </a>
                </div>
            </div>
            @include('viewProductBanner')
            <div class="container">
                <div class="stock-line">
                    <div class="stock-line__img">
                        <img src="/img/general/stock-line-img-1.jpg" alt="" class="img-fluid stock-line-img-big">
                        <img src="/img/general/stock-line-img-2.jpg" alt="" class="img-fluid stock-line-img-small">
                    </div>
                    <div class="stock-line__text">
                        <p>AROM-CITY проводит грандиозную распродажу элитной парфюмерии!</p>
                        <p>Стойкие ароматы от всемирно известных брендов со скидкой до 75%</p>
                    </div>
                </div>
            </div>
            <!-- stock-line-ended -->
            <!-- characteristics-begins -->
            <div class="container">
                <h2 class="section-title"><span class="section-title-fixed">Характеристика</span></h2>
                <div class="characteristics">
                    <div class="characteristics__items">
                        {!! $product->characteristics!!}
                    </div>
                    <div class="characteristics__descr">
                        {!! $product->characteristics__description !!}
                    </div>
                </div>
            </div>

            <div class="container similar-products-container">

                <h2 class="section-title similar-products-title"><span class="section-title-fixed">ПОХОЖИЕ ТОВАРЫ</span></h2>
                <div class="similar-products-slider">
                    <div class="js-similar-products">
                        @foreach($similarProducts as $item)
                            <div class="similar-products-item">
                                <div class="product">
                                    <div class="product__sale">
                                        <span class="product__sale-text">sale</span>
                                    </div>
                                    <div class="product__discount discount-75">
                                        <span class="product__discount-text">-50%</span>
                                    </div>
                                    <div class="product__img">
                                        <a href="{{route('products.show',  $item->id)}}">
                                            <img src="{{$item->images->path}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="product__title">{{$item->name}}</div>
                                    <div class="product__title-descr">{{$item->type}} {{$item->volume}}</div>
                                    <div class="product__rating">
            <span id="" class="rating" data-val="3.83" data-stars='5' data-input=".rating-value" data-change="false">
              <input type="hidden" name="" class="rating-value" size="5">
                    </span>
                                        <span class="rating-value-number">3.83</span>
                                    </div>
                                    <div class="product__price">
                                        <span class="old-price">{{$item->old_price}}грн</span>
                                        <span class="new-price">{{$item->price}}грн</span>
                                    </div>
                                    <a href="#cart-popup" class="g-btn g-btn--product add-to-cart"><i class="product-cart-icon"></i>Купить со скидкой</a>
                                </div>
                            </div>
                    </div>
                        @endforeach
                    </div>
                <div class="container">
                        <h2 class="section-title comments-title"><span class="section-title-fixed">Отзывы наших клиентов</span></h2>
                    <div class="comments__wrapper">
                        <div class="comments">
                            @foreach($comments as $comment)
                                <div class="comment">
                                    <div class="comment__info">
                                        <div class="comment__author">
                                            <div class="comment__author-img">
                                                <img src="img/general/comment-default.jpg" alt="">
                                            </div>
                                            <div class="comment__name-rating">
                                                <div class="comment__author-name">{{$comment->name}}</div>
                                                <div class="comment__rating product__rating">
                <span id="" class="rating" data-val="{{$comment->rating}}" data-stars='5' data-input=".rating-value" data-change="true">
                <input type="hidden" name="" class="rating-value" size="5">
                </span>

                                                    {{--@dd($comment->created_at)--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment__date-time">
                                            <span class="comment__date">{{$comment->created_at}}</span>
                                            {{--<span class="comment__time">16:24</span>--}}
                                        </div>
                                    </div>
                                    <div class="comment__text">{{$comment->text}}</div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form__leave-comment-wrapper">
                    <p class="leave-comment__title"><b>Оставить отзыв о магазине</b></p>
                    <form action="{{route('comment-store' , app()->getLocale())}}" method="post" class="form__leave-comment main-form">
                        @csrf
                        <input type="text" class="g-input" name="name" placeholder="Имя">
                        <div class="leave-comment__rating">
                            <span class="rate-text">Ваша оценка магазина:</span>
                            <span id="" class="rating" name="rating" data-val="0.0" data-stars='5' data-input=".rating-value" data-change="true">
            <input type="hidden" name="rating" class="rating-value" size="5">
                                </span>
                        </div>
                        <textarea name="text" class="g-text-area" placeholder="Отзыв"></textarea>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="hidden" name="product_id" value="{{$product->id}}">
                        <input type="submit" class="g-btn g-btn--main-form" value="Отправить">
                    </form>
                </div>
            </div>
        </div>
    </div>
        @include('footer')
    @endsection