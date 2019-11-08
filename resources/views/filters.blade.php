@csrf
        <div class="side-container">
            <div class="filters-toggle">ФИЛЬТРЫ <i class="fa fa-angle-double-right"></i></div>
            <div class="catalog-filter-close-btn"></div>
            <div class="side-container-title">ФИЛЬТРЫ</div>
                <div class="catalog-filter">
                    <div class="catalog-filter-block">
                    <div class="catalog-filter-name">Бренд:</div>
                    <form method="post" id="brands" action="{{route('filter.products' ,app()->getLocale())}}">
                    <div class="catalog-filter-list-wrap">
                        <ul class="catalog-checkbox-list">
                            <input type="hidden" name="category_id[]" value="{{$category_id}}">
                            @foreach($brands as $brand)
                                <li class="catalog-checkbox-list__item" id="catalog-checkbox-list__item" value="{{$brand->id}}">
                                <label>{{$brand->brand_name}}
                                    <input type="checkbox" name="brand_id[]" value="{{$brand->id}}">
                                    <span class="checkmark"></span>
                                </label>
                                    </li>
                            @endforeach
                        </ul>
                        </div>

                </div>
                    <div class="catalog-filter-block">
                  <div class="catalog-filter-name">Страна Производитель:</div>
                        {{--<form method="post" id="brands" action="{{route('filter.productsFemale')}}">--}}
                        <div class="catalog-filter-list-wrap">
                    <ul class="catalog-checkbox-list">
                        @foreach($countries as $country)
                        <li class="catalog-checkbox-list__item">
                            <label>{{$country->country}}
                                <input type="checkbox" name="country[]" value="{{$country->country}}">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        @endforeach
                             </ul>
                        </div>
                    </div>
                    <div class="catalog-filter-block">
                        <div class="catalog-filter-name">Семейство (классификация) аромата:</div>
                        <div class="catalog-filter-list-wrap">
                            <ul class="catalog-checkbox-list">
                                @foreach($family as $item)
                                <li class="catalog-checkbox-list__item">
                                    <label>{{$item->family}}
                                        <input type="checkbox" name="family[]" value="{{$item->family}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="catalog-filter-block">
                        <div class="catalog-filter-name">Концентрация:</div>
                        <div class="catalog-filter-list-wrap">
                            <ul class="catalog-checkbox-list">
                                @foreach($type as $item)
                                <li class="catalog-checkbox-list__item">
                                    <label>{{$item->type}}
                                        <input type="checkbox" name="type[]" value="{{$item->type}}">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    </div>
                    </form>
            </div>
        <div class="subscription subscription--small">
            <div class="subscription-wrapper">
                <div class="subscription__text">Подпишись и получи скидку 100грн!</div>
                <form name="" class="subscription__form">
                    <input type="email" value="" name="email" placeholder="Введите ваш еmail...">
                    <button class="g-btn g-btn--subscription">Подписаться</button>
                </form>
            </div>
        </div>
        </div>



