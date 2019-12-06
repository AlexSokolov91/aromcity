@extends('.layouts.admin')
    @section('content')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Имя товара</th>
                    <th scope="col">Просмотр</th>
            </tr>
            </thead>
          <tbody>
          @foreach($products as  $product)
              <tr>
                  <td>{{$product->name}}</td>
                  <td><a href="{{route('admin-comment-show-product' , $product->id)}}">Просмотр</a></td>


              </tr>
            @endforeach
        </table>

    @endsection