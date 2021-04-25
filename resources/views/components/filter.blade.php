<?php 
    $fil_man = isset($filters['manufacturer']) ? $filters['manufacturer'] : [];
    $fil_mod = isset($filters['model']) ? $filters['model'] : [];
    $fil_color = isset($filters['color_id']) ? $filters['color_id'] : [];
    // dd($fil_color);
 ?>
<div class="shop-sidebar-inner-wrap">
	@csrf
<div class="cancel-filters">
    <span>Отменить все</span>
    <svg class="close-shop-sidebar" width="24" height="24" viewBox="0 0 24 24"
         fill="none"
         xmlns="http://www.w3.org/2000/svg">
        <g opacity="0.54">
            <path
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"
                fill="#CC2830"/>
        </g>
    </svg>
</div>

<form class="sidebar-search" action="{{ route('search') }}" method="POST" >
    <label class="position-relative">
        <input type="text" placeholder="{{__('search')}}" class="auth_control"  name="query" id="search_text2">
        <button type="button" class="search_form_submit">
            <img src="{{ asset('/assets/img/common/search.svg') }}" alt="">
        </button>
    </label>
</form>
<div class="cost-filter filter-el">
    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
        <p>
            {{__("Price")}} €
        </p>
        <img src="{{asset('assets/img/common/chevron-down.svg')}}" alt="">
    </div>
    <div class="filter-content">
        <div class="cost-slider">
            <div data-min="{{$minprice}}" data-max="{{$maxprice}}" id="cost_slider"></div>
        </div>

        <div
            class="d-flex justify-content-between align-items-center range-inputs-wrapper">
            <label class="d-flex align-items-center">
                <span>
                    {{__("from")}}
                </span>
                <input class="starting-value" placeholder="0" type="text"
                       name="min_price">
            </label>
            <label class="d-flex align-items-center">
                <span>
                    {{__("till")}}
                </span>
                <input class="ending-value" placeholder="300" type="text"
                       name="max_price">
            </label>
        </div>

    </div>
</div>

<div class="filter-el checkbox-filter">
    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
        <p>
            {{__("Availability")}}
        </p>
        <img src="{{asset('assets/img/common/chevron-down.svg')}}" alt="">
    </div>
    <div class="filter-content">
    	   <!-- @ foreach($quantity as $quantity) -->
        <label class="checkbox-label">
            <input type="checkbox" name="quantity" value="0">
            <span>
            		{{__("On order")}}
			</span>
        </label>
        <label class="checkbox-label">
            <input type="checkbox" name="quantity" value="1">
            <span>
                    {{__("available")}}
            </span>
        </label>
        <!-- @ endforeach -->
    </div>
</div>
<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
<div class="filter-el manufacturer-filter checkbox-filter">
    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
        <p>
            {{__("brand")}}
        </p>
        <img src="{{asset('assets/img/common/chevron-down.svg')}}" alt="">
    </div>
    <div class="filter-content">
        <div class="pol_content">

        @foreach($manufacturer as $manufacturer)
        <label class="checkbox-label">
            <input type="checkbox" <?php if(in_array($manufacturer->manufacturer, $fil_man)){ echo "checked"; } ?> name="manufacturer" value="{{$manufacturer->manufacturer}}">
            <span>
			   {{$manufacturer->manufacturer}}
			</span>
        </label>
        @endforeach
        </div>
        <button class="view_all">{{__("More")}} </button>
    </div>
</div>

<div class="filter-el model-filter checkbox-filter">
    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
        <p>
            {{__("model")}}
        </p>
        <img src="{{asset('assets/img/common/chevron-down.svg')}}" alt="">
    </div>
    <div class="filter-content">
    <div class="pol_content">
       @foreach($models as $model)
        <label class="checkbox-label">
            <input type="checkbox" data-marka="{{$model->manufacturer}}" name="model" <?php if(in_array($model->model, $fil_mod)){ echo "checked"; } ?> value="{{$model->model}}">
            <span>
			   {{$model->model}}
			</span>
        </label>
        @endforeach
    </div>
        <button class="view_all">{{__("More")}} </button>

    </div>
</div>

<div class="filter-el checkbox-filter">
    <div class="cost-filter-trigger justify-content-between d-flex align-items-center">
        <p>
            {{__("Color")}}
        </p>
        <img src="{{asset('/assets/img/common/chevron-down.svg')}}" alt="">
    </div>
    <div class="filter-content">
    	@foreach($color as $color)
        <label class="checkbox-label">
            <input type="checkbox" name="color"  <?php if(in_array($color->id, $fil_color)){ echo "checked"; } ?> value="{{$color->id}}">
            <span>
               {{$color->name}}
            </span>
        </label>
        @endforeach
    </div>
</div>

</div>

    <script type="text/javascript">

$(document).ready(function() {
    var old_title = $(document).prop('title'); 
    $('.filter-el input').change(function () {
        
        var url = '<?= Request::url(); ?>';

        ajaxSort(url, '');

    });
    $('#search_text2').on('keyup',function() {
        var url = '<?= Request::url(); ?>';
        page_query.set($(this).attr("name"), $(this).val())
        ajaxSort(url);
    });

    $(".sidebar-search").submit(function(e){
        return false;
    });

    $('button.view_all').click(function(e){
        $(this).prev('.pol_content').toggleClass('full');
    })

});

</script>
