@if(count($cart))
    <form action="{{route('shop.cart.checkout')}}" method="get">
{{--        @csrf--}}
        <div class="table-content table-responsive">
            <table>
                <thead>
                <tr>
                    <th>Xoá</th>
                    <th>Ảnh</th>
                    <th>Mẫu</th>
                    <th>Chọn gói</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $key => $item)
                    <tr>
                        <td class="product-remove"><a data-id="{{ $item->rowId }}" href="javascript:void(0)"
                                                      class="cart_quantity_delete remove-to-cart"><i class="pe-7s-close"></i></a></td>
                        <td class="product-thumbnail">
                            <a href="{{route('shop.project.detail',['slug'=> $item->options->slug])}}" style="" width="100%"><img src="{{asset($item->options->image)}}" alt="" style="object-position: top; object-fit: cover; width: 100%; height: 100px;"></a>
                        </td>
                        <td class="product-name"><a href="{{route('shop.project.detail',['slug'=> $item->options->slug])}}">{{$item->name}}</a></td>
                        {{--                                    <td class="product-quantity">--}}
                        {{--                                        <input value="{{$item->qty}}" type="number">--}}
                        {{--                                    </td>--}}
                        <td class="product-quantity">
                            <select id="package_{{$item->id}}" name="package_{{$key}}" class="" style=" width: 50%; cursor: pointer">
                                @foreach($packages as $pac)
                                    <option value="{{$pac->id}}">{{$pac->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="coupon-all">
                    <div class="coupon cart-page-total">
                        <a href="{{route('shop.cart.destroy')}}" class="mr-30">Huỷ giỏ hàng</a>
                        <a href="{{route('shop.projects')}}" >Tiếp tục mua hàng</a>
                    </div>
                    <div class="coupon2">
                        {{--                                    <input class="button" name="update_cart" value="Cập nhật" type="submit">--}}
                        <button type="submit" class=" btnCheckout" >đặt hàng</button>
                    </div>
                </div>
            </div>

        </div>
        {{--                    <div class="row">--}}
        {{--                        <div class="col-md-5 ml-auto">--}}
        {{--                            <div class="cart-page-total">--}}
        {{--                                <h2>Cart totals</h2>--}}
        {{--                                <ul>--}}
        {{--                                    <li>Subtotal<span>100.00</span></li>--}}
        {{--                                    <li>Total<span>100.00</span></li>--}}
        {{--                                </ul>--}}
        {{--                                <a href="#">Proceed to checkout</a>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
    </form>


@else

    <h3 class="text-center mb-30"><i class="fa fa-opencart"></i>Bạn chưa có sản phẩm nào trong giỏ hàng</h3>
    <div class="d-flex justify-content-around flex-wrap">
        <a href="/" class=" btn-info btn-lg mt-20" role="button" aria-pressed="true">
            <i class="ti-arrow-left"></i> Về Trang Chủ
        </a>
        <a href="{{route('shop.projects')}}" class=" btn-success btn-lg mt-20" role="button" aria-pressed="true">
            Tìm kiếm mẫu website <i class="ti-arrow-right"></i>
        </a>
    </div>


@endif
