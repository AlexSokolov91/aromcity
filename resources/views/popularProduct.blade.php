
<section class="features">
    <div class="container">

        <h2 class="section-title features-title"><span class="section-title-fixed">ХИТЫ ПРОДАЖ</span></h2>

        <div class="features-products product-list-4">
        @foreach($populars as $product)
                @if(($product->popular  !=0))
            <div class="product">
                <div class="product__sale">
                    <span class="product__sale-text">sale</span>
                </div>
                <div class="product__discount discount-75">
                    <span class="product__discount-text">-50%</span>
                </div>
                <div class="product__img">
                    <a href="product.html">
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
                    <span class="old-price">{{$product->old_price}} грн</span>
                    <span class="new-price">{{$product->price}}грн</span>
                </div>
                <a href="{{ route('add_cart' ,[app()->getLocale(), $product->id])}}" class="g-btn g-btn--product add-to-cart"><i class="product-cart-icon"></i>Купить со скидкой</a>
            {{--</div>--}}

        @endif
        </div>
    @endforeach
        </div>
    </div>
</section>

