@extends('.layouts.admin')
    @section('content')
        {{--@dd($roleUser1)--}}
        <span style="margin-left: 10px ; font-size:25px"> Пользователь {{$user->email}} </span>
        <form action="{{route('users.update' , $user->id)}}" method="post">
        @method('PUT')
            <input type="hidden" value="{{$userId->user_id}}">
            <div class="form-row">
                <div class="col-4"><span style="margin-left: 10px"> Имя пользователя </span>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                </div>
                <div class="col-4"><span style="margin-left: 10px"> Email </span>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                </div>
                <div class="col"> Роль
                    <div class="dropdown" style="margin-top: 11px">
                        <select name="role_id" id="role_id">

                            @foreach($role as $name)
                                <option action="" value="{{$name->id}}">{{$name->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
            </div>
            <br>
            <input type="submit"  value="Сохранить"> @csrf
        </form>
    @endsection