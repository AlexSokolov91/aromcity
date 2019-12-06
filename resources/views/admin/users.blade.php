@extends('.layouts.admin')
    @section('content')
        <table class="table">
            <thead>
            <tr>

                <th scope="col">Пользователь</th>
                <th scope="col">Почта</th>
                <th scope="col">Роль</th>
                <th scope="col">Дата создания</th>
                @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin')
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                @endif
            </tr>
            </thead>
            {{--<tbody>--}}
            {{--@dd($users)--}}
         @foreach($users as  $user)
                @if($user->role_user->role_id !=1)
                <tr>
                    {{--<th scope="row"></th>--}}
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role_user->role_id}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>

                        @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin')
                            <a href="{{route('users.show', $user->id)}}">Редактировать</a></td>
                    <td>
                        <form method="post" action="{{route('users.destroy' , $user->id)}}">@csrf
                            @method('DELETE')

                            <button type="submit"> Удалить</button>
                        </form>
                    </td>
                @endif
                @endif

            @endforeach
        </table>
        <a href="{{route('admin.create-user')}}" style="margin-left: 50px"> Добавить </a>
    @endsection