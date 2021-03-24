@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-area ptb-100 " style="background-image: url(/frontend/img/my-img/banner-contact-2.png)" >
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Mẫu Website</h2>
                <ul>
                    <li><a href="/">home</a></li>
                    <li><a href="{{route('shop.projects')}}">Mẫu website</a></li>
                    <li> {{$product->name}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area start -->
    <div class="product-details pt-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-12">
                    <div class="product-details-6 pr-70 pro-stick">
                        <div class="easyzoom easyzoom--overlay mb-30">
                            <a href="{{asset($product->image)}}">
                                <img src="{{asset($product->image)}}" alt="" style="max-width: 100%">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-12">
                    <div class="sidebar-active product-details-content">
                        <h3>{{$product->name}}</h3>
                        <div class="details-price">
                            <span>Liên hệ</span>
                        {!! $product->summary !!}

                        <div class="quickview-plus-minus">

                            <div class="quickview-btn-cart">
                                <a class="btn-hover-black" href="{{ route('shop.cart.add-to-cart', ['id' => $product->id]) }}">Thêm vào giỏ</a>
                            </div>
                            <div class="quickview-btn-wishlist">
                                <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                            </div>
                        </div>
                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Danh mục :</li>
                                @foreach($menu as $item)
                                    @if( $item->type == 1 && $item->id == $product->category_id)
                                        <li>
                                            <a href="{{route('shop.category',['slug'=>$item->slug])}}">{{$item->name}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-details-cati-tag mtb-10">
                            <ul>
                                <li class="categories-title">Tags :</li>
                                @php
                                    $tags = $product->tags;
                                    $tags = explode(",",$tags);

                                @endphp
                                @foreach($tags as $tag)
                                    <li><a href="{{route('shop.tagProducts',['tag'=>str_slug($tag)])}}">{{$tag}}</a></li>

                                @endforeach
                            </ul>
                        </div>
{{--                        <div class="product-share">--}}
{{--                            <ul>--}}
{{--                                <li class="categories-title">Share :</li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="icofont icofont-social-facebook"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#">--}}
{{--                                        <i class="icofont icofont-social-twitter"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description-review-area pb-90">
        <div class="container">
            <div class="product-description-review ">
                <div class="description-review-text tab-content">
                    <div class="tab-pane active show " id="pro-dec" >
                        {!! $product->description !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product area start -->
    <div class="product-area pb-95">
        <div class="container">
            <div class="section-title-3 text-center mb-50">
                <h2>Mẫu website liên quan</h2>
            </div>
            <div class="product-style">
                <div class="related-product-active owl-carousel">
                    @foreach($relatedPros as $relatedPro)
                    <div class="product-wrapper ">
                        <div class="product-img ">
                            <a href="{{route('shop.project.detail',['slug'=>$relatedPro->slug])}}" >
                                <img src="{{asset($relatedPro->image)}}" alt="">
                            </a>
                            @if($relatedPro->is_hot == 1)
                                <span>hot</span>
                            @endif
                        </div>
                        <div class="product-content">
                            <h4><a href="{{route('shop.project.detail',['slug'=>$relatedPro->slug])}}">{{$relatedPro->name}}</a></h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

