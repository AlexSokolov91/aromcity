@extends('.layouts.app')
@section('product-content')
    @include('header')
    @include('.breadcrums')


    <div class="categories">
        <div class="container flex-container">
    <!-- breadcrumbs-ended -->

    <!-- categories-begins -->
    @include('.filters')
            <div class="main-container">
                <h2 class="section-title categories-title">
            <span class="section-title-fixed">Женские духи</span>
        </h2>
        <div class="product-list-3">
            @foreach($allFemaleProduct as $product)
                <div class="product" >
                    <div class="product__sale">
                        <span class="product__sale-text">sale</span>
                    </div>
                    <div class="product__discount discount-75">
                        <span class="product__discount-text">-50%</span>
                    </div>
                    <div class="product__img">
                        @if(!empty($product->images->path))
                        <a href="{{route('product.show' , $product->id)}}">
                            <img src="{{$product->images->path}}" alt="" class="img-fluid">
                       @endif
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
                    {{--@include('product')--}}

        </div>
    </div>
        </div>


    <!-- pagination-begins -->
{{--@dd($pages)--}}
    {{--<ul class="pagination">--}}

            {{--<li class="previous"><a href=""><span class="fa fa-angle-left"></span></a></li>--}}

        {{--<li class="active"><a href="#">1</a></li>--}}

        {{--{{$filter->links()}}--}}
        {{--@if(!empty($filter))--}}
            {{--{{$filter->links()}}--}}
        {{--@else--}}
            {{--<span class="test"> {{$allFemaleProduct->links()}} </span>--}}
        {{--@endif--}}
        {{--<li><a href="#">{{$allFemaleProduct->links()}}</a></li>--}}
        {{--<li><a href="#">3</a></li>--}}
        {{--<li><a href="#">4</a></li>--}}
        {{--<li><a href="#">5</a></li>--}}
        {{--<li><a href="#"><span>...</span></a></li>--}}
        {{--<li><a href="#">26</a></li>--}}
        {{--<li class="next"><a href="#"><span class="fa fa-angle-right"></span></a></li>--}}

    {{--</ul>--}}

    <!-- pagination-ended -->

    </div>
    <!-- categories-ended -->

    <!-- footer-begins -->



    <!-- footer-ended -->

    <!-- cart-begins -->

    <div class="cart mfp-hide" id="cart-popup">

        <div class="cart__title section-title"><span>Корзина</span></div>
        <div class="cart__banner">Купите любые ДВА товара и мы Вам подарим ДУХИ 110мл ! Купите ТРИ и мы подарим Вам ТРИ флакона духов по 110 мл или косметику, на Ваш выбор! <a href="/promotion.html">Подробнее:</a> <span class="cart__banner-promo-link">Акция 1 + 1 =</span></div>

        <ul class="cart__product-list">

            <!-- <li><div class="cart-is-empty">В корзине пусто</div></li> -->
        </ul>



    </div>

    <!-- cart-ended -->

    <!-- callback-begins -->

    <div class="callback mfp-hide" id="callback-popup">

        <div class="callback__title">Заказ обратного звонка</div>

        <form action="" class="callback__form">
            <label for="name_first">Имя</label>
            <input type="text" name="name_first" placeholder="Введите имя" class="g-input">
            <label for="phone">Телефон *</label>
            <input type="text" name="phone" placeholder="Номер телефона" class="g-input">
            <input type="submit" class="g-btn" value="Заказать">
        </form>

    </div>

    <!-- callback-ended -->

    <!-- policy-begins -->
@include('footer')
    @section('scripts')
    <script src="{{asset('js/script.js')}}"> </script>
    <script src="{{asset('js/addToCart.js')}}"></script>
        @endsection
@endsection
