<div class="header__cart__inner dropping__element__wrapper">
    @if(isset($order->products) && count($order->products) != 0)
        <h3 class="inner__cart__title">
            {{__("products in the shopping cart:")}} {{count($order->products)}}
        </h3>
        <div class="header__cart_commodities">
            @foreach($order->products as $product)
                @if(Auth::check())
                    @php
                        $product->price = $product->wholesale_price;
                    @endphp
                @endif
                <div class="d-flex header_cart_commodity">
                    <div class="header__cart_img">
                        <img src="{{$product->img}}" alt="">
                    </div>
                    <div class="header__cart_body">
                        <div class="header__cart_second_col">
                            <div class="header__cart_commodity-title">
                                {{$product->name}}
                            </div>
                        </div>
                        <div class="header__cart_third_col">
                            <div class="header__cart_params">
                                <form method="POST" action="{{route('update-cart')}}"
                                      class="update-cart-form-submittion">
                                    @csrf
                                    <input name="product_id" type="hidden" value="{{$product->id}}">
                                    <label>
                                        <input name="quantity" type="number" value="{{$product->pivot->count}}">
                                    </label>
                                    <button type="submit" class="commodity_reset_btn">
                                        {{__("Refresh")}}
                                    </button>
                                </form>
                            </div>
                            <div class="header__cart_price">
                                {{$product->price * $product->pivot->count}} ???
                            </div>
                            <form action="{{route('remove-cart')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <a href="#" class="delete-button header__cart__delete-button">
                                    <img src="{{ asset('assets/img/common/close.svg') }}" alt="">
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex align-items-center justify-content-between">
            <div class="cart__price__wrapper">
                <p>
                    {{__("total")}}:
                    <b>
                        {{$order->getFullPrice()}} ???
                    </b>
                </p>
            </div>
            <a href="{{route('cart')}}" class="default-button">
                {{__("go to shopping cart")}}
            </a>
        </div>
    @else
        <h3 class="inner__cart__title">
            {{__("your shopping cart is currently empty")}}
        </h3>
    @endif
</div>
