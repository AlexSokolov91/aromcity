

    @foreach($products as $product)
        {{--@dd($product)--}}
        @csrf
        <input type="hidden" name="product_id[]"   value="{{$product->id}}">
        <li class="cart__product">

            <div class="cart__product-links">
                <div class="cart__product-img">
                    <a href="javascript:void(0);"><img src="{{\Illuminate\Support\Facades\Storage::url($product->attributes->images['path'], $product->id)}}" alt=""></a>
                </div>
                <div class="cart__product-title">
                    <a href="javascript:void(0);">{{$product->name, $product->id}}</a>
                </div>
            </div>
            <div class="cart__product-price">{{$product->price, $product->id}} грн</div>
            <div class="responsive-devider"></div>
            <select  data-price="{{$product->price}}" name='quantity[]' class="cart__product-amount" id="cart__product-amount">
                @for($i =1; $i <= 10; $i++)
                    <option value="{{$i}}" data-price="{{$product->price}}" id="select" selected>{{$i}} шт</option>
                    {{--<input type="hidden" name="quantity" value="{{$i}}">--}}
                @endfor
            </select>
            <input type="hidden" name="total_price" value="{{$total}}">
            <div class="cart__product-total">{{\Cart::get($product->id)->getPriceSum()}} грн</div>
            <a class="cart__product-remove" href="{{route('cart.remove',  $product->id)}}"> </a>
        </li>
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/calc.js')}}"></script>
@endforeach