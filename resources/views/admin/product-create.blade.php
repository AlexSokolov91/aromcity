@extends('.layouts.admin')
    @section('content')
        <div class="jumbotron">
            <h2>Создание товара</h2>

            <form action="{{route('products.store')}}" method="post">
                <div class="form-row">
                    <div class="col-3"><span style="margin-left: 10px"> Имя товара </span>
                        <input type="text" name="name" class="form-control" >
                    </div>
                    {{--@if($productCategory != null)--}}
                    <div class="col"> Категория
                        <div class="dropdown" style="margin-top: 11px">
                            <select name="category_id" id="category_id">
                                @foreach($categoryProduct as $category)
                                    <option action="{{route('products.create')}}" value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col"> Бренд
                        <div class="dropdown" style="margin-top: 11px">
                            <select name="brand_id" id="brand_id">
                                @foreach($brand as $item)
                                    <option action="{{route('products.create')}}" value="{{$item->id}}">{{$item->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col"> Страна
                        <div class="dropdown" style="margin-top: 11px">
                            <select name="country" id="country_id">
                                @foreach($countries as $country)
                                    <option action="{{route('products.create')}}" value="{{$country}}">{{$country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col"> Тип товара
                        <div class="dropdown" style="margin-top: 11px">
                            <select name="type" id="type">
                                @foreach($type as $item)
                                    <option action="{{route('products.create' )}}" value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col"> Семейство
                        <div class="dropdown" style="margin-top: 11px">
                            <select name="family" id="family">
                                @foreach($family as $item)
                                    <option action="{{route('products.create')}}" value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col"> Пол
                        <div class="dropdown" style="margin-top: 11px">
                            <select name="gender" id="gender">
                                @foreach($gender as $item)
                                    <option action="{{route('products.create')}}" value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col"> Объем
                        <div class="dropdown" style="margin-top: 11px">
                            <select name="volume" id="volume">
                                @foreach($volume as $item)
                                    <option action="{{route('products.create')}}" value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12"><span style="margin-left: 10px"> Характеристики(класификация, концентрация и.т.д) </span>
                        <input type="text" name="characteristics" class="form-control" value="{{old('characteristics')}}">
                    </div>
                    <div class="col-12"><span style="margin-left: 10px"> Характеристики (Описание) </span>
                        <input type="text" name="characteristics__description" class="form-control" value="{{old('characteristics__description')}}">
                    </div>

                    <div class="col-6"><span style="margin-left: 10px"> Цена  </span>
                        <input type="text" name="price" class="form-control" value="{{old('price')}}">
                    </div>
                    <div class="col-6"><span style="margin-left: 10px"> Старая цена  </span>
                        <input type="text" name="old_price" class="form-control" value="{{old('old_price')}}">
                    </div>
                    <div class="col-3"><span style="margin-left: 10px"> Размер скидки </span>
                        <input type="text" name="discount" class="form-control" value="{{old('discount')}}">
                    </div>
                    <div class="form-row">
                        <div class="col-6"><span style="margin-left: 10px"> Артикуль </span>
                            <input type="text" name="article" class="form-control" >
                        </div>
                    </div>
                    <span style="margin-top: 30px; margin-left: 10px">
                    <div class="radio"  > Популярный товар
                    <input type="radio"  name="popular" value="1" >Да
                    <input style="margin-left: 15px" type="radio" name="popular" value="0">Нет
                    </div>
                </span>
                    <input  type="submit" action="" style="color: #2a9055; margin-left: 15px" value="Сохранить изменения">
                    @csrf
                </div>

            </form>
            <h1 style="margin-top: 20px" >Фото</h1>
            <div class="admin-row">
                <div class="admin-item">
                    <p class="admin-title"></p>
                    <div class="admin-img">
                        <img src="" class="rounded" alt=""
                             style="max-height: 110px ; margin-top: 20px">
                    </div>
                </div>
            </div>
            <form action="" enctype="multipart/form-data" method="post">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Загрузить фото</label>
                    <input type="submit"  value="Сохранить"> @csrf
                </div>
            {{--</form>--}}
            <br> <br>
        </div>
    @endsection