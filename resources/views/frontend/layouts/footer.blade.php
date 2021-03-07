<!-- footer area start -->
<footer id="contact-area" class="footer-area" style="background-image: url(/frontend/img/bg/7.jpg); border-top: 1px solid gray;">
    <div class="footer-top-area pt-50 wrapper-padding-5">
        <div class="container-fluid">
            <div class="widget-wrapper">

                <div class="footer-widget mb-30 col-lg-4">
                    <img class="mb-10" src="{{asset($setting->image)}}" alt="" style="width: 250px">
                    <div class="footer-info-wrapper-3">
                        <div class="footer-address-furniture ">
                            <div class="footer-info-icon3">
                                <span>Địa chỉ: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p>{{$setting->address}}</p>
                            </div>
                        </div>
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>Hotline: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p>
                                    <a href="tel:{{$setting->hotline}}">{{$setting->hotline}}</a>
                                    <br><a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
                                </p>
                            </div>
                        </div>
                        <div class="footer-address-furniture">
                            <div class="footer-info-icon3">
                                <span>E-mail: </span>
                            </div>
                            <div class="footer-info-content3">
                                <p>
                                    <a href="mailto:{{$setting->email}}"> {{$setting->email}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-widget ">
                    <h3 class="footer-widget-title-5">Dịch vụ</h3>
                    <div class="footer-widget-content-3">
                        <ul>
                            <li><a href="about-us.html">Thiết kế website trọn gói</a></li>
                            <li><a href="#">Thiết kế website HCM</a></li>
                            <li><a href="#">Thiết kế website Hà Nội</a></li>
                            <li><a href="#">Thiết kế Landing Page</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget ">
                    <h3 class="footer-widget-title-5">Chính sách</h3>
                    <div class="footer-widget-content-3">
                        <ul>
                            <li><a href="about-us.html">Bảo mật</a></li>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Điều khoản</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-widget mb-30">
                    <h3 class="footer-widget-title-5">Đăng ký</h3>
                    <div class="footer-newsletter-2">
                        <p>Nhận tin tức khuyến mãi hoặc cập nhật mới</p>
                        <div id="mc_embed_signup" class="subscribe-form-5">
                            <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate="">
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input type="email" value="" name="EMAIL" class="email" placeholder="Email ..." required="">
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value="" ></div>
                                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom ptb-10 gray-bg-8">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="copyright-furniture">
                        <p>Make by Me with <i class="ti-heart"></i>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="tel:{{$setting->phone}}" class="phone-drag"><i class="Phone is-animating"></i></a>
