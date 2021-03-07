@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Thêm mới <a href="{{ route('admin.brand.index') }}" type="button" class="btn bg-olive margin"><i
                    class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Đối tác</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.brand.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" class="form-control" id="title" name="name" placeholder="Nhập tên tiêu đề">
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh</label>
                                <input type="file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="url">Website</label>
                                <input type="url" class="form-control" id="url" name="website" placeholder="Url">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="0">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">Nội dung</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Nhập...">
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

