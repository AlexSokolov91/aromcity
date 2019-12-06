<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <!-- <base href="/"> -->
    <title>Arom - City</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom Browsers Color Start -->
    <meta name="theme-color" content="#333">
    <!-- Custom Browsers Color End -->

    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/styles.css">


</head>
<body>

<!-- Custom HTML -->

<!-- header-begins -->

<header>
    @include('.navigation')
</header>
@include('header')
@yield('product-content')

{{--@yield('female')--}}


@include('.footer')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/libs.min.js')}}"></script>
<script src="{{asset('js/addToCart.js')}}"></script>
@yield('cart')
@yield('scripts')
@yield('viewCart')
</body>
</html>
