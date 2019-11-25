@extends('.layouts.admin')
    @section('content')
    {{--@dd($orders)--}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Имя</th>
            <th scope="col">Телефон</th>
            <th scope="col">Сумма</th>
            <th scope="col">Статус</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Просмотр</th>
        </tr>
        </thead>
        @foreach($orders as $order)
        <tr>
            {{--<th scope="row"></th>--}}
            <td>{{$order->id}}</td>
            <td>{{$order->client_name}}</td>
            <td>{{$order->client_phone}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->order_status}}</td>
            <td>{{$order->created_at}}</td>
            <td>
                @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin' || 'Admin')
                    <a href="{{route('orders.show', $order->id)}}">Просмотр</a></td>
            @endif
            </td>
            </tr>
            @endforeach
    @endsection