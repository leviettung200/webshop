<header>
    <div class="header-bottom wrapper-padding-2 res-header-sm sticker header-sticky">
        <div class="container-fluid">
            <div class="header-bottom-wrapper">
                <div class="" style="max-width: 150px">
                    <a href="/">
                        <img src="{{asset($setting->image)}}" alt="" style="max-width: 100%">
                    </a>
                </div>
                <div class="menu-style-2 handicraft-menu menu-hover">
                    <nav>
                        <ul>
                            <li><a href="/">Trang chủ </a></li>
                            <li><a href="{{route('shop.about')}}">Giới thiệu </a></li>
                            <li><a href="{{route('shop.projects')}}">Mẫu Website<i class="pe-7s-angle-down"></i></a>
                                <ul class="single-dropdown">
                                    @foreach($menu as $item)
                                        @if( $item->type == 1)
                                            <li>
                                                <a href="{{route('shop.category',['slug'=>$item->slug])}}">{{$item->name}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('shop.articles')}}">Tin tức </a></li>
                            <li><a href="{{route('shop.contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="handicraft-search-cart">
                    <div class="handicraft-search">
                        <button class="search-toggle">
                            <i class="pe-7s-search s-open"></i>
                            <i class="pe-7s-close s-close"></i>
                        </button>
                        <div class="handicraft-content">
                            <form action="{{route('shop.search')}}" method="GET">
                                <input value="{{isset($keyword) ? $keyword : ''}}" placeholder="Search" type="text" name="q">
                            </form>
                        </div>
                    </div>
                    <div class="header-cart-4">
                        <a class="icon-cart" href="{{route('shop.cart')}}">
                            <i class="pe-7s-shopbag"></i>
                            <span class="handicraft-count"> {{ !empty(session('totalItem')) ? session('totalItem') : 0 }}</span>
                        </a>
{{--                        <ul class="cart-dropdown">--}}
{{--                            @include('frontend.cart.overlay')--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="mobile-menu-area handicraft-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active" style="display: block;">
                            <ul class="menu-overflow">
                                <li><a href="/">Trang chủ </a></li>
                                <li><a href="{{route('shop.about')}}">Giới thiệu </a></li>
                                <li><a href="{{route('shop.projects')}}">Mẫu Website</a>
                                    <ul style="display: block;">
                                        @foreach($menu as $item)
                                            @if( $item->type == 1)
                                                <li>
                                                    <a href="{{route('shop.category',['slug'=>$item->slug])}}">{{$item->name}}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                            <a class="mean-expand mean-clicked" href="#" style="font-size: 18px">-</a>
                                    </ul>
                                </li>

                                <li><a href="{{route('shop.articles')}}">Tin tức </a></li>
                                <li><a href="{{route('shop.contact')}}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
