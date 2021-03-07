@if(count($cart)>0)
    @foreach($cart as $item)
    <li class="single-product-cart">
        <div class="cart-img">
            <a href="{{route('shop.project.detail',['slug'=> $item->options->slug])}}"><img style="object-position: top; object-fit: cover; width: 100px; height: 100px;" src="{{asset($item->options->image)}}" alt=""></a>
        </div>
        <div class="cart-title">
            <h5><a href="{{route('shop.project.detail',['slug'=> $item->options->slug])}}"> {{$item->name}}</a></h5>
        </div>
        <div class="cart-delete">
            <a data-id="{{ $item->rowId }}" href="javascript:void(0)"
               class="cart_quantity_delete remove-to-cart"><i class="ti-trash"></i></a>
        </div>
    </li>
    @endforeach
    <li class="cart-btn-wrapper">
        <a class="cart-btn btn-hover" href="{{route('shop.cart')}}">Xem giỏ</a>
        <a class="cart-btn btn-hover" href="{{route('shop.cart.checkout')}}">Đặt hàng</a>
    </li>
@else

    <h3 class="text-center mb-30">Giỏ hàng trống</h3>
    <a href="{{route('shop.projects')}}" class="text-center btn-success btn-lg" role="button" aria-pressed="true">
        Xem mẫu website <i class="ti-arrow-right"></i>
    </a>


@endif
