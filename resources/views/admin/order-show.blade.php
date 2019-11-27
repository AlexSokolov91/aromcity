@extends('.layouts.admin')
    @section('content')
    <table>
        <div class="container">
        <h1>ID заказа {{$order->id}}</h1>
            <form action="{{route('orders.update' , $order->id)}}" method="post">
                @method('PUT')
                <div class="row">
                    <div class="col-3"> Имя
                        <input type="text" class="form-control" name="client_name" value="{{$order->client_name}}">
                    </div>
                    <div class="col-3"> Телефон
                        <input type="text" class="form-control" name="client_phone" value="{{$order->client_phone}}">
                    </div>
                    <div class="col-lg-3"> Статус заказа
                        <select class="form-control" name="order_status">
                            <option selected>{{$order->order_status}}</option>
                            @foreach($status as $item)
                                <option  value="{{$item}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-3"></div>
                    @foreach($orderProducts as $product)
                {{--@dd($product->product)--}}
                    <div class="col-lg-3" style="margin-top: 15px"> Товар
                        <select class="form-control">
                                <option selected>{{$product->product->name}}</option>
                            @foreach($products as $item)
                            <option name="name" value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                        <div class="col-lg-2" style="margin-top: 15px">Колличество
                            <input type="text" value="{{$product->quantity}}" class="form-control" name="quantity">
                        </div>

                        <div class="col-lg-2" style="margin-top: 15px">Цена за шт.
                            <input type="text" value="{{$product->product->price}}" class="form-control" name="price">
                        </div>
                    @endforeach
                 <div class="col-1"></div><div class="col-1"></div><div class="col-1"></div>
                    <div class="col-lg-2" style="margin-top: 15px"> <span style="color: #2a9055">Общая стоимость</span>
                        <input type="text" value="{{$order->total_price}}" class="form-control" name="price">
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
{{--@dd($status)--}}
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
