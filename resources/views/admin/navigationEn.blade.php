@extends('.layouts.admin')
    @section('content')
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <table id="table">
            <tr>
                <th> <h2> <span style="margin-left: 10px"> Категории: </span></h2> </th>
                <th> <span style="margin-left: 100px"> Активная (нет/да) </span> </th>
                <th> <span style="margin-left: -90px"> Сохранить </span> </th>
            @foreach($navigationsEn as $navigate)
                <tr>
                    <form action="" name="active" method="post" >
                        @method('put')
                        @csrf
                        <th id="title" scope="row" style="color: #2a9055"><span style="margin-left: 20px">{{($navigate->title)}}</span></th>
                        <th>  <div class="form-check form-check-inline" style="margin-left: 115px">
                                <input class="form-check-input" type="radio" name="active" id="{{$navigate->id}}" value="0">
                                <label class="form-check-label" for="inlineRadio1">Нет</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="active" id="{{$navigate->id}}" value="1">
                                <label class="form-check-label" for="inlineRadio2">Да</label>
                            </div>
                            <button style="margin-left: 60px" type="submit">Сохранить</button>
                        </th>
                    </form>


                    </th>
                </tr>
            @endforeach
            <br>
        </table>
        <br>
        <span style="margin-left: 20px"> <tr> <a href="{{route('admin.navigations')}}">Русская навигация</a> </tr> </span>
    @endsection