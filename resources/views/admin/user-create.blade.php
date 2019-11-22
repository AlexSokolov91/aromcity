@extends('.layouts.admin')
    @section('content')
        <div class="jumbotron">
            <h2>Создание пользователя</h2>


        <form action="{{route('users.store')}}" method="post">
            @if (count($errors) >0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="form-row">
                <div class="col-3"><span style="margin-left: 10px"> Имя пользователя </span>
                    <input type="text" name="name" id="name" class="form-control" >
                    </div>
                    <div class="col-3"><span style="margin-left: 10px"> Email </span>
                    <input type="text" name="email" class="form-control" id="email" >
                </div>
                <div class="col-2"><span style="margin-left: 10px"> Пароль </span>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="col"> Роль
                    <div class="dropdown" style="margin-top: 11px">
                        <select name="role_id" id="role_id">
                            @foreach($roles as $role)
                                <option action="{{route('users.create')}}" value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            <br>
            <input type="submit"  value="Создать"> @csrf
            </form>
        </div>
    @endsection