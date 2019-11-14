@extends('.layouts.admin')

    @section('content')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Категория</th>
                <th scope="col">Товар</th>
                <th scope="col">Популярный</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Редактировать </th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as  $product)
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->popular}}</td>
                    <td>{{$product->created_at}}</td>
                    <td><a href="{{route('products.show' , $product->id)}}">Редактировать</a> </td>
                    <form method="post" action="{{route('products.destroy' , $product->id)}}">@csrf
                        @method('DELETE') <td><button type="submit"> Удалить </button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('products.create')}}" style="margin-left: 50px"> Добавить </a>
    @endsection