@extends('frontend.layouts.main')


@section('content')

    <!-- slider start -->
    <div id="home-area" class="height-100vh bg-img watch-slider my_bg_show"  style="background-image: url('{{asset($banner->image)}}')">
{{--    <style>.my_bg_show{background-image: url("{{asset($banner->image)}}");}</style>--}}
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 align-items-center">
                            <div class="slider-text">
                                <h2 class="tlt1">Thiết kế website <br>Chuyên nghiệp
                                </h2>
                                <div class="button-set">
                                    <a class="explore-btn " href="{{$banner->url}}">
                                        Tìm hiểu ngay <i class="ti-control-play"></i>
                                    </a>
{{--                                    <a class="explore-btn video-popup" href="https://www.youtube.com/watch?v=K4wEI5zhHB0">--}}
{{--                                        Liên hệ ngay <i class="ti-control-play"></i>--}}
{{--                                    </a>--}}
                                </div>

                            </div>
                        </div>
{{--                        <div class="col-md-6">--}}
{{--                            <div class="wacth-img tilter">--}}
{{--                                <!-- <img src="/frontend/img/my-img/Frame.png" alt="" > -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- overview area start -->
    <div class="overview-area pt-70 bg-img" style="background-image: url(/frontend/img/bg/8.jpg)">
        <div class="container">
            <div class="row">

                <div class="ml-auto col-lg-6">
                    <div class="watch-about-content text-center">
                        <h2>Về Chúng Tôi</h2>
                        <p>Được thành lập từ năm 2009 Sau 10 năm nỗ lực không ngừng, hàng nghìn khách hàng đã nhớ đến cái tên Vinaweb - Công ty hàng đầu trong lĩnh vực thiết kế web và quảng cáo trực tuyến. Với một đội ngũ chuyên gia có tư duy tốt, kỹ thuật chuyên môn cao, say mê công việc. Sự chuyên sâu tạo nên sức mạnh cho Vinaweb trong việc ngày càng nâng cao chất lượng dịch vụ cho khách hàng và đối tác. </p>
                        <a href="{{route('shop.about')}}" >Đọc thêm</a>
                    </div>
                </div>
                <div class=" col-lg-6">
                    <!-- <img src=".//frontend/img/my-img/Frame.png" alt="" width="90%"> -->
                    <div id="about-area" class="watch-about-area ">
                        <div class="container">
                            <div class="watch-about-content text-center">
                                <img class="tilter" src="/frontend/img/my-img/Frame.png" alt="" width="90%">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overview-area bg-img pt-70 pb-70" >
        <div class="container">
            <div class="row">
                <div class="col-lg-5 d-flex my-whyImg">
                    <img width="100%" style="margin: auto" src="/frontend/img/my-img/banner10_1.png" alt="">
                </div>
                <div class=" col-lg-7">
                    <div class="section-title-8 peragraph-width mb-30">
                        <h2>Tại Sao Nên Lựa Chọn Chúng Tôi</h2>
                        <p>Nếu bạn muốn có một website cao cấp, chuyên nghiệp để mang lại khách hàng cho bạn.
                            Vinaweb hướng đến điều đó.Chúng tôi không
                            cạnh tranh với đối thủ chỉ bằng giá cả...mà bằng chất lượng và giá trị mạng lại cho khách hàng!</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-overview">
                                <h4>Với đội ngũ nhân sự chuyên nghiệp</h4>
                                <p>Chuyên môn cao, luôn đam mê sáng tạo và tận tâm, trách nhiệm với khách hàng</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-overview">
                                <h4>Website được tối ưu cho đa trình duyệt</h4>
                                <p>Safari hay Chrome, Firefox hay Cốc Cốc, dù khách hàng của bạn dùng trình duyệt phổ biến nào cũng được</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-overview">
                                <h4>Website được tối ưu cho đa thiết bị</h4>
                                <p>Website hiển thị tốt trên máy bàn, laptop, máy tính bảng, điện thoại, thậm chí là cả... tivi</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-overview">
                                <h4>Website mã nguồn riêng bảo mật cao</h4>
                                <p>Bảo mật cao để website không bị hack, không bị đánh cắp thông tin đơn hàng </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- features area start -->
    <div class="power-feathers-area">
        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    <div class="section-title-8 peragraph-width mb-20">
                        <h2>Tăng Trưởng Doanh Thu Vượt Bậc.</h2>
                        <p>Hiệu quả chính là mục tiêu hàng đầu của chúng tôi mỗi khi bắt đầu thiết kế website cho khách hàng. </p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="single-power-feathers-wrapper">
                                <div class="single-power-feathers mb-30">
                                    <img src="/frontend/img/icon-img/29.png" alt="">
                                    <h4>Mở rộng bán hàng đa kênh</h4>
                                    <p>Website bán hàng giúp bạn mở rộng hình thức kinh doanh từ offline sang online để tiếp cận khách hàng nhiều hơn.</p>
                                </div>
                                <div class="single-power-feathers mb-30">
                                    <img src="/frontend/img/icon-img/32.png" alt="">
                                    <h4>Dễ dàng thanh toán</h4>
                                    <p>Vinaweb đã tích hợp sẵn các phương thức thanh toán đa dạng như ATM, thẻ tín dụng (Visa), Chuyển khoản ngân hàng, COD,...</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="single-power-feathers-wrapper">
                                <div class="single-power-feathers mb-30 ">
                                    <img src="/frontend/img/icon-img/30.png" alt="">
                                    <h4>Đa dạng vận chuyển</h4>
                                    <p>Khách hàng của bạn có thể tự do tùy chọn phương thức vận chuyển phù hợp với nhu cầu.</p>
                                </div>
                                <div class="single-power-feathers mb-30 ">
                                    <img src="/frontend/img/icon-img/33.png" alt="">
                                    <h4>Tích hợp Marketing thông minh</h4>
                                    <p>Cải thiện thứ hạng website với công cụ SEO vượt trội. Đẩy mạnh doanh thu bán hàng với Email Marketing tự động.

                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="single-power-feathers-wrapper">
                                <div class="single-power-feathers mb-30 ">
                                    <img src="/frontend/img/icon-img/31.png" alt="">
                                    <h4>Tích hợp nền tảng giao tiếp khách hàng</h4>
                                    <p>Khách hàng của bạn có thể gửi tin nhắn cho bạn trên website hay app trên điện thoại dù họ ở bất cứ đâu.</p>
                                </div>
                                <div class="single-power-feathers mb-30">
                                    <img src="/frontend/img/icon-img/34.png" alt="">
                                    <h4>Lưu trữ & phân tích khách hàng</h4>
                                    <p>Công cụ quản lý thông tin khách hàng - CRM dễ sử dụng, việc quản lý dữ liệu sẽ đơn giản hơn bao giờ hết. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex">
                    <img width="100%" style="margin: auto" src="/frontend/img/my-img/cham-soc-website.png" alt="">
                </div>
            </div>

        </div>
    </div>
    <!-- product area start -->
    <div id="shop-area" class="product-area smart-watch-res pt-50">
        <div class="container">
            <div class="section-title-8 peragraph-width-3 mb-15 text-center">
                <h2>Sản phẩm nổi bật</h2>
                <p>Với hơn 500 giao diện Website đa dạng ngành nghề

                </p>
            </div>
            <div class="product-tab-list text-center nav " role="tablist">
                @foreach($arr as $key => $item)
                    @if($key == 0 )
                        <a class="active" href="#furniture{{$key+1}}" data-toggle="tab" role="tab" >
                            <h4>{{$item['category']->name}}</h4>
                        </a>
                    @else
                        <a href="#furniture{{$key+1}}" data-toggle="tab" role="tab" >
                            <h4>{{$item['category']->name}}</h4>
                        </a>
                    @endif

                @endforeach
            </div>
            <div class="tab-content">
                @foreach($arr as $key => $item)
                    @if($key == 0 )
                        <div class="tab-pane active show fade" id="furniture{{$key+1}}" role="tabpanel" >
                            @else
                                <div class="tab-pane fade" id="furniture{{$key+1}}" role="tabpanel" >
                                    @endif
                                    <div class="smart-watch-product-active owl-carousel">
                                @foreach($item['products'] as $product)
                                    <div>
                                        <div class="smart-watch-product-wrapper my-custom-scoll">
                                            <a href="{{route('shop.project.detail',['slug'=> $product->slug])}}" class="my-scroll">
                                                @if($product->image)
                                                    <img src="{{asset($product->image)}}" alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="smart-watch-content">
                                            <h4 class="multi-line2"><a href="{{route('shop.project.detail',['slug'=> $product->slug])}}">{{$product->name}}</a></h4>
                                            <a href="{{ route('shop.cart.add-to-cart', ['id' => $product->id]) }}">Thêm vào giỏ</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                @endforeach


            </div>


            <div class="catch-btn mt-0">
                <a class="discount-btn-2 btn-hover" href="{{route('shop.projects')}}"  style="border: 1px solid;">Xem tất cả</a>
            </div>

        </div>
    </div>

    <!-- feadback area start -->
    <div class="pricing-table-area">
        <div class="container">

            <div class="section-title-8 peragraph-width-3 mb-15 text-center">
                <h2>Bảng giá Website trọn gói </h2>
                <p>Công nghệ web hàng đầu – Tiết kiệm Chi Phí – Bàn giao web nhanh chóng
                </p>
            </div>

            <div class="row">
                @foreach($packages as $key => $package)

                        <div class="col-md-4">
                            @if($key == 1)
                            <div class="single-table popular">
                                <div class="popular-price">Nổi bật</div>
                            @else
                                <div class="single-table">
                            @endif
                                <h4>{{$package->name}}</h4>
                                <h2><span>Chỉ từ </span>{{ number_format($package->value ,0,",",".") }}<span> VNĐ</span></h2>
                                <ul  class="my-custom-scrollbar " id="my-style-scrollbar">
                                   {!! $package->summary !!}
                                </ul>
                                <a role="button" href="{{route('shop.contact')}}">Gửi yêu cầu</a>
                            </div>
                        </div>

                @endforeach
            </div>
        </div>
    </div>
    <div style="background-image: url(/frontend/img/bg/16.jpg)">
        <div class="section-title-8 peragraph-width-3 text-center pt-50" >
            <h2>Khách hàng của chúng tôi</h2>
            <p>Vinaweb luôn có gắng nỗ lực để tạo ra những website chất lượng và hài lòng khách hàng.
                Sự hài lòng của khách hàng chính là thành công lớn nhất của chúng tôi

            </p>
        </div>
        <div class="brand-logo-area-3 wrapper-padding-7 pb-50 bg-img" >
            <div class="container-fluid">
                <div class="brand-logo-active3 owl-carousel owl-theme d-flex">
                    @foreach($brands as $brand)
                        <div class="single-brand" style="margin: auto">
                            <img src="{{asset($brand->image)}}"  alt="" >
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="footer-middle black-bg-2 ptb-30">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="footer-services-wrapper">
                        <div class="footer-services-icon">
                            <i class="pe-7s-medal"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Số 1 hậu mãi</h3>
{{--                            <p>Free Shipping on Bangladesh</p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-services-wrapper">
                        <div class="footer-services-icon">
                            <i class="pe-7s-shield"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Bảo mật tuyệt đối</h3>
{{--                            <p>Free Shipping on Bangladesh</p>--}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer-services-wrapper">
                        <div class="footer-services-icon">
                            <i class="pe-7s-headphones"></i>
                        </div>
                        <div class="footer-services-content">
                            <h3>Hỗ Trợ 24/7</h3>
{{--                            <p>Free Shipping on Bangladesh</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')
