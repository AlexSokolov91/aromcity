@extends('.layouts.admin')
{{--@dd($createBrends)--}}
    @section('content')
        <table class="table">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Название</th>
                <th scope="col">Дата создания</th>
                @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin' ||\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Admin')
                <th scope="col">Редактировать</th>
                <th scope="col">Удалить</th>
            @endif
            </tr>
            </thead>
            <tbody>
                @foreach($brands as  $brand)
                {{--@dd($categories , $categoryEdit)--}}
                <tr>
                    <th scope="row">{{$brand->id}}</th>
                    <td>{{$brand->brand_name}}</td>
                    <td>{{$brand->created_at}}</td>
                    <td>
                        @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin' || \Illuminate\Support\Facades\Auth::user()->roles->first()->name =='Admin')
                        <a href="{{route('brands.edit', $brand->id)}}" data-toggle="modal"
                           data-target="#modal-{{$brand->id}}">Редактировать</a></td>
                    <div class="modal fade" id="modal-{{$brand->id}}" tabindex="-1" role="form" aria-labelledby="modal"
                         aria-hidden="true">
                        <div class="modal-dialog" role="form">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dissmis="modal2" aria-hidden="true">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('brands.update' , $brand->id)}}" method="post">
                                    <div class="modal-body">
                                        @csrf
                                        @method('put')
                                        <input type="text" name="brand_name" class="col-12">
                                        <input type="hidden" value="{{$brand->id}}" name="id">
                                        <button class="btn-success btn" type="submit">Сохранить</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                        <td>
                            <form method="post" action="{{route('brands.destroy' , $brand->id)}}">@csrf
                                @method('DELETE')
                                <button type="submit"> Удалить</button>
                            </form>
                        </td>
                    @endif
                    @endforeach
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
                        <form action="{{route('brands.store')}}" method="post">@csrf
                                <input type="text" name="brand_name" class="col-12">
                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                            <button class="btn-success btn" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endsection