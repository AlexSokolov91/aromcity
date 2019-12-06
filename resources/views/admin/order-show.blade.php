@extends('.layouts.admin')
    @section('content')
    <table>
        <div class="container">
        <h1>ID заказа {{$order->id}}</h1>
            <form action="{{route('orders.update' , $order->id)}}" method="post">
                @method('PUT')
                <div class="row">
                    <div class="col-12"> Имя
                        <input type="text" class="form-control" name="client_name" value="{{$order->client_name}}">
                    </div>
                    <div class="col-12"> Телефон
                        <input type="text" class="form-control" name="client_phone" value="{{$order->client_phone}}">
                    </div>
                    <div class="col-lg-12"> Статус заказа
                        <select class="form-control" name="order_status">
                            <option selected>{{$order->order_status}}</option>
                            @foreach($status as $item)
                                <option  value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-12"></div>
                    @foreach($orderProducts as $product)

                        <input type="hidden" value="{{$product->order_id}}" class="form-control" name="products[{{$product->id}}][order_product_id]">
                    <div class="col-lg-12" style="margin-top: 15px"> Товар
                        {{--<input type="text" readonly name="products[{{$product->id}}][product_id]" value="{{$product->name}}" class="form-control">--}}
                        <select  name="products[{{$product->id}}][product_id]" class="form-control">
                            @foreach($products as $item)
                            <option @if($item->id == $product->product_id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    <form method="post" action="{{route('admin-order-destroy-product' , $product->id)}}">
                        @method('delete')
                        @csrf
                       <button class="danger"> Удалить товар </button>
                    </form>
                        <a href="" data-toggle="modal" data-target="#modal1" style="margin-left: 50px"> Добавить </a>
                    </div>
                        <div class="col-lg-1" style="margin-top: 15px">Колличество
                            <input type="text" value="{{$product->quantity}}" class="form-control" name="products[{{$product->id}}][quantity]"></div>
                        <div class="col-lg-2" style="margin-top: 15px">Цена за шт.
                            <input type="text" name="products[{{$product->id}}][price]" value="{{$product->product->price}}" class="form-control"></div>
                    @endforeach
                 <div class="col-1"></div><div class="col-1"></div><div class="col-1"></div>
                    <div class="col-lg-2" style="margin-top: 15px"> <span style="color: #2a9055">Общая стоимость</span>
                        <input type="text" value="{{$sum}}" class="form-control" name="total_price">
                    </div>
                </div>
                    {{--<div  style="margin-left: 205px"></div>--}}

                    <h2 style="color: #2a9055; margin-top: 15px">Информация о доставке</h2>
                <div class="row">
                <div class="col-lg-3" style="margin-top:15px"> Выберите регион
                    <select class="form-control" id="cities" name="city">
                        <option selected>{{$order->city}}</option>
                        @foreach($cities['data'] as $city)
                        <option id="cities" name="city" value="{{$city['DescriptionRu']}}" data-value="{{$city['Ref']}}">{{$city["DescriptionRu"]}}</option>
                        @endforeach
                    </select>
                </div>
                @csrf
                <div class="col-lg-3" style="margin-top:15px"> Отделение новой почты
                    <select class="form-control" id="warehouse" name="warehouse">
                        <option selected>{{$order->warehouse}}</option>
                    </select>
                </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Комментарий к заказу</label>
                    <textarea class="form-control" name="comments" rows="4">{{$order->comments}}</textarea>
                </div>
            <button class="btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </table>


    <div class="modal fade" id="modal1" tabindex="-1" role="form" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog" role="form">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Добавление товара в заказ</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.order-create-product')}}" method="post">@csrf
                        Товар

                        <input type="hidden" name="order_id" value="{{$order->id}}">

                        <select class="form-control" name="product_id">
                            @foreach($products as $product)
                                <option @if($product->id == $product->product_id) selected @endif  value="{{$product->id}}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        @foreach($products as $product)
                            <input type="hidden" name="one_unit_price" value="{{$product->price}}">
                        @endforeach
                            <input type="number" placeholder="Колличество товара" name="quantity" class="col-4">

                        <br>
                        <button class="btn-success btn" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>


    <script>
        $("#cities").change(function () {
            var getCities = $("#cities option:selected").attr('data-value');
            // console.log(getCities);
            $.ajax({
                url: 'http://aromcity/api/getCities',
                type: "get",
                data: {
                    "getCities": getCities
                },
                success: function(data){
                    var overhouse,
                        otdelenie,
                        valueRef;
                    $(data).each(function(index, el){
                        var index_city = el.data;
                        // console.log(el.data.length);


                        for (var i = 0; i < index_city.length; i++) {
                            overhouse = index_city[i];
                            otdelenie = index_city[i].Description;
                            valueRef = index_city[i].Ref;

                            $("#warehouse").append(`<option name="warehouse" id="warehouse" data-value="${valueRef}">
                                      ${otdelenie}
                                  '</option>`);
                        }
                        $("#cities").change(function () {
                            $("#warehouse").empty();
                        })
                    });
                }
            });
        });
    </script>
    @endsection
