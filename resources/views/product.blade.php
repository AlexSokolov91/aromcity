
    @foreach($filter as $product)
        <div class="product">
            <div class="product__sale">
                <span class="product__sale-text">sale</span>
                </div>
            <div class="product__discount discount-75">
                <span class="product__discount-text">-50%</span>
                 </div>
            <div class="product__img">
                <a href="{{ route('products.show' , $product->id)}}">
                   @if(!empty($product->images->path))
                    <img src="{{\Illuminate\Support\Facades\Storage::url($product->images->path)}}" alt="" class="img-fluid">
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
            <a href="{{route('add_cart' , $product->id)}}" class="g-btn g-btn--product add-to-cart"><i class="product-cart-icon"></i>Купить со скидкой</a>
        </div>
        @endforeach


