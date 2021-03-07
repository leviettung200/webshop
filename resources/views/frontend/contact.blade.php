@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-area ptb-100 " style="background-image: url(/frontend/img/my-img/banner-contact-2.png)" >
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Liên hệ</h2>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
                    <li> Liên hệ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area start -->
    <div class="contact-area ptb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    @include('frontend.layouts.formContact')
                </div>
                <div class="col-lg-5">
                    <div class="contact-info-wrapper">
                        <div class="contact-title">
                            <h4>Thông tin công ty</h4>
                        </div>
                        <div class="contact-info">
                            <div class="single-contact-info">
                                <h3>{{$setting->company}}</h3>
                            </div><div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="ti-location-pin"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Địa chỉ: </span>{{$setting->address}}</p>
                                </div>
                            </div>
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="pe-7s-mail"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Email: </span> <a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
                                </div>
                            </div>
                            <div class="single-contact-info">
                                <div class="contact-info-icon">
                                    <i class="pe-7s-call"></i>
                                </div>
                                <div class="contact-info-text">
                                    <p><span>Điện thoại: </span>
                                        <a href="tel:{{$setting->hotline}}">{{$setting->hotline}}</a> -
                                        <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6634680370653!2d105.93141831404536!3d21.00612298601064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a8d1f25ec27f%3A0x9f4efedf996e3ec3!2zVHJ1bmcgdMOibSBUaW4gaOG7jWMgSOG7jWMgdmnhu4duIE7DtG5nIG5naGnhu4dwIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1608206965252!5m2!1svi!2s"
                width="100%" height="400" frameborder="0" style="border:0; border-radius: 5px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
@endsection



{{--Use session flash--}}
