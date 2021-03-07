@extends('frontend.layouts.main')
@section('content')
<div style="background-color: #27c98d; height: 100px">

</div>
<section class=" my_page_404 pb-90" style="">
    <div class="container">
        <div class="col">
                <div >
                    <h2 class="text-center ">404</h2>
                </div>
                <div class="my_page_404_gif m-auto col-sm-6 text-center">

                    <div class="my_page_404_text">
                        <h3 class="mb-30">
                            Trang bạn tìm kiếm không có !
                        </h3>
                        <a href="#" class=" btn-success btn-lg" role="button" aria-pressed="true">
                            Về Trang Chủ
                        </a>
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection



{{--Use session flash--}}
