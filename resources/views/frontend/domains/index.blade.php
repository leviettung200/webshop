@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-area ptb-100 " style="background-image: url(/frontend/img/my-img/banner-contact-2.png)" >
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Tên miền</h2>
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li> Đăng ký tên miền</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blog-area pt-50">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2 >Tra cứu tên miền</h2>
                <p style="font-size: 20px">Kiểm tra & Đăng ký tên miền ngay để bảo vệ thương hiệu của doanh nghiệp trên Internet

                </p>
            </div>

            <div class="container">
                <form action="" method="GET" id="checkDomain">
                    @csrf
                    <div class="col-lg-10" style="margin: 0 auto">
                        <div class="simple-search ">
                            <input required id="keyDomain" name="keyDomain" type="text" autofocus placeholder="Nhập tên miền bạn muốn đăng ký, tra cứu"/>
                            <button type="submit" >Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9" style="margin: 50px auto">
                <div class="dm_list" >
                    <div class="dm_item" onclick="addName()" data-tl=".com">
                        <p class="dm_name">.com</p>
                        <p class="dm_price">185.222 VNĐ</p>
                    </div>
                    <div class="dm_item">
                        <p class="dm_name">.vn</p>
                        <p class="dm_price">106.322 VNĐ</p>
                    </div>
                    <div class="dm_item">
                        <p class="dm_name">.xyz</p>
                        <p class="dm_price">56.885 VNĐ</p>
                    </div>
                    <div class="dm_item">
                        <p class="dm_name">.net</p>
                        <p class="dm_price">32.664 VNĐ</p>
                    </div>
                    <div class="dm_item">
                        <p class="dm_name">.live</p>
                        <p class="dm_price">29.630 VNĐ</p>
                    </div>
                    <div class="dm_item">
                        <p class="dm_name">.ai</p>
                        <p class="dm_price">44.512 VNĐ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-12">
            <div class="row align-items-center">
                <div class="col-sm-8" style="margin: 0 auto">
                    <p class=" text-center " id="resultDomain" >

                    </p>
                </div>
            </div>
        </div>
{{--        <div class="col-md-10 pb-30" style="margin: 0 auto">--}}
{{--            <div class="search-result">--}}
{{--                <div class="row align-items-center">--}}

