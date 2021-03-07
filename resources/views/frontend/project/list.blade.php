@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-area ptb-100 " style="background-image: url(/frontend/img/my-img/banner-contact-2.png)" >
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Mẫu Website</h2>
                <ul>
                    <li><a href="/">home</a></li>
                    <li> Mẫu Website</li>
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
{{--                        <div class="sidebar-widget mb-30">--}}
{{--                            <h3 class="sidebar-title">Filter by Price</h3>--}}
{{--                            <div class="price_filter">--}}
{{--                                <div id="slider-range"></div>--}}
{{--                                <div class="price_slider_amount">--}}
{{--                                    <div class="label-input">--}}
{{--                                        <label>price : </label>--}}
{{--                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />--}}
{{--                                    </div>--}}
{{--                                    <button type="button">Filter</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
{{--                        <div class="sidebar-widget mb-30">--}}
{{--                            <h3 class="sidebar-title">tag</h3>--}}
{{--                            <div class="product-tags">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#">Clothing hinh sau nưa</a></li>--}}
{{--                                    <li><a href="#">Bag</a></li>--}}
{{--                                    <li><a href="#">Women</a></li>--}}
{{--                                    <li><a href="#">Tie</a></li>--}}
{{--                                    <li><a href="#">Women</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="sidebar-widget mb-30">--}}
{{--                            <h3 class="sidebar-title">size</h3>--}}
{{--                            <div class="product-size">--}}
{{--                                <ul>--}}
{{--                                    <li><a href="#">xl</a></li>--}}
{{--                                    <li><a href="#">m</a></li>--}}
{{--                                    <li><a href="#">l</a></li>--}}
{{--                                    <li><a href="#">ml</a></li>--}}
{{--                                    <li><a href="#">lm</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop-product-wrapper res-xl">
                        <div class="shop-bar-area">
                            <div class="shop-bar pb-60">
                                <div class="shop-found-selector">
                                        <label style="width: 100px">Lọc theo : </label>
                                    <form action="" method="GET">
                                        @csrf
                                        <select name="sort" id="sort" style="height: auto;cursor: pointer">
                                            <option value="{{Request::url()}}?sort_by=none"> Mặc định</option>
                                            <option value="{{Request::url()}}?sort_by=hot"> HOT</option>
                                            <option value="{{Request::url()}}?sort_by=az"> Tên từ A đến Z</option>
                                            <option value="{{Request::url()}}?sort_by=za"> Tên từ Z đến A</option>
                                        </select>
                                    </form>

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
                                                        <a href="{{route('shop.project.detail',['slug'=> $product->slug])}}">
{{--                                                            @if($product->image)--}}
{{--                                                                <img src="{{asset($product->image)}}" alt="">--}}
{{--                                                            @endif--}}
                                                            <img src="{{asset($product->image)}}" alt="">
                                                        </a>
                                                        @if($product->is_hot == 1)
                                                            <span>hot</span>
                                                        @endif

                                                        <div class="product-action">
                                                            <a class="animate-left" title="Yêu thích" href="javascript:void(0)">
                                                                <i class="pe-7s-like"></i>
                                                            </a>
                                                            <a class="animate-top" title="Thêm vào giỏ hàng" href="{{ route('shop.cart.add-to-cart', ['id' => $product->id]) }}">
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
                                                            <a title="Thêm vào giỏ" class="btn-hover list-btn-wishlist" href="{{ route('shop.cart.add-to-cart', ['id' => $product->id]) }}">
                                                                <i class="pe-7s-cart"></i>
                                                            </a>
                                                        </div>
                                                        <div class="product-list-wishlist">
                                                            <a class="btn-hover list-btn-wishlist" href="javascript:void(0)">
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function (){
            $('#sort').on('change', function (){
                let url =$(this).val();
                if (url){
                        window.location = url;
                    }
                    return false;
            });
        })
    </script>
@endsection
