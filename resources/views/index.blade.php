@extends('.layouts.app')

{{--@section('style')--}}
    {{--<link rel="stylesheet" href="/css/styles.css">--}}
    {{--<link rel="stylesheet" href="/css/libs.min.css">--}}
{{--@endsection--}}
@section('product-content')
    @include('.header')
    @include('slider')
    @include('popularProduct')
    @include('footer')
    @endsection