<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>Promarket.lv</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#fafafa">
</head>

<body class="@yield('pageClass') {{__('test')}}">

<header class="header">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="header-burger">
                <img src="{{ asset('assets/img/burger.svg') }}" alt="">
                <img src="{{ asset('assets/img/open.svg') }}" alt="">
            </div>
            <a href="{{route('main-page')}}" class="logotype">
                <img src="{{ asset('assets/img/common/logo.svg') }}" alt="">
            </a>
            <div class="header_navigation">
                <nav>
                    <ul class="header_navigation_wrapper d-flex align-items-center">
                        <li><a href="{{ route('fixing') }}">Ремонт</a></li>
                        <li class="header__shop__link">
                            <a href="#" class="header__collapse">Магазин</a>
                            <div class="shop-dropdown-wrapper">
                                <div class="shop__dropping-element">
                                    <div class="shop__drop__down-tabs-side">
                                        <div class="shop__drop__down-tabs-side-container">
                                            <ul>
                                                @foreach($categories as $category)
                                                    <li>
                                                        <a href="#">
                                                            {{$category->name}}
                                                            <span class="shop__drop__down-chevron-right">
                                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                                     fill="none"
                                                                     xmlns="http://www.w3.org/2000/svg">
                                                                      <g opacity="0.54">
                                                                      <path
                                                                          d="M8.58984 16.59L13.1698 12L8.58984 7.41L9.99984 6L15.9998 12L9.99984 18L8.58984 16.59Z"
                                                                          fill="#202020"/>
                                                                      </g>
                                                                      </svg>

                                                             </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div>

                                            <div class="shop__drop__down-content-side">
                                                @foreach($categories as $category)
                                                    <div class="shop__drop__down-content">
                                                        <div class="shop__drop__down-content-side-header">
                                                <span class="chevron">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.54">
                                        <path d="M20 11H7.83L13.42 5.41L12 4L4 12L12 20L13.41 18.59L7.83 13H20V11Z"
                                              fill="#202020"/>
                                        </g>
                                        </svg>


                                                    </span>
                                                            {{$category->name}}
                                                        </div>
                                                        <div class="menu-wrap">
                                                            <ul>
                                                                @foreach($category->subCategories as $subCategory)
                                                                    <li>
                                                                        <a href="{{route('shop-main' , [$category->code, $subCategory->code])}}">
                                                                            {{$subCategory->name}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="{{route('about')}}">о компании</a></li>
                        <li><a href="{{route('delivery')}}">доставка</a></li>
                        <li><a href="{{route('contacts-page')}}">контакты</a></li>
                    </ul>
                    <!-- <div class="mobile-social-links">
                         <div class="mobile-social-link">
                             <a href="#" class="">
                                 <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                     <path d="M17.2488 0.00478553L14.2663 0C10.9155 0 8.75003 2.22168 8.75003 5.66033V8.27012H5.7512C5.49207 8.27012 5.28223 8.48021 5.28223 8.73934V12.5206C5.28223 12.7798 5.49231 12.9896 5.7512 12.9896H8.75003V22.531C8.75003 22.7902 8.95987 23 9.21901 23H13.1316C13.3908 23 13.6006 22.7899 13.6006 22.531V12.9896H17.1069C17.3661 12.9896 17.5759 12.7798 17.5759 12.5206L17.5773 8.73934C17.5773 8.61492 17.5278 8.49576 17.44 8.40771C17.3522 8.31965 17.2325 8.27012 17.1081 8.27012H13.6006V6.05777C13.6006 4.99442 13.854 4.45462 15.2391 4.45462L17.2483 4.4539C17.5072 4.4539 17.7171 4.24381 17.7171 3.98491V0.473768C17.7171 0.21511 17.5075 0.00526409 17.2488 0.00478553Z"></path>
                                 </svg>
                             </a>
                         </div>
                         <div class="mobile-social-link">
                             <a href="#">
                                 <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                      xmlns="http://www.w3.org/2000/svg">
                                     <path d="M16.6526 0H6.34699C2.84726 0 0 2.8474 0 6.34713V16.6527C0 20.1526 2.84726 22.9999 6.34699 22.9999H16.6526C20.1526 22.9999 22.9999 20.1525 22.9999 16.6527V6.34713C23 2.8474 20.1526 0 16.6526 0ZM20.9593 16.6527C20.9593 19.0274 19.0274 20.9592 16.6527 20.9592H6.34699C3.97248 20.9593 2.04066 19.0274 2.04066 16.6527V6.34713C2.04066 3.97262 3.97248 2.04066 6.34699 2.04066H16.6526C19.0272 2.04066 20.9592 3.97262 20.9592 6.34713V16.6527H20.9593Z"></path>
                                     <path d="M11.4997 5.57373C8.23181 5.57373 5.57324 8.2323 5.57324 11.5002C5.57324 14.768 8.23181 17.4264 11.4997 17.4264C14.7676 17.4264 17.4262 14.768 17.4262 11.5002C17.4262 8.2323 14.7676 5.57373 11.4997 5.57373ZM11.4997 15.3856C9.35717 15.3856 7.6139 13.6426 7.6139 11.5001C7.6139 9.35738 9.35703 7.61425 11.4997 7.61425C13.6424 7.61425 15.3855 9.35738 15.3855 11.5001C15.3855 13.6426 13.6423 15.3856 11.4997 15.3856Z"></path>
                                     <path d="M17.6752 3.84338C17.282 3.84338 16.8958 4.00256 16.6181 4.28145C16.3391 4.55898 16.1787 4.94534 16.1787 5.33987C16.1787 5.73317 16.3392 6.1194 16.6181 6.39829C16.8957 6.67582 17.282 6.83635 17.6752 6.83635C18.0697 6.83635 18.4547 6.67582 18.7336 6.39829C19.0125 6.1194 19.1717 5.73303 19.1717 5.33987C19.1717 4.94534 19.0125 4.55898 18.7336 4.28145C18.4561 4.00256 18.0697 3.84338 17.6752 3.84338Z"></path>
                                 </svg>
                             </a>
                         </div>
                     </div>-->
                </nav>
            </div>
            <div class="header_form_search">
                <form action="{{ route('search') }}" method="GET" class="search_form">
                    <label>
                        <input placeholder="Поиск" type="text" class="form_control" name="query" id="search_text" >
                    </label>
                    <button type="submit" class="search_form_submit">
                        <img src="{{ asset('/assets/img/common/search.svg') }}" alt="">
                    </button>
                    <button type="button" class="close_form_search">
                        <img src="{{ asset('/assets/img/common/close-search.svg') }}" alt="">
                    </button>
                </form>
                <div id="search_list">

                </div>
            </div>
            <div class="language-selection-drop-down">
                <div class="language-selected-text d-flex">
                    <p>
                        {{app()->getLocale()}}
                    </p>
                    <img src="{{ asset('assets/img/common/drop.svg') }}" alt="">
                </div>
                <div class="language-dropdown">
                  <ul>
                     @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="language-selected-text-inner">
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                    </ul>    
                </div>
            </div>
            <div data-media-link="{{route('cart')}}" class="header_cart">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="">
                        <path
                            d="M15.55 13C16.3 13 16.96 12.59 17.3 11.97L20.88 5.48C21.25 4.82 20.77 4 20.01 4H5.21L4.27 2H1V4H3L6.6 11.59L5.25 14.03C4.52 15.37 5.48 17 7 17H19V15H7L8.1 13H15.55ZM6.16 6H18.31L15.55 11H8.53L6.16 6ZM7 18C5.9 18 5.01 18.9 5.01 20C5.01 21.1 5.9 22 7 22C8.1 22 9 21.1 9 20C9 18.9 8.1 18 7 18ZM17 18C15.9 18 15.01 18.9 15.01 20C15.01 21.1 15.9 22 17 22C18.1 22 19 21.1 19 20C19 18.9 18.1 18 17 18Z"/>
                    </g>
                </svg>
                @isset($order)
                    <span class="header_cart_count">{{count($order->products)}}</span>
                @endisset
                @empty($order)
                    <span class="header_cart_count">0</span>
                @endempty
                <div class="header__cart_outer-wrapper">
                    @include('components.common.cart-commodity', compact('order'))
                </div>

            </div>
            @guest
                <a href="{{ route('login', app()->getLocale()) }}" class="header_profile">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="">
                            <path
                                d="M19 5V19H5V5H19ZM19 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM12 12C10.35 12 9 10.65 9 9C9 7.35 10.35 6 12 6C13.65 6 15 7.35 15 9C15 10.65 13.65 12 12 12ZM12 8C11.45 8 11 8.45 11 9C11 9.55 11.45 10 12 10C12.55 10 13 9.55 13 9C13 8.45 12.55 8 12 8ZM18 18H6V16.47C6 13.97 9.97 12.89 12 12.89C14.03 12.89 18 13.97 18 16.47V18ZM8.31 16H15.69C15 15.44 13.31 14.88 12 14.88C10.69 14.88 8.99 15.44 8.31 16Z"/>
                        </g>
                    </svg>
                </a>
            @endguest
            @auth
                <a href="{{ route('profile.index') }}" class="header_profile">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="">
                            <path
                                d="M19 5V19H5V5H19ZM19 3H5C3.89 3 3 3.9 3 5V19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM12 12C10.35 12 9 10.65 9 9C9 7.35 10.35 6 12 6C13.65 6 15 7.35 15 9C15 10.65 13.65 12 12 12ZM12 8C11.45 8 11 8.45 11 9C11 9.55 11.45 10 12 10C12.55 10 13 9.55 13 9C13 8.45 12.55 8 12 8ZM18 18H6V16.47C6 13.97 9.97 12.89 12 12.89C14.03 12.89 18 13.97 18 16.47V18ZM8.31 16H15.69C15 15.44 13.31 14.88 12 14.88C10.69 14.88 8.99 15.44 8.31 16Z"/>
                        </g>
                    </svg>
                </a>
            @endauth

        </div>
        <button class="reload-the-page" onclick="document.location.reload()"></button>
    </div>
</header>


@yield('content')


<div class="quantity-drop-down-wrapper">
    <ul>
        <li>
            24
        </li>
        <li>
            48
        </li>
        <li>
            120
        </li>
    </ul>
</div>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="#" class="footer-logotype">
                    <img src="{{ asset('assets/img/common/logo.svg') }}" alt="">
                </a>
                <div class="footer-first-cols-wrap">
                    <div class="footer-first-column-wrapper">
                        <div class="d-flex footer-items-wrapper align-items-center justify-content-between">
                            <div class="d-flex footer-item align-items-center">
                                <img src="{{ asset('assets/img/common/pin.svg') }}" alt="">
                                <span>Ģertrudes 77</span>
                            </div>
                            <div class="d-flex footer-item align-items-center">
                                <img src="{{ asset('assets/img/common/phone.svg') }}" alt="">
                                <span>25519270</span>
                            </div>
                        </div>
                        <div class="working-hours">
                            <p>
                                {{__("Working days")}}: 9.00-18.00 <br>
                                {{__("Saturday")}}: 11.00-15.00
                            </p>
                        </div>
                    </div>
                    <div class="footer-first-column-wrapper">
                        <div class="d-flex footer-items-wrapper align-items-center justify-content-between">
                            <div class="d-flex footer-item align-items-center">
                                <img src="{{ asset('assets/img/common/pin.svg') }}" alt="">
                                <span>Anniņmuižas 17</span>
                            </div>
                            <div class="d-flex footer-item align-items-center">
                                <img src="{{ asset('assets/img/common/phone.svg') }}" alt="">
                                <span>25519951</span>
                            </div>
                        </div>
                        <div class="working-hours">
                            <p>
                                {{__("Working days")}}: 10.00-18.00
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3 col-md-4">
                <h3 class="small-title">
                    Ремонт
                </h3>
                <ul>
                    <li><a href="{{ route('fixing-type', 'mobile') }}">Мобильных телефонов</a></li>
                    <li><a href="{{ route('fixing-type', 'tablet') }}">Планшетов</a></li>
                    <li><a href="{{ route('fixing-type', 'laptop') }}">Ноутбуков</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h3 class="small-title">
                    магазин
                </h3>
                <ul>
                    <li><a href="#">Запчасти для мобильных телефонов </a></li>
                    <li><a href="#">Аксессуары для мобильных телефонов</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4">
                <h3 class="small-title">
                    информация
                </h3>
                <ul>
                    <li><a href="{{route('about')}}">О компании</a></li>
                    <li><a href="{{route('delivery')}}">Доставка</a></li>
                    <li><a href="{{route('contacts-page')}}">Контакты</a></li>
                </ul>
                <div class="social-websites">
                    <a href="#" class="social-fb">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.2488 0.00478553L14.2663 0C10.9155 0 8.75003 2.22168 8.75003 5.66033V8.27012H5.7512C5.49207 8.27012 5.28223 8.48021 5.28223 8.73934V12.5206C5.28223 12.7798 5.49231 12.9896 5.7512 12.9896H8.75003V22.531C8.75003 22.7902 8.95987 23 9.21901 23H13.1316C13.3908 23 13.6006 22.7899 13.6006 22.531V12.9896H17.1069C17.3661 12.9896 17.5759 12.7798 17.5759 12.5206L17.5773 8.73934C17.5773 8.61492 17.5278 8.49576 17.44 8.40771C17.3522 8.31965 17.2325 8.27012 17.1081 8.27012H13.6006V6.05777C13.6006 4.99442 13.854 4.45462 15.2391 4.45462L17.2483 4.4539C17.5072 4.4539 17.7171 4.24381 17.7171 3.98491V0.473768C17.7171 0.21511 17.5075 0.00526409 17.2488 0.00478553Z"/>
                        </svg>
                    </a>
                    <a href="#" class="social-inst">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.6526 0H6.34699C2.84726 0 0 2.8474 0 6.34713V16.6527C0 20.1526 2.84726 22.9999 6.34699 22.9999H16.6526C20.1526 22.9999 22.9999 20.1525 22.9999 16.6527V6.34713C23 2.8474 20.1526 0 16.6526 0ZM20.9593 16.6527C20.9593 19.0274 19.0274 20.9592 16.6527 20.9592H6.34699C3.97248 20.9593 2.04066 19.0274 2.04066 16.6527V6.34713C2.04066 3.97262 3.97248 2.04066 6.34699 2.04066H16.6526C19.0272 2.04066 20.9592 3.97262 20.9592 6.34713V16.6527H20.9593Z"/>
                            <path
                                d="M11.4997 5.57373C8.23181 5.57373 5.57324 8.2323 5.57324 11.5002C5.57324 14.768 8.23181 17.4264 11.4997 17.4264C14.7676 17.4264 17.4262 14.768 17.4262 11.5002C17.4262 8.2323 14.7676 5.57373 11.4997 5.57373ZM11.4997 15.3856C9.35717 15.3856 7.6139 13.6426 7.6139 11.5001C7.6139 9.35738 9.35703 7.61425 11.4997 7.61425C13.6424 7.61425 15.3855 9.35738 15.3855 11.5001C15.3855 13.6426 13.6423 15.3856 11.4997 15.3856Z"/>
                            <path
                                d="M17.6752 3.84338C17.282 3.84338 16.8958 4.00256 16.6181 4.28145C16.3391 4.55898 16.1787 4.94534 16.1787 5.33987C16.1787 5.73317 16.3392 6.1194 16.6181 6.39829C16.8957 6.67582 17.282 6.83635 17.6752 6.83635C18.0697 6.83635 18.4547 6.67582 18.7336 6.39829C19.0125 6.1194 19.1717 5.73303 19.1717 5.33987C19.1717 4.94534 19.0125 4.55898 18.7336 4.28145C18.4561 4.00256 18.0697 3.84338 17.6752 3.84338Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <p>
                © Promarket SIA 2011-2020
            </p>
            <div class="copyright-links">
                <a href="{{route('responsibility')}}">Ограничение ответственности</a>
                <a href="{{route('guarantee')}}">Условия гарантии</a>
            </div>
        </div>
    </div>
</div>


<div id="added_good" style="display: none;">
    Товар был успешно добавлен в корзину
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script src="https://api-maps.yandex.ru/2.1/?lang=en_RU&amp;apikey=<your API-key>" type="text/javascript"></script>
<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('set', 'anonymizeIp', true);
    ga('set', 'transport', 'beacon');
    ga('send', 'pageview')

$(document).ready(function() {
    
    src = "{{ route('search') }}";

        $('#search_text').on('keyup',function() {
            var query = $(this).val();
            $.ajax({

                url:"{{ route('search.ajax') }}",

                type:"GET",

                data:{'query':query},

                success:function (data) {
                    $('#search_list').html("");
                    $('#search_list').html(data);
                }
            })
            // end of ajax call
        });

        $(document).on('click', window, function(){

            $('#search_list').html("");
        });


});
</script>
<script src="https://www.google-analytics.com/analytics.js" async></script>
</body>

</html>