{{--                    <div class="col-sm-10">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-sm-8">--}}
{{--                                <h4 class="search-result-title"><span >vinhoang.com</span></h4>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-4 border-right">--}}
{{--                                <p class="search-result-right">--}}
{{--                                    <strong class="price-initialization">--}}
{{--                                    <span >286.000</span> VNĐ/năm</strong>--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-2">--}}
{{--                        <a href="javascript:void(0);" class="btn-request text-center"  id="ChonMua_8658" style="">Chọn mua</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>

{{--    <div class="container">--}}
{{--        <div class="more-result">--}}
{{--            <div class="col-12 pb-10 pt-30">--}}
{{--                <h3 class="section-title">Tên miền khác bạn có thể đăng ký</h3>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="list-more">--}}
{{--            <div class="col-md-10 pb-1" style="margin: 0 auto">--}}
{{--                <div class="search-result">--}}
{{--                    <div class="row align-items-center">--}}
{{--                        <div class="col-sm-12">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col-sm-5">--}}
{{--                                    <h4 class="search-result-title domain-used"><span >vinhhoang.net</span></h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-7 border-right">--}}
{{--                                    <p class="no-search-results text-center" >--}}
{{--                                        <span class="">Rất tiếc, tên miền <strong >vinhhoang.net</strong> đã được đăng ký</span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-10 pb-1" style="margin: 0 auto">--}}
{{--                <div class="search-result">--}}
{{--                    <div class="row align-items-center">--}}

{{--                        <div class="col-sm-10">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <h4 class="search-result-title"><span >vinhoang.xyz</span></h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4 border-right">--}}
{{--                                    <p class="search-result-right">--}}
{{--                                        <strong class="price-initialization">--}}
{{--                                            <span >286.000</span> VNĐ/năm</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-2">--}}
{{--                            <a href="javascript:void(0);" class="btn-request text-center"  id="ChonMua_8658" style="">Chọn mua</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-10 pb-1" style="margin: 0 auto">--}}
{{--                <div class="search-result">--}}
{{--                    <div class="row align-items-center">--}}

{{--                        <div class="col-sm-10">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <h4 class="search-result-title"><span >vinhoang.live</span></h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4 border-right">--}}
{{--                                    <p class="search-result-right">--}}
{{--                                        <strong class="price-initialization">--}}
{{--                                            <span >286.000</span> VNĐ/năm</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-2">--}}
{{--                            <a href="javascript:void(0);" class="btn-request text-center"  id="ChonMua_8658" style="">Chọn mua</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-10 pb-1" style="margin: 0 auto">--}}
{{--                <div class="search-result">--}}
{{--                    <div class="row align-items-center">--}}

{{--                        <div class="col-sm-10">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <h4 class="search-result-title"><span >vinhoang.vn</span></h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4 border-right">--}}
{{--                                    <p class="search-result-right">--}}
{{--                                        <strong class="price-initialization">--}}
{{--                                            <span >286.000</span> VNĐ/năm</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-2">--}}
{{--                            <a href="javascript:void(0);" class="btn-request text-center"  id="ChonMua_8658" style="">Chọn mua</a>--}}
{{--                        </div>--}}



{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-10 pb-1" style="margin: 0 auto">--}}
{{--                <div class="search-result">--}}
{{--                    <div class="row align-items-center">--}}

{{--                        <div class="col-sm-10">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <div class="col-sm-8">--}}
{{--                                    <h4 class="search-result-title"><span >vinhoang.org</span></h4>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4 border-right">--}}
{{--                                    <p class="search-result-right">--}}
{{--                                        <strong class="price-initialization">--}}
{{--                                            <span >286.000</span> VNĐ/năm</strong>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-2">--}}
{{--                            <a href="javascript:void(0);" class="btn-request text-center"  id="ChonMua_8658" style="">Chọn mua</a>--}}
{{--                        </div>--}}



{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
    <div class="pb-50 about-domain mt-50">

        <div class="container">
            <!-- Nav tabs -->
            <div class="row just-domain">
                <ul class="nav nav-tabs" role="tablist" style="font-size: 18px">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Tên miền là gì?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">Điểm nổi bật</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu2">Câu hỏi thường gặp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu3">Bảng giá</a>
                    </li>
                </ul>
{{--                <div class="col-lg-3">--}}
{{--                    <div class="center align-content-end product-nav-button">--}}
{{--                        <button class="button button-large ripple-magic" >Nhận tư vấn</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>

            <!-- Tab panes -->
            <div class="tab-content pt-20 only-domain">
                <div id="home" class="container tab-pane active"><br>
                    <div class="row">
                        <div class="col-md-5 "><img alt="" class="img-fluid" height="" src="/frontend/img/domain/thongtin-domain.png" width=""></div>

                        <div class="col-md-7" >
                            <div class="tab-review-content">
                                <p style="text-align: justify; font-size: 16px">Tên miền (Domain) là tên của một website hoạt động trên internet, đóng vai trò là một địa chỉ vật lý. Nó giống như là địa chỉ nhà hay zip code để giúp các thiết bị định tuyến vệ tinh dẫn đường. Một trình duyện cũng cần một tên miền để dẫn đường tới website của bạn.&nbsp;Khi&nbsp;sở hữu một tên miền, đối tượng khách hàng của bạn giờ đây đã không còn bị giới hạn về mặt địa lý hay thời gian&nbsp;mà hoàn toàn có thể truy cập, mua hàng online trên&nbsp;Website của bạn&nbsp;mọi lúc mọi nơi.</p>

                                <p style="text-align: justify; font-size: 16px">Hoảng Vinh cung cấp rất nhiều tên miền chuyên nghiệp&nbsp;với đa dạng các đuôi tên miền&nbsp;khác nhau, tùy theo&nbsp;mục đích sử dụng và nhu cầu của khách hàng.</p>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                    <h4>Vì sao đăng ký tên miền tại Hoàng Vinh?</h4>
                    <div class="power-feathers-area pt-30">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <div class="single-power-feathers-wrapper">
                                        <div class="single-power-feathers mb-30">
                                            <img src="/frontend/img/domain/bn-domain-2.svg" alt="" style="height: 100px">
                                            <h4>Quản lý tên miền</h4>
                                            <p>Bạn hoàn toàn chủ động trong việc quản lý và gia hạn dịch vụ Tên miền</p>
                                        </div>
                                        <div class="single-power-feathers mb-30">
                                            <img src="/frontend/img/domain/clound-shield.svg" alt="">
                                            <h4>An toàn pháp lý</h4>
                                            <p>Đăng ký tên miền tại nhà đăng ký Việt Nam giúp hạn chế rủi ro về mặt pháp lý
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="single-power-feathers-wrapper">
                                        <div class="single-power-feathers mb-30 ">
                                            <img src="/frontend/img/domain/dns.svg" alt="">
                                            <h4>Quản lý DNS</h4>
                                            <p>Tính năng DNS trung gian với giao diện quản lý đơn giản được tích hợp sẵn
                                            </p>
                                        </div>
                                        <div class="single-power-feathers mb-30 ">
                                            <img src="/frontend/img/domain/monitor4.svg" alt="">
                                            <h4>Uy tín thương hiệu
                                            </h4>
                                            <p>Việc sở hữu tên miền .VN giúp tăng tính nhận diện thương hiệu
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="single-power-feathers-wrapper">
                                        <div class="single-power-feathers mb-30 ">
                                            <img src="/frontend/img/domain/shield2.svg" alt="">
                                            <h4>Ẩn thông tin tên miền
                                            </h4>
                                            <p>Dịch vụ ID Protection giúp bạn ẩn các thông tin tên miền quan trọng
                                            </p>
                                        </div>
                                        <div class="single-power-feathers mb-30">
                                            <img src="/frontend/img/domain/vn.svg" alt="">
                                            <h4>Tốt cho SEO
                                            </h4>
                                            <p>Đăng ký tên miền .VN tại địa phương nhằm tăng tính nhận diện vùng hoạt động
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu2" class="container tab-pane fade"><br>
                    <h4 class="pb-30">Một vài kiến thức cơ bản và thắc mắc thường gặp về dịch vụ Tên miền</h4>
                    <div class="row">
                        <div class="col-lg-6 ">
                                <!-- Accordion -->
                                <div  class="accordion shadow">
                                    <!-- Accordion item 1 -->
                                    <div class="card">
                                        <div id="headingOne" class="card-header  shadow-sm border-0">
                                            <h6 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark  collapsible-link py-2">
DNS là gì?</a></h6>
                                        </div>
                                        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                                            <div class="card-body p-5">
                                                <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion item 2 -->
                                    <div class="card">
                                        <div id="headingTwo" class="card-header  shadow-sm border-0">
                                            <h6 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-block position-relative collapsed text-dark  collapsible-link py-2">
Điều kiện để đăng ký tên miền?</a></h6>
                                        </div>
                                        <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                                            <div class="card-body p-5">
                                                <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Accordion item 3 -->
                                    <div class="card">
                                        <div id="headingThree" class="card-header  shadow-sm border-0">
                                            <h6 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-block position-relative collapsed text-dark  collapsible-link py-2">Thông tin tên miền của tôi sẽ được công khai?
</a></h6>
                                        </div>
                                        <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                                            <div class="card-body p-5">
                                                <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <div class="col-lg-6 ">
                            <!-- Accordion -->
                            <div  class="accordion shadow">
                                <!-- Accordion item 4 -->
                                <div class="card">
                                    <div id="heading4" class="card-header  shadow-sm border-0">
                                        <h6 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4" class="d-block position-relative collapsed text-dark  collapsible-link py-2">Tôi muốn chuyển tên miền Quốc tế đăng ký nơi khác về HV thì làm thế nào?</a></h6>
                                    </div>
                                    <div id="collapse4" aria-labelledby="heading4" data-parent="#accordionExample" class="collapse ">
                                        <div class="card-body p-5">
                                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion item 5 -->
                                <div class="card">
                                    <div id="heading5" class="card-header  shadow-sm border-0">
                                        <h6 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5" class="d-block position-relative collapsed text-dark  collapsible-link py-2">
Khi đăng ký sai tên miền có thể hủy đăng ký không? </a></h6>
                                    </div>
                                    <div id="collapse5" aria-labelledby="heading5" data-parent="#accordionExample" class="collapse">
                                        <div class="card-body p-5">
                                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Accordion item 6 -->
                                <div class="card">
                                    <div id="heading6" class="card-header  shadow-sm border-0">
                                        <h6 class="mb-0"><a href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6" class="d-block position-relative collapsed text-dark  collapsible-link py-2">Tên miền đăng ký tối đa là bao lâu? </a></h6>
                                    </div>
                                    <div id="collapse6" aria-labelledby="heading6" data-parent="#accordionExample" class="collapse">
                                        <div class="card-body p-5">
                                            <p class="font-weight-light m-0">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="pt-30">
                        <a class="btn-learn-more float-right " href="" style="font-size: 20px; color: darkred">Liên hệ ngay <i class="ti-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script>
        function addName(){
            var text=document.getElementById("keyDomain").value;
            var more=document.querySelector(".dm_item");
            document.getElementById("keyDomain").value= text + more.dataset.tl
        }
        $(document).ready(function(){
            $(".nav-tabs a").click(function(){
                $(this).tab('show');
            });
        });
        // Get the form.
        let formDM = $('#checkDomain');

        // Get the messages div.
        let messDM = $('#resultDomain');
        let resultDomain = document.getElementById("resultDomain");

        let loading = '<div class="dots-loading">\n' +
            '                            <div></div>\n' +
            '                            <div></div>\n' +
            '                            <div></div>\n' +
            '                            <div></div>\n' +
            '                        </div>';

        // Set up an event listener for the contact form.
        $(formDM).on('submit', function (e) {

            e.preventDefault();
            $(messDM).empty();
            $(messDM).append(loading);
            resultDomain.scrollIntoView({behavior: "smooth",block: "center"});

            $.ajax({
                type: 'GET',
                url: "{{ route('checkDomain') }}",
                data: $(formDM).serialize(),
                success: function(response) {

                    $(messDM).removeClass('text-danger');
                    $(messDM).addClass('text-success');

                    //set text
                    $(messDM).empty();
                    $(messDM).append(response.result);

                }, error: function(error) {

                    $(messDM).removeClass('text-success');
                    $(messDM).addClass('text-danger');

                    //set text
                    $(messDM).empty();
                    $(messDM).append(error.responseJSON['result']);

                }
            })

        });
    </script>
@endsection

{{--Use session flash--}}
