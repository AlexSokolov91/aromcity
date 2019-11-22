
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link  href="{{ asset('css/admin-product.css') }}">
</head>
<body>
<div>

    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            @if(\Illuminate\Support\Facades\Auth::user())
            <nav class="nav nav-pills flex-column flex-sm-row">
                <a class="flex-sm-fill text-sm-center nav-link " href="{{route('brands.index')}}">Бренды</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="{{route('products.index')}}">Товар</a>
                <a class="flex-sm-fill text-sm-center nav-link" href="{{route('categories.index')}}">Категории</a>

                <a class="flex-sm-fill text-sm-center nav-link" href="{{route('admin.navigations')}}">Навигация</a>
                {{--@if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin')--}}
                @if(\Illuminate\Support\Facades\Auth::user()->roles->first()->name == 'Super-Admin')
                <a class="flex-sm-fill text-sm-center nav-link" href="{{route('users.index')}}">Редактирование пользователей</a>
                @endif
                    <ul class="nav nav-pills">
                    <li class="nav-item">

                    </li>
                        @endif
                    {{--<li class="nav-item dropdown">--}}
                        {{--<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Баннеры</a>--}}
                        {{--<div class="dropdown-menu">--}}
                            {{--<a class="dropdown-item" href="{{route('admin.banner')}}">Создание</a>--}}
                            {{--<a class="dropdown-item" href="{{route('admin.banner-show')}}">Редактирование</a>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    {{--<a class="flex-sm-fill text-sm-center nav-link" href="{{route('admin.order')}}">Заказы</a>--}}
                </ul>
            </nav>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                        @endif
                    {{--@if (Route::has('register'))--}}
                    {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                    {{--</li>--}}
                    {{--@endif--}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
    <main class="py-4">
        @yield('content')

    </main>
</div>
</body>
</html>
