@extends('frontend.layouts.main')

@section('content')
    <div style="background-color: #27c98d; height: 100px">
        <style>
            .done i{
                border-radius: 50%;
                font-weight: 900;
                font-size: 90px;
                background-color: #2ecc71;
                color: white;
            }
        </style>

    </div>
    <div class="cart-main-area pt-50 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Giỏ hàng</h1>
                    <div id="my-cart">
                        @if(1)
                            <h3 class="done text-center"><i class="pe-7s-check"></i></h3>
                            <h3 class="text-center mb-30"><i class="fa fa-opencart"></i>Đặt hàng thành công ma</h3>

                        @else
                            <h3 class="text-center mb-30"><i class="fa fa-opencart"></i>Bạn chưa có đơn hàng mới nào</h3>
                        @endif
                            <div class="text-center">
                                <a href="/" class=" btn-info btn-lg mr-20" role="button" aria-pressed="true">
                                    <i class="ti-arrow-left"></i> Về Trang Chủ
                                </a>
                                <a href="{{route('shop.projects')}}" class=" btn-success btn-lg ml-20" role="button" aria-pressed="true">
                                    Tìm kiếm mẫu website <i class="ti-arrow-right"></i>
                                </a>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


