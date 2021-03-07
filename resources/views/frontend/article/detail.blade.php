@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-area ptb-100 " style="background-image: url(/frontend/img/my-img/banner-contact-2.png)" >
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Tin tức</h2>
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li><a href="{{route('shop.articles')}}">Tin tức</a></li>
                    <li> {{$article->title}}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- blog -->
    <div class="blog-details pt-50 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-info">
                        <h3 class="mb-0">{{$article->title}} </h3>

                        <div class="blog-meta mt-20 mb-40">
                            <ul>
                                <li><i class="ti-calendar mr-10"></i>{{date('d/m/Y',strtotime($article->updated_at)) }}</li>
                            </ul>
                        </div>
                        <img src="{{asset($article->image)}}" alt="">
                        {!! $article->summary !!}
                        <div class="blog-feature">
                            {!! $article->description !!}

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="shop-sidebar">
                        <h3 class="sidebar-title">Bài viết gần đây</h3>
                        @foreach($newArticles as $item)
                            <div class="blog-wrapper mb-40">
                                <div class="blog-img blog-hover">
                                    <a href="{{route('shop.article.detail',['slug'=> $item->slug])}}"><img src="{{asset($item->image)}}" alt=""></a>
                                </div>
                                <div class="blog-info-wrapper">
                                    <div class="blog-meta mt-10">
                                        <ul>
                                            <li><i class="ti-calendar mr-10"></i>{{date('d/m/Y',strtotime($item->updated_at)) }}</li>
                                        </ul>
                                    </div>
                                    <h4 ><a href="{{route('shop.article.detail',['slug'=> $item->slug])}}">{{$item->title}}</a></h4>
{{--                                        {!! $item->summary !!}--}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



{{--Use session flash--}}
