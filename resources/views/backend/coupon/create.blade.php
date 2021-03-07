@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Thêm mới danh mục <a href="{{route('admin.category.index')}}" class="btn bg-olive"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.coupon.store')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mã</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập mã">
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="type">
                                    <option value="1">Theo số tiền</option>
                                    <option value="2">Theo phần trăm</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Trị giá</label>
                                <input type="number" class="form-control" id="value" name="value" >
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Tạo</button>
                            <input type="reset" class="btn btn-default pull-right" value="Reset">

                        </div>
                    </form>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
