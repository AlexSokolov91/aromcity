@extends('.layouts.admin')
@section('content')

    <div class="container">
    <span style="margin-left: 10px ; font-size:25px"> product id {{$product->id}} </span>
    <form action="{{route('products.update' , $product->id)}}" method="post">
        @method('PUT')

        <div class="form-row">
            <div class="col-12"><span style="margin-left: 10px"> Имя товара </span>
                <input type="text" name="name" class="form-control" value="{{$product->name}}">
            </div>
            @if($productCategory != null)
                <div class="col"> Категория
                    <div class="dropdown" style="margin-top: 11px">
                        <select name="category_id" id="category_id">
                            @foreach($productCategory as $category)
                                <option action="{{route('products.update' , $product->category_id)}}" value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="col"> Страна производитель
                <div class="dropdown" style="margin-top: 11px">
                    <select name="country" id="country">
                        @foreach($countries as $country)
                            <option action="{{route('products.update' , $product->id)}}" value="{{$country}}">{{$country}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col"> Тип товара
                <div class="dropdown" style="margin-top: 11px">
                    <select name="type" id="type">
                        @foreach($type as $item)
                            <option action="{{route('products.update' , $product->id)}}" value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col"> Семейство
                <div class="dropdown" style="margin-top: 11px">
                    <select name="family" id="family">
                        @foreach($family as $item)
                            <option action="{{route('products.update' , $product->id)}}" value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col"> Пол
                <div class="dropdown" style="margin-top: 11px">
                    <select name="family" id="family">
                        @foreach($gender as $item)
                            <option action="{{route('products.update' , $product->id)}}" value="{{$item}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12"><span style="margin-left: 10px"> Характеристики(класификация, концентрация и.т.д) </span>
                <input type="text" name="characteristics" class="form-control" value="{{$product->characteristics}}">
            </div>
            <div class="col-12"><span style="margin-left: 10px"> Характеристики (Описание) </span>
                <input type="text" name="characteristics__description" class="form-control" value="{{$product->characteristics__description}}">
            </div>

            <div class="col-6"><span style="margin-left: 10px"> Цена  </span>
                <input type="text" name="price" class="form-control" value="{{$product->price}}">
            </div>
            <div class="col-6"><span style="margin-left: 10px"> Старая цена  </span>
                <input type="text" name="old_price" class="form-control" value="{{$product->old_price}}">
            </div>
            <div class="col-3"><span style="margin-left: 10px"> Размер скидки </span>
                <input type="text" name="discount" class="form-control" value="{{$product->discount}}">
            </div>

            <span style="margin-top: 30px; margin-left: 10px">
                    <div class="radio"  > Популярный товар
                    <input type="radio" action="{{route('products.update' , $product->id)}}"  name="popular" value="1" >Да
                    <input style="margin-left: 15px" type="radio" action="{{route('products.update' , $product->id)}}"  name="popular" value="0">Нет
                    </div>
                </span>
            <input  type="submit"  action="{{route('products.update' , $product->id)}}"  style="color: #2a9055; margin-left: 15px" value="Сохранить изменения">
            @csrf
            @method('put')

        </div>
    </form>
    <h1 style="margin-top: 20px" >Фото</h1>
        <div class="admin-row">
        @method('PUT')
        @foreach($images as $image)
            <div class="admin-item">
                {{--<p class="admin-title"></p>--}}
                <div class="admin-img">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($image->path)}}" class="rounded" alt=""
                         style="+max-height: 110px ; margin-top: 20px">
                                  </div>

                    {{--@dd($image->path)--}}
                <form action="{{route('deletePhoto' , $image->id)}}" method="post" >

                    @csrf
                    @method('DELETE')
                    <input type="submit" type="submit" value="Удалить" onclick="confirm('Вы уверены?') "
                           class="btn btn-sm btn-danger" />
                </form>
            </div>
    </div>
    @endforeach
    <form action="{{route('addNewPhoto' , $product->id)}}" enctype="multipart/form-data" method="post">
       @csrf
        <div class="form-group">
            <label for="exampleFormControlFile1">Загрузить фото</label>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">

            <input type="submit"  value="Сохранить"> @csrf
        </div>
    </form>
         <br> <br>
        </div>
    @endsection