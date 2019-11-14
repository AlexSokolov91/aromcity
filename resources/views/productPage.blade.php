@extends('.layouts.app')

@section('product-content')
    @include('header')
    @include('.breadcrums')
    <div class="categories">
        <div class="container flex-container">


    <div class="main-container">
        <h2 class="section-title categories-title">
            <span class="section-title-fixed"></span>
        </h2>
        <div class="product-list-3">
            @foreach($allBrandProducts as $product)

                <div class="product" >
                    <div class="product__sale">
                        <span class="product__sale-text">sale</span>
                    </div>
                    <div class="product__discount discount-75">
                        <span class="product__discount-text">-50%</span>
                    </div>
                    <div class="product__img">
                        <a href="{{route('products.show' , $product->id)}}">
                            <img src="{{$product->images->path}}" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="product__title">{{$product->name}}</div>
                    <div class="product__title-descr">{{$product->type}}</div>
                    <div class="product__rating">
          <span id="" class="rating" data-val="3.83" data-stars='5' data-input=".rating-value" data-change="false">
            <input type="hidden" name="" class="rating-value" size="5">
          </span>
                        <span class="rating-value-number">3.83</span>
                    </div>
                    <div class="product__price">
                        <span class="old-price">{{$product->old_price}}грн</span>
                        <span class="new-price">{{$product->price}}грн</span>
                    </div>
                    <a href="#cart-popup" data-href="{{route ('add_cart', $product->id)}}" class="g-btn g-btn--product add-to-cart"><i class="product-cart-icon"></i>Купить со скидкой</a>
                </div>
            @endforeach
                <div class="cart mfp-hide" id="cart-popup">

                    <div class="cart__title section-title"><span>Корзина</span></div>
                    <div class="cart__banner">Купите любые ДВА товара и мы Вам подарим ДУХИ 110мл ! Купите ТРИ и мы подарим Вам ТРИ флакона духов по 110 мл или косметику, на Ваш выбор! <a href="/promotion.html">Подробнее:</a> <span class="cart__banner-promo-link">Акция 1 + 1 =</span></div>

                    <ul class="cart__product-list">

                        <!-- <li><div class="cart-is-empty">В корзине пусто</div></li> -->
                    </ul>
                </div>
            {{--@include('product')--}}
            </div>
          </div>
        </div>
        @include('footer')
        @section('scripts')
            <script src="{{asset('js/addToCart.js')}}"></script>
@endsection
    @endsection