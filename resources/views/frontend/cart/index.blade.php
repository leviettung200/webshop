@extends('frontend.layouts.main')
@section('content')
<!-- shopping-cart-area start -->
<div style="background-color: #27c98d; height: 100px">

</div>
<div class="cart-main-area pt-50 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h1 class="cart-heading">Giỏ hàng</h1>
                <div id="my-cart">
                    @include('frontend.cart.info')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shopping-cart-area end -->
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            // xóa sản phẩm khỏi giỏ hàng
            $(document).on("click", '.remove-to-cart', function () {
                var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?");
                if (result) {
                    var product_id = $(this).attr('data-id');
                    $.ajax({
                        url: '/gio-hang/xoa-sp-gio-hang/' + product_id,
                        type: 'get',
                        data: {
                            id: product_id
                        }, // dữ liệu truyền sang nếu có
                        dataType: "HTML", // kiểu dữ liệu trả về
                        success: function (response) {
                            $('#my-cart').html(response);
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e.message);
                        }
                    });
                }
            });

            // cập nhật số lượng của từng sản phẩm trong giỏ hàng
            $(document).on("click", '.update-qty', function (e) {
                var rowId = $(this).attr('data-id');
                var qty = $(this).closest('.quantity').find('.item-qty').val(); // lấy số lượng của ô input

                // Kiểm tra Nếu không phải là số nguyên Hoặc số lượng < 1
                if (isNaN(qty) || qty < 1) {
                    alert("Số lượng là số nguyên lớn hơn >= 1");
                    $(this).closest('.quantity').find('.item-qty').val(1);
                    return false;
                }

                $.ajax({
                    url: '/gio-hang/cap-nhat-so-luong-sp',
                    type: 'get',
                    data: {
                        rowId: rowId,
                        qty: qty
                    }, // dữ liệu truyền sang nếu có
                    dataType: "HTML", // kiểu dữ liệu trả về
                    success: function (response) {
                        if (response != false) {
                            $('#my-cart').html(response);
                        }
                    },
                    error: function (e) { // lỗi nếu có
                        console.log(e.message);
                    }
                });
            });
        })
    </script>
@endsection
