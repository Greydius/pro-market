@extends('system.master')

@section('content')
    <main class="main">
        <div class="fixing-container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 shop-sidebar login-content sidebar">

                        <div class="shop-sidebar-wrapper">
                            <x-cat-filter :filters="$filters" category="{{request()->route()->parameters['category']}}"/>

                        </div>

                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="shop-main-wrapper brand-product">
                            <div class="collapsing-control">
                                <div class="d-flex align-items-center justify-content-between">
                                    {{ Breadcrumbs::render('upper-category', $category) }}
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
                                                <span>{{__("Sort")}} </span>
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
                                                <span>{{__("Filters")}}</span>
                                            </a>
                                            <a href="#" class="market-make-list">
                                                <svg width="24" height="24" viewBox="0 0 24 24"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <g>
                                                        <path
                                                            d="M3 5V19H20V5H3ZM7 7V9H5V7H7ZM5 13V11H7V13H5ZM5 15H7V17H5V15ZM18 17H9V15H18V17ZM18 13H9V11H18V13ZM18 9H9V7H18V9Z"/>
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
                                        <span class="current_pagination">{{$products->currentPage()}}</span>-<span class="count_products">{{$products->count()}}</span> {{__("of")}} {{$products->total()}}
                                    </span>
                                        </div>
                                        <div class="d-flex align-items-center sorting-filter-row">
                                            <div class="sorting-filter select-drop-down drop-down-sorting sorting">
                                                <select name="order" id="order"
                                                        class="sorting_select sorting-filter-content dropping__element__wrapper1 js-selectric">
                                                    <option value="ASC" style="padding: 10px">{{__("Sort by low price")}}
                                                    </option>
                                                    <option value="DESC">{{__("Sort by high price")}} </option>
                                                </select>
                                            </div>
                                            <div class="sorting-filter select-drop-down drop-down-sorting showing">
                                            <!--  <div class="sorting-filter-trigger">
                                                   <span class="muted changing">
                                                        Показать 24
                                                    </span>
                                                    <label for="cars">Показать 24</label>
                                                    <img src="{{asset('assets/img/common/chevron-down.svg')}}" alt="">
                                                </div> -->
                                                <select name="per_page" id="per_page"
                                                        class="sorting_select sorting-filter-content dropping__element__wrapper1 js-selectric">
                                                    <option value="12">{{__("Show")}} 12</option>
                                                    <option value="24">{{__("Show")}} 24</option>
                                                    <option value="48">{{__("Show")}} 48</option>
                                                    <option value="120">{{__("Show")}} 120</option>
                                                </select>
                                            @csrf
                                            <!-- < div class="sorting-filter-content dropping__element__wrapper">

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
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="small-title">
                                {{ $category->name }}
                            </h1>
                            <div id="sort">
                                <div class="row additional-commodities-wrapper">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-4 col-6">
                                            @include('components.market.card', compact('product'))
                                        </div>
                                    @endforeach
                                </div>
                                {{$products->onEachSide(1)->links('components.pagination')}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script type="text/javascript">
    var url = '<?= Request::url(); ?>/0';
    $('.sorting_select').change(function () {
      ajaxSort('/0');
    });
</script>
@endsection
