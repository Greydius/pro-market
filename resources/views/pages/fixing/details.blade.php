@extends('system.master')

@section('content')
    <main class="main">
        <div class="fixing-container">
            <div class="container">
                <div class="row">

                    @include('components.fixing-sidebar')

                    <div class="col-lg-9">
                        <div class="product-fixing-container brand-product service-inner-page">
                            {{ Breadcrumbs::render('fixing-order-detail', $details) }}

                            @foreach($details as $detail)
                                <div class="detail-block-wrapper"
                                     data-start-cost="{{$detail->price}}" data-cost="{{$detail->price}}"
                                     data-id="{{$detail->id}}"
                                     data-color="{{$detail->products[0]->color->name ?? __('Not color')}}"
                                >
                                    <div class="main-title title-for-mobile">{{$detail->getTranslatedAttribute('name', app()->getLocale(), 'lv')}} {{$detail->manufacturerModel->getTranslatedAttribute('name', app()->getLocale(), 'lv')}}</div>

                                    <div class="row top-card">
                                        <div class="col-lg-4 col-md-4 col-sm-5">
                                            <img src="{{$detail->products[0]->img}}" alt="" class="img-for-pc">
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                            <div class="main-title title-for-pc">{{$detail->getTranslatedAttribute('name', app()->getLocale(), 'lv')}} {{$detail->manufacturerModel->getTranslatedAttribute('name', app()->getLocale(), 'lv')}} </div>
                                            <div class="main-title title-for-tablet">{{$detail->getTranslatedAttribute('name', app()->getLocale(), 'lv')}} {{$detail->manufacturerModel->getTranslatedAttribute('name', app()->getLocale(), 'lv')}}</div>
                                            <div>{{__("repairs")}} {{$detail->manufacturerModel->getTranslatedAttribute('name', app()->getLocale(), 'lv')}} {{__("in our workshop it is")}}:</div>
                                            <div class="repair-list">
                                                {!! $detail->manufacturerModel->getTranslatedAttribute('descirption', app()->getLocale(), 'lv') !!}
                                            </div>
                                            <div class="description-for-pc"><strong>{{__("Repair time")}} :</strong> {{$detail->getTranslatedAttribute('fixing_time', app()->getLocale(), 'lv')}}</div>
                                        </div>
                                    </div>
                                    @if(count($detail->allColors) == 1 && $detail->allColors[0]->color_id == 0)
                                        <div class="commodity choose-quality active mt-5">
                                            <h3 class="small-title">
                                                {{__("Choose quality")}}
                                            </h3>
                                            <div class="choose-quality-block">
                                                @include('components.fixing.detail_quality', compact('detail'))
                                            </div>
                                        </div>
                                    @else
                                        <div class="banner-categories-block banner-categories-block-phone11 mt-5">
                                            <h3 class="small-title">
                                                {{__("Choose a color")}} :
                                            </h3>
                                            <div class="row choosing-color-row main-banner-row">
                                                @foreach($detail->allColors as $detailColor)
                                                    @if($detailColor->color)
                                                        <div class="col-lg-4 col-md-4 main-banner-col">
                                                            <div
                                                                data-route="{{route('get-detail-qualities', [app()->getLocale() ,$detail->id, $detailColor->color->id])}}"
                                                                data-color-name="{{$detailColor->color->name}}"
                                                                class="fixing-category-card color-changing-card">
                                                                <div class="color-to-choose"
                                                                     style="background: {{$detailColor->color->color_code}}"></div>

                                                                <span>{{$detailColor->color->getTranslatedAttribute('name', app()->getLocale(), 'lv')}}</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="commodity choose-quality">
                                            <h3 class="small-title">
                                                {{__("Choose quality")}}
                                            </h3>
                                            <div class="choose-quality-block">

                                            </div>
                                        </div>
                                    @endif

                                </div>
                            @endforeach

                            <div class="d-flex justify-content-end">
                                <h3 class="d-flex align-content-center small-title my-5">
                                    {{__("repair cost")}}: ???
                                    <span class="commodity-card-price commodity-card-old-price flex-row">

                                       ??? <span class="js-commodity-card-old-price-text"></span>

                                    </span>
                                    <span class="commodity-card-price flex-row">

                                      ??? ??? <span class="js-commodity-card-price-text"></span>

                                    </span>
                                </h3>
                            </div>
                            <div id="reservation-form" class="text-center">
                                <form novalidate method="POST" data-url="{{route('handle-fixing')}}"
                                      class="reservation-form">
                                    @csrf
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12">
                                                <h3 class="small-title mb-2">
                                                    {{__("reservation")}}
                                                </h3>
                                                <label>
                                                <span class="errormessage"></span>
                                                <input type="text" placeholder="{{__('First Name, Last Name')}}"
                                                           class="form-control"
                                                           name="name">
                                                </label>
                                                <label>
                                                <span class="errormessage"></span>
                                                <input type="text" placeholder="{{__('E-mail address')}}"
                                                           class="form-control"
                                                           name="email">
                                                </label>
                                                <span class="errormessage"></span>
                                                <input type="tel" class="form-control errormessage"
                                                       placeholder="{{__('Your phone number')}} " name="tel">
                                                <textarea class="form-control" name="comment" rows="5"
                                                          placeholder="{{__('Comment')}} "></textarea>
                                                <h3 class="small-title my-4">
                                                    {{__("Branch")}}
                                                </h3>
                                            </div>
                                            <div
                                                class="d-flex radio-buttons-row align-items-center justify-content-center">
                                                <label class="radio-type">
                                                    <input type="radio" name="address"
                                                           value="{{__('Riga - ??enter')}} ??ertr??des 77, R??ga">
                                                    <span>
                                                    {{__('Riga - ??enter')}}
                                                ??ertr??des 77, R??ga
                                                </span>
                                                </label>
                                                <label class="radio-type">
                                                    <input type="radio" name="address"
                                                           value="{{__('Riga - Zolidude')}} IXO Centrs, Anni??mui??as iela 17">
                                                    <span>
                                                        {{__('Riga - Zolidude')}}
                                                        IXO Centrs,
                                                        Anni??mui??as iela 17
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="d-flex pickers-wrapper">
                                                <label class="picker-label-wrapper">
                                                    <span>{{__("Enter date")}} </span>
                                                    <input type="text" class="datepicker" placeholder="????/????/????????"
                                                           name="date"/>
                                                </label>
                                                <label class="picker-label-wrapper">
                                                    <span>{{__("Enter time")}} </span>
                                                    <input type="text" class="timepicker" placeholder="00:00"
                                                           name="time">
                                                </label>
                                            </div>

                                        </div>
                                        <button class="default-button mt-5" type="submit">
                                            {{__("confirm")}}
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <section class="additional-commodities-wrapper service-inner-commodity commodity mt-5">
                                <div class="">
                                    <h3 class="small-title">
                                        {{$details[0]->products[0]->subCategory[0]->category->name}}
                                    </h3>
                                    <div class="">
                                        <div class="row">
                                            <?php $ii=1; ?>
                                            @foreach($details[0]->products[0]->subCategory[0]->category->allProducts() as $product)
                                            <?php if($ii < 10) : ?>
                                                <div class="col-lg-4 col-md-4 col-6">
                                                    @include('components.market.card', compact('product'))
                                                </div>
                                                <?php endif; $ii++; ?>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
