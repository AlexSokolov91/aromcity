<div class="main-nav__wrap">
    <div class="container main-nav-container">
            <div class="logo">
                <a href="{{route('index')}}">
                    <img src="{{$logo}}" alt="" class="img-fluid">
                </a>
            </div>

        {{--@dd($categories)--}}
        <div class="main-nav__wrapper">
            <ul class="main-nav">
                @if(app()->getLocale() == 'ru')
                    @foreach($navigations->where('active') as $item)
            {{--@dd($navigations)--}}
                    {{--@if($item->activ != 0)--}}
                        <li class="main-nav__item"><a href="{{route($item->route_name, app()->getLocale())}}">{{$item->title}}</a></li>

                {{--@endif--}}
                    @endforeach
                @endif
                {{--@else--}}
               @if(app()->getLocale() == 'en')

                    @foreach($navigations = \App\Models\NavigationEn::all() as $navigate)
                    <li class="main-nav__item"><a href="{{route($navigate->route_name, app()->getLocale())}}">{{$navigate->title}}</a></li>
                    @endforeach
                        @endif

                    <li class="main-nav__item dropdown">
                     <a href="category.html">@lang('navigation.Бренды')<i class="fa fa-angle-down fa-fw"></i></a>
                   <ul class="sub-nav">
                       @foreach($brands as $brand)
                        <span class="space-filler"></span>
                        <li><a href="{{route('brand.show' , $brand->id)}}">{{$brand->brand_name}}</a></li>
                       @endforeach
                   </ul>
                </li>
                <li class="main-nav__item"><a href="{{route('stocks')}}">@lang('navigation.Акции')</a></li>
                <li class="main-nav__item"><a href="{{route('delivery')}}">@lang('navigation.Доставка')</a></li>
                <li class="main-nav__item"><a href="{{route('contact')}}">@lang('navigation.Контакты')</a></li>
                <li class="main-nav__item"><a href="{{route('review')}}">@lang('navigation.Отзывы')</a></li>
            </ul>
        </div>

        <a href="javascript:void(0);" class="main-nav-toggle"><span></span></a>


        <div class="dropdown">
            <div class="dropbtn">RU</div>
            <div class="dropdown-content">



                <a href="/setlocale/ru" class="lang" data-value="RU">RU</a>

                <a href="/setlocale/en" class="lang" data-value="EN">EN</a>
                {{--<a href="{{route(\Illuminate\Support\Facades\Route::currentRouteName(),  'en')}}">EN</a>--}}
            </div>
        </div>
        </div>
    </div>
