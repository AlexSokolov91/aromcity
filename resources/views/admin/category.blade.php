@extends('.layouts.admin')
    @section('content')
        <table class="table">
            <thead>
            <tr>

                <th scope="col">Название</th>
                <th scope="col">Дата создания</th>
                @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin' ||\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Admin')
                    <th scope="col">Редактировать</th>
                    <th scope="col">Удалить</th>
                @endif
            </tr>
            </thead>

            <tbody>
            {{--            @dd(\Illuminate\Support\Facades\Auth::user()->roles->first()->name)--}}

            @foreach($categories as  $category)
                {{--@dd($categories , $categoryEdit)--}}
                <tr>
                    {{--<th scope="row"></th>--}}
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin' || \Illuminate\Support\Facades\Auth::user()->roles->first()->name =='Admin')
                            <a href="{{route('categories.edit', $category->id)}}" data-toggle="modal"
                               data-target="#modal-{{$category->id}}">Редактировать</a></td>
                    <div class="modal fade" id="modal-{{$category->id}}" tabindex="-1" role="form" aria-labelledby="modal"
                         aria-hidden="true">
                        <div class="modal-dialog" role="form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dissmis="modal2" aria-hidden="true">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <form action="{{route('categories.update' , $category->id)}}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('put')
                                        <input type="text" name="name" class="col-12">
                                        <input type="hidden" value="{{$category->id}}" name="id">
                                        <button class="btn-success btn" type="submit">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <td>
                        <form method="post" action="{{route('categories.destroy' , $category->id)}}">@csrf
                            @method('DELETE')

                            <button type="submit"> Удалить</button>
                        </form>
                    </td>
                    @endif
                    @endforeach
                    {{--@else--}}
                    {{--@endif--}}
                </tr>
                <tr>
            </tbody>
        </table>
        @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin' || \Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Admin')
            <a href="" data-toggle="modal" data-target="#modal1" style="margin-left: 50px"> Добавить </a>
            <div class="modal fade" id="modal1" tabindex="-1" role="form" aria-labelledby="modal" aria-hidden="true">
                <div class="modal-dialog" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Название бренда</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('categories.store')}}" method="post">@csrf
                                {{--@if(auth()->user())--}}
                                {{--@dd(auth()->user())--}}
                                <input type="text" name="name" class="col-12">
                                {{--@dd($request->session()->all());--}}
                                {{--<input type="hidden" value="{{auth()->user()->id}}" name="user_id">--}}
                                <button class="btn-success btn" type="submit">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            </div>

    @endsection