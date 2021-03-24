@extends('frontend.layouts.main')
@section('content')
    <div class="breadcrumb-area ptb-100 " style="background-image: url(/frontend/img/my-img/banner-contact-2.png)" >
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Tin tức</h2>
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li> Tin tức</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- blog -->
    <div class="blog-area pt-95 pb-100">
        <div class="container">
            <div class="blog-mesonry">
                <div class="row " >
                    @foreach($articles as $article)
                        <div class="col-lg-4 col-md-6 " >
                            <div class="blog-wrapper mb-40">
                                <div class="blog-img blog-hover">
                                    <a href="{{route('shop.article.detail',['slug'=> $article->slug])}}"><img src="{{asset($article->image)}}" alt=""></a>
                                </div>
                                <div class="blog-info-wrapper">
                                    <div class="blog-meta mt-10">
                                        <ul>
                                            <li><i class="ti-calendar mr-10"></i>{{date('d/m/Y',strtotime($article->updated_at)) }}</li>
                                        </ul>
                                    </div>
                                    <h4 ><a href="{{route('shop.article.detail',['slug'=> $article->slug])}}">{{$article->title}}</a></h4>
                                    {!! $article->summary !!}
                                    <a class="blog-btn btn-hover" href="{{route('shop.article.detail',['slug'=> $article->slug])}}">Đọc thêm</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination-style mtb-10 text-center">
                    {{ $articles->render("pagination::default") }}
                </div>
            </div>
        </div>
    </div>
@endsection



{{--Use session flash--}}
