@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-area ptb-100 " style="background-image: url(/frontend/img/my-img/banner-contact-2.png)" >
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Mẫu Website</h2>
                <ul>
                    <li><a href="/">home</a></li>
                    <li><a href="{{route('shop.projects')}}">Mẫu Website</a></li>
                    <br>
                    <li>Từ khoá tìm kiếm: "{{isset($keyword) ? $keyword : ''}}" ({{$totalResult}})</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area start -->
    <div class="shop-page-wrapper shop-page-padding pt-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar mr-10">
                        <div class="sidebar-widget mb-30">
                            <h3 class="sidebar-title">Tìm kiếm</h3>
                            <div class="sidebar-search">
                                <form action="{{route('shop.search')}}" method="GET">
                                    <input value="{{isset($keyword) ? $keyword : ''}}" placeholder="Tìm mẫu website ..." type="text" name="keyword">
                                    <button><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="sidebar-widget mb-30">
                            <h3 class="sidebar-title">Dự án</h3>
                            <div class="sidebar-categories">
                                <ul>
                                    @foreach($list as $item)
                                        <li><a href="{{route('shop.category',['slug'=> $item['slug']])}}">{{$item['category']}} <span>{{$item['qty']}}</span></a></li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop-product-wrapper res-xl">
                        <div class="shop-bar-area">
                            <div class="shop-bar pb-60">
                                <div class="shop-found-selector">
                                        <label style="width: 100px">Sort By : </label>
                                        <select name="select" style="height: auto;cursor: pointer">
                                            <option value="">Default</option>
                                            <option value="">A to Z</option>
                                            <option value=""> Z to A</option>
                                            <option value="">In stock</option>
                                        </select>
                                </div>
                                <div class="shop-filter-tab">
                                    <div class="shop-tab nav" role=tablist>
                                        <a href="#grid-sidebar11" data-toggle="tab" role="tab" aria-selected="false">
                                            <i class="ti-layout-grid4-alt"></i>
                                        </a>
                                        <a class="active" href="#grid-sidebar12" data-toggle="tab" role="tab"
                                           aria-selected="true">
                                            <i class="ti-menu"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="shop-product-content tab-content">
                                <div id="grid-sidebar11" class="tab-pane fade">
                                    <div class="row">
                                        @foreach($products as $key=> $product)

                                            <div class="col-lg-6 col-md-6">
                                                <div class="product-wrapper mb-30 " style="box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.2);">
                                                    <div class="product-img">
                                                        <a href="{{route('shop.project.detail',['slug'=> $product])}}">
{{--                                                            @if($product->image)--}}
{{--                                                                <img src="{{asset($product->image)}}" alt="">--}}
{{--                                                            @endif--}}
                                                            <img src="{{asset($product->image)}}" alt="">
                                                        </a>
                                                        @if($product->is_hot == 1)
                                                            <span>hot</span>
                                                        @endif

                                                        <div class="product-action">
                                                            <a class="animate-left" title="Yêu thích" href="#">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                            <a class="animate-top" title="Thêm vào giỏ hàng" href="#">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                            <a class="animate-right" title="Xem ảnh" data-toggle="modal"
                                                               data-target="#exampleModal{{$key+1}}" href="#">
                                                                <i class="pe-7s-look"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-content mb-40 text-center">
                                                        <h4 class=" multi-line2"><a  href="{{route('shop.project.detail',['slug'=> $product->slug])}}">{{$product->name}}</a></h4>
                                                        <div class="product-tags">
                                                            <span>Tag: </span>
                                                            <ul>
                                                                @php
                                                                    $tags = $product->tags;
                                                                    $tags = explode(",",$tags);
                                                                @endphp
                                                                @foreach($tags as $tag)
                                                                    @if(!empty($tag))
                                                                        <li><a href="{{route('shop.tagProducts',['tag'=>str_slug($tag)])}}">{{$tag}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="grid-sidebar12" class="tab-pane fade active show">
                                    <div class="row">
                                        @foreach($products as $key=> $product)
                                            <div class="col-md-12 col-xl-6">
                                            <div
                                                class="product-wrapper mb-30 single-product-list product-list-right-pr mb-60">
                                                <div class="product-img list-img-width">
                                                    <a href="{{route('shop.project.detail',['slug'=> $product->slug])}}">
                                                        <img src="{{asset($product->image)}}" alt="">
                                                    </a>
                                                    @if($product->is_hot == 1)
                                                        <span>hot</span>
                                                    @endif
                                                    <div class="product-action-list-style">
                                                        <a class="animate-right" title="Xem ảnh" data-toggle="modal"
                                                           data-target="#exampleModal{{$key+1}}" href="#">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-content-list">
                                                    <div class="product-list-info ">
                                                        <h4 class="multi-line4"><a href="{{route('shop.project.detail',['slug'=> $product->slug])}}">{{$product->name}}</a></h4>
{{--                                                        <span>$150.00</span>--}}
{{--                                                            {!! $product->summary !!}--}}
                                                        <div class="product-tags mt-30">
                                                            <span>Tag: </span>
                                                            <ul style="min-height: 120px">
                                                                @php
                                                                    $tags = $product->tags;
                                                                    $tags = explode(",",$tags);

                                                                @endphp


                                                                @foreach($tags as $tag)
                                                                    @if(!empty($tag))
                                                                        <li><a href="{{route('shop.tagProducts',['tag'=>str_slug($tag)])}}">{{$tag}}</a></li>
                                                                    @endif
                                                                @endforeach


                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="product-list-cart-wishlist">
                                                        <div class="product-list-cart">
                                                            <a class="btn-hover list-btn-wishlist" href="#">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="product-list-wishlist">
                                                            <a class="btn-hover list-btn-wishlist" href="#">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-style mtb-10 text-center">
                        {{ $products->render("pagination::default") }}
                    </div>
            </div>
        </div>
    </div>
    <!-- modal -->
    @foreach($products as $key=> $product)
            <div class="modal fade" id="exampleModal{{$key+1}}" tabindex="-1" role="dialog" aria-hidden="true">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="pe-7s-close" aria-hidden="true"></span>
                </button>
                <div class="modal-dialog modal-quickview-width" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="product-details-img-content">
                                <div class="product-details-tab product-details-tab2">
                                    <div class="product-details-small nav mr-20 product-details-2" role=tablist>
                                        <a class="active mb-auto" href="#pro-details{{$key+1}}" data-toggle="tab" role="tab"
                                           aria-selected="true">
                                            <img src="{{asset($product->image)}}" alt="">
                                        </a>
                                        <a class="mb-auto" href="#pro-details{{$key+10}}" data-toggle="tab" role="tab"
                                           aria-selected="true">
                                            <img src="/frontend/img/my-img/Untitled.png" alt="">
                                        </a>
                                    </div>
                                    <div class="product-details-large tab-content">
                                        <div class="tab-pane fade active show" id="pro-details{{$key+1}}" role="tabpanel">
                                            <div class="easyzoom easyzoom--overlay  is-ready">
                                                <a href="{{asset($product->image)}}">
                                                    <img src="{{asset($product->image)}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="pro-details{{$key+10}}" role="tabpanel">
                                            <div class="easyzoom easyzoom--overlay  is-ready">
                                                <a href="/frontend/img/my-img/Untitled.png">
                                                    <img src="/frontend/img/my-img/Untitled.png" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        @endforeach

@endsection

