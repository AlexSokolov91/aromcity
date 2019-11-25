@extends('.layouts.admin')
    @section('content')
    <table>
        <div class="container">
        <h1>ID заказа {{$order->id}}</h1>
            <form>
                <div class="row">
                    <div class="col-3"> Имя
                        <input type="text" class="form-control" name="client_name" value="{{$order->client_name}}">
                    </div>
                    <div class="col-3"> Телефон
                        <input type="text" class="form-control" name="client_phone" value="{{$order->client_phone}}">
                    </div>

@dd($wh)

                    <div class="col-6">
                    </div>
                    @foreach($orderProducts as $product)
                {{--@dd($product->product)--}}
                    <div class="col-lg-3" style="margin-top: 15px"> Товар
                            {{--<label for="inputState">State</label>--}}
                        <select class="form-control">
                                <option selected>{{$product->product->name}}</option>
                            @foreach($products as $item)
                            <option name="name" value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                        </select>
                    </div>
                        <div class="col-lg-2" style="margin-top: 15px">Колличество
                            {{--<label for="inputZip">Колличество</label>--}}
                            <input type="text" value="{{$product->quantity}}" class="form-control" name="quantity">
                        </div>

                        <div class="col-lg-2" style="margin-top: 15px">Цена за шт.
                            {{--<label for="inputZip">Колличество</label>--}}
                            <input type="text" value="{{$product->product->price}}" class="form-control" name="price">
                        </div>
                    @endforeach
                    <div class="col-3">
                    </div>
                    <div class="col-lg-2" style="margin-top: 15px"> <span style="color: #2a9055">Общая стоимость</span>
                        {{--<label for="inputZip">Колличество</label>--}}
                        <input type="text" value="{{$order->total_price}}" class="form-control" name="price">
                    </div>
                </div>
                    <h2 style="color: #2a9055; margin-top: 15px">Информация о доставке</h2>
                <div class="col-lg-3" style="margin-top:15px"> Выберите регион
                    <select class="form-control">
                        <option selected></option>
                        {{--@foreach($products as $item)--}}
                        <option name="warehouse" value=""></option>
                        {{--@endforeach--}}
                    </select>
                </div>

                <div class="col-lg-3" style="margin-top:15px"> Отделение новой почты
                    <select class="form-control">
                        <option selected></option>
                        {{--@foreach($products as $item)--}}
                            <option name="warehouse" value=""></option>
                        {{--@endforeach--}}
                    </select>
                </div>

            </form>
        </div>
    </table>

        {{--<script>--}}
            {{--$("")--}}
        {{--</script>--}}
    @endsection