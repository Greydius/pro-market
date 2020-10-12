@extends('system.master')

@section('content')

    <main class="main">
        <div class="fixing-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 shop-sidebar login-content sidebar">

                        <div class="shop-sidebar-wrapper">

                            <div class="shop-sidebar-inner-wrap">

                                <div class="cancel-filters">
                                    <span>Отменить все</span>
                                    <svg class="close-shop-sidebar" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <g opacity="0.54">
                                            <path d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"
                                                  fill="#CC2830"/>
                                        </g>
                                    </svg>
                                </div>

                                <form class="sidebar-search">
                                    <label class="position-relative">
                                        <input type="text" placeholder="Поиск" class="auth_control">
                                        <button type="button" class="search_form_submit">
                                            <img src="img/common/search.svg" alt="">
                                        </button>
                                    </label>
                                </form>

                                <div class="cost-filter filter-el">
                                    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
                                        <p>
                                            цена €
                                        </p>
                                        <img src="img/common/chevron-down.svg" alt="">
                                    </div>
                                    <div class="filter-content">
                                        <div class="cost-slider">
                                            <div data-min="0" data-max="100" id="cost_slider"></div>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center range-inputs-wrapper">
                                            <label class="d-flex align-items-center">
                                <span>
                                    От
                                </span>
                                                <input class="starting-value" placeholder="0" type="text">
                                            </label>
                                            <label class="d-flex align-items-center">
                                <span>
                                    До
                                </span>
                                                <input class="ending-value" placeholder="300" type="text">
                                            </label>
                                        </div>

                                    </div>
                                </div>

                                <div class="filter-el checkbox-filter">
                                    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
                                        <p>
                                            наличие
                                        </p>
                                        <img src="img/common/chevron-down.svg" alt="">
                                    </div>
                                    <div class="filter-content">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                    Есть в наличии
                                </span>
                                        </label>
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Под заказ
                                </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="filter-el checkbox-filter">
                                    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
                                        <p>
                                            устройство
                                        </p>
                                        <img src="img/common/chevron-down.svg" alt="">
                                    </div>
                                    <div class="filter-content">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Телефоны
                                </span>
                                        </label>
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Планшеты
                                </span>
                                        </label>
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Ноутбуки
                                </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="filter-el checkbox-filter">
                                    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
                                        <p>
                                            марка
                                        </p>
                                        <img src="img/common/chevron-down.svg" alt="">
                                    </div>
                                    <div class="filter-content">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Apple
                                </span>
                                        </label>
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Samsung
                                </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="filter-el checkbox-filter">
                                    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
                                        <p>
                                            модель
                                        </p>
                                        <img src="img/common/chevron-down.svg" alt="">
                                    </div>
                                    <div class="filter-content">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                  iPhone 5

                                </span>
                                        </label>
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 5s
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 6
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 6s
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 6 Plus
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 6S
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 6S Plus
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 7
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 8
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 10
                                </span>
                                        </label>

                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   iPhone 11
                                </span>
                                        </label>

                                    </div>
                                </div>

                                <div class="filter-el checkbox-filter">
                                    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
                                        <p>
                                            цвет
                                        </p>
                                        <img src="img/common/chevron-down.svg" alt="">
                                    </div>
                                    <div class="filter-content">
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Белый
                                </span>
                                        </label>
                                        <label class="checkbox-label">
                                            <input type="checkbox" name="agreement">
                                            <span>
                                   Чёрный
                                </span>
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-9 col-md-12">
                        <div class="shop-main-wrapper brand-product">
                            <div class="collapsing-control">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="bread-crumbs">
                                        <ul class="d-flex">
                                            <li class="bread-crumb-link bread-crumb-link-prev">
                                                <a href="#">
                                                    Магазин
                                                </a>
                                            </li>
                                            <li class="bread-crumb-link">
                                                {{ $category->name }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="market_sorting-wrapper">
                                        <div class="market_sorting d-flex align-items-center">
                                            <a href="#" class="market-sorting-trigger">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M3 17H9V15H3V17ZM3 5V7H21V5H3ZM3 12H15V10H3V12Z"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="24" height="24" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span>Сортировать</span>
                                            </a>
                                            <a href="#" class="market-sorting-trigger market-filtering-trigger">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0)">
                                                        <path d="M3 17H9V15H3V17ZM3 5V7H21V5H3ZM3 12H15V10H3V12Z"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0">
                                                            <rect width="24" height="24" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                                <span>Фильтры</span>
                                            </a>
                                            <a href="#" class="market-make-list">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path d="M3 5V19H20V5H3ZM7 7V9H5V7H7ZM5 13V11H7V13H5ZM5 15H7V17H5V15ZM18 17H9V15H18V17ZM18 13H9V11H18V13ZM18 9H9V7H18V9Z"/>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sorting-controller">
                                    <div class="sorting-pages d-flex justify-content-between align-items-center">
                                        <div class="sorting-pagination">
                                    <span class="muted">
                                        1-12 из 1046
                                    </span>
                                        </div>
                                        <div class="d-flex align-items-center sorting-filter-row">
                                            <div class="sorting-filter select-drop-down drop-down-sorting sorting">
                                                <div class="sorting-filter-trigger">
                                            <span class="muted changing">
                                                Сортировать по названию
                                            </span>
                                                    <img src="img/common/chevron-down.svg" alt="">
                                                </div>
                                                <div class="sorting-filter-content dropping__element__wrapper">
                                                    <ul>
                                                        <li class="sorting-filter-content-changers">
                                                            <a href="#">
                                                                Цена по возрастанию
                                                            </a>
                                                        </li>
                                                        <li class="sorting-filter-content-changers">
                                                            <a href="#">
                                                                Цена по убыванию
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="sorting-filter select-drop-down drop-down-sorting showing">
                                                <div class="sorting-filter-trigger">
                                            <span class="muted changing">
                                                Показать 24
                                            </span>
                                                    <img src="img/common/chevron-down.svg" alt="">
                                                </div>
                                                <div class="sorting-filter-content dropping__element__wrapper">
                                                    <ul>
                                                        <li class="sorting-filter-content-changers">
                                                            <a href="#">
                                                                24
                                                            </a>
                                                        </li>
                                                        <li class="sorting-filter-content-changers">
                                                            <a href="#">
                                                                48
                                                            </a>
                                                        </li>
                                                        <li class="sorting-filter-content-changers">
                                                            <a href="#">
                                                                120
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h3 class="small-title">
                                {{ $category->name }}
                            </h3>

                            <div class="row additional-commodities-wrapper">
                                @foreach($category->products as $product)
                                    @include('components.market.card', compact('product'))
                                @endforeach
                            </div>

                            <div class="pagination d-flex align-items-center justify-content-center">
                                <a href="#" class="get-back pagination-bullet">
                                    &lt;&lt;
                                </a>
                                <a href="#" class="pagination-bullet">
                                    1
                                </a>
                                <a href="#" class="pagination-bullet active">
                                    2
                                </a>
                                <a href="#" class="pagination-bullet">
                                    3
                                </a>
                                <a href="#" class="pagination-bullet get-next">
                                    &gt;&gt;
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection