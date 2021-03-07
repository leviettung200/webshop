@extends('backend.layouts.main')

@section('content')

    <section class="content-header">
        <h1>
            Chỉnh sửa thông tin gói <a href="{{route('admin.package.index')}}" class="btn bg-olive margin"><i
                    class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin gói</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.package.update', ['id' => $package->id ])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên gói</label>
                                <input value="{{$package->name}}" type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="value">Giá</label>
                                        <input value="{{$package->value}}" type="number" class="form-control" id="value" name="value" placeholder="Nhập giá trị gói ">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="value">Vị trí</label>
                                        <input value="{{$package->position}}" type="number" class="form-control" id="position" name="position" placeholder=" ">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input {{$package->is_active==1 ? 'checked' : ''}} type="checkbox" value="1" name="is_active"> <b>Trạng thái hiển thị</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor2" name="summary" class="form-control" rows="10" >{!! $package->summary !!}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            <input type="reset" class="btn btn-default pull-right" value="Reset">
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor2');
            _ckeditor.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection
