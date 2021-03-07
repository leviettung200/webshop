@extends('backend.layouts.main')
@section('content')
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <section class="header">
                    <h1>
                        Thông Tin <a href="{{route('admin.category.index')}}" class="btn btn-success pull-right"><i class="fa fa-list"></i> Danh Sách</a>
                    </h1>
                </section>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td><b>Tên danh mục:</b></td>
                                <td>{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Hình ảnh:</b></td>
                                <td><img src="{{ asset($data->image) }}" alt="" style=" width: 66%"></td>
                            </tr>
                            <tr>
                                <td><b>Danh mục cha:</b></td>
                                <td>{{ $data->parent->name or '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Vị trí:</b></td>
                                <td>{{ $data->position }}</td>
                            </tr>
                            <tr>
                                <td><b>Trạng thái</b></td>
                                <td>{{ ($data->is_active==1) ? 'Hiện Thị' : 'Ẩn' }}</td>
                            </tr>
                            <tr>
                                <td><b>Loại</b></td>
                                <td>{{ ($data->type == 1) ? 'Sản Phẩm' : 'Tin Tức' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box -->


            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
@endsection
