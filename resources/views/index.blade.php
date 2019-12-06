@extends('.layouts.app')

{{--@section('style')--}}
    {{--<link rel="stylesheet" href="/css/styles.css">--}}
    {{--<link rel="stylesheet" href="/css/libs.min.css">--}}
{{--@endsection--}}
@section('product-content')
    @include('slider')
    @include('popularProduct')
    <div class="cart mfp-hide" id="cart-popup">

        <div class="cart__title section-title"><span>Корзина</span></div>
        <div class="cart__banner">Купите любые ДВА товара и мы Вам подарим ДУХИ 110мл ! Купите ТРИ и мы подарим Вам ТРИ флакона духов по 110 мл или косметику, на Ваш выбор! <a href="promotion.html">Подробнее:</a> <span class="cart__banner-promo-link">Акция 1 + 1 =</span></div>
        <ul class="cart__product-list">
        </ul>
    </div>


    @endsection