@extends('frontend.layouts.main')
@section('content')
    <div class="" style="height: 100px; background-color: #27c98d">
    </div>
    <!-- shopping-cart-area start -->
    <div class="checkout-area ptb-50">
        <div class="container" id="completed">

            <div class="row" >
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="checkbox-form" >
                        <h3>Thông tin thanh toán</h3>
                        <div class="contact-map-wrapper">
                            <form id="checkout-form" class="checkout-form"  action="{{route('shop.cart.postCheckout')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="contact-input-style mb-20">
                                            <label for='name'>Họ tên <span class="text-danger">*</span></label>
                                            <input name="name" id="name" value="{{old('name')}}" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contact-input-style mb-20">
                                            <label for="email">Email <span class="text-danger">*</span></label>
                                            <input id="email" name="email" type="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="contact-input-style mb-20">
                                            <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                                            <input id="phone" name="phone" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="contact-textarea-style mb-20">
                                            <label for="note">Ghi chú</label>
                                            <textarea id="note" class="form-control2" name="note" ></textarea>
                                        </div>
                                        <button id="submit" class="submit contact-btn btn-hover" type="submit">
                                            Hoàn tất đơn hàng
                                        </button>

                                    </div>
                                </div>
                            </form>

                            <div class="alert form-messege mt-10" role="alert">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="your-order">
                        <h3>Đơn hàng</h3>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-total">Gói</th>
                                    <th class="product-total">Giá</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$item->name}}
{{--                                            <strong class="product-quantity"> × 1</strong>--}}
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{$item->options->package}}</span>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{number_format($item->price)}}</span>
                                        </td>
                                    </tr>
                                @endforeach



                                </tbody>
                                <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Tạm tính</th>
                                    <th></th>
                                    <td><span class="amount">{{number_format($subPrice)}}</span></td>
                                </tr>
                                @if(session()->has('coupon'))
                                    <tr class="cart-subtotal">
                                        <th >Mã giảm giá ({{ session()->get('coupon')['name'] }})
                                            <form style="display: inline" action="{{route('shop.cart.deleteCoupon')}}" method="POST">
                                                @csrf
                                                {{method_field('delete')}}
                                                <button type="submit" style="border: none; cursor: pointer; color: #0b3e6f">Xoá</button>
                                            </form>
                                        </th>
                                        <th>

                                        </th>
                                        <td><span class="amount">- {{ number_format(session()->get('coupon')['discount']) }}</span></td>
                                    </tr>
                                @endif

                                <tr class="order-total">
                                    <th>Tổng</th>
                                    <td></td>
                                    <td><strong><span class="amount">{{number_format($totalPrice)}}</span></strong>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>

                            <div class="coupon-accordion">
                                @if (session()->has('success') )
                                    <div class="spacer"></div>
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                @if(count($errors) > 0)
                                    <div class="spacer"></div>
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{!! $error !!}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(! session()->has('coupon'))
                                    <h3>Bạn có mã giảm giá ? <span id="showcoupon">Nhập tại đây</span></h3>
                                    <div id="checkout_coupon" class="coupon-checkout-content">
                                        <div class="coupon-info">
                                            <form action="{{route('shop.cart.checkCoupon')}}" method="POST">
                                                @csrf
                                                <p class="checkout-coupon">
                                                    <input type="text" placeholder="Mã giảm giá" name="coupon_code" id="coupon_code"/>
                                                    <input type="submit" value="Nhập" style="cursor: pointer"/>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection

@section('script')
    <script>
        $(function() {

            // Get the form.
            var form = $('#checkout-form');

            // Set up an event listener for the contact form.
            $(form).submit(function(e) {
                // Stop the browser from submitting the form.
                e.preventDefault();

                // Serialize the form data.
                var formData = $(form).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(form).attr('action'),
                    data: formData,
                    success: function(response) {
                        // clearErrors()
                        var orderID =response['orderId'];

                        $('#completed').html('');
                        $('#completed').html(` <h3 class="done text-center"><i class="pe-7s-check"></i></h3>
                            <h3 class="text-center mb-30" style="color: #1e1b1d">Đặt hàng thành công mã đơn hàng: <strong>${orderID}</strong></h3>`);

                        // const itemSubmit = document.getElementById('submit')
                        $('#completed').scrollIntoView({behavior: "smooth",block: "center"});

                        // itemSubmit.insertAdjacentHTML('afterend', '<div class="alert alert-success mt-10" id="success">Yêu cầu đã gửi đi thành công!</div>')

                        // Clear the form.
                        // $('#checkout-form input,#checkout-form textarea').val('');
                    }, error: function(error) {
                        const errors = error.responseJSON['errors'];
                        const firstItem = Object.keys(errors)[0]
                        const firstItemDOM = document.getElementById(firstItem)
                        const firstErrorMessage = errors[firstItem][0]

                        // scroll to the error message
                        firstItemDOM.scrollIntoView({behavior: "smooth",block: "center"});

                        clearErrors()

                        // show the error message
                        firstItemDOM.insertAdjacentHTML('afterend', `<div class="text-danger">${firstErrorMessage}</div>`)

                        // highlight the form control with the error
                        firstItemDOM.classList.add('border', 'border-danger')

                    }
                })

            });
            function clearErrors() {
                // remove all error messages
                const errorMessages = document.querySelectorAll('.text-danger')
                errorMessages.forEach((element) => element.textContent = '')

                // remove all form controls with highlighted error text box
                const formControls = document.querySelectorAll('input, textarea')
                formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
            }


        });


    </script>
@endsection

