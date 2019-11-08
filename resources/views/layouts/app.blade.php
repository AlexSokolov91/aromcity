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
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/libs.min.js')}}"></script>
@yield('product-content')
{{--@yield('indexPage')--}}
{{--@yield('female')--}}

@yield('cart')
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}

{{--<script src="{{asset('js/countPrice.js')}}"></script>--}}
@yield('scripts')
@yield('viewCart')

{{--@yield('home')--}}
{{--@yield('cart')--}}
{{--<script>--}}
    {{--jQuery('document').ready(function () {--}}
        {{--jQuery('.event').on('click', function (e) {--}}
            {{--jQuery.get(e.target.getAttribute("href"), function (data) {--}}
                {{--jQuery('.cart-total').html(data.count);--}}
            {{--});--}}
            {{--e.preventDefault();--}}
        {{--});--}}
    {{--});--}}

{{--</script>--}}

</body>
</html>
