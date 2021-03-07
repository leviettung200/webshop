@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật Tin tức <a href="{{ route('admin.article.index') }}" type="button" class="btn bg-olive margin"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Tin tức</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.article.update', ['id' => $data->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                                @include('backend.partials.validate')

                                <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input value="{{ $data->title }}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Thay đổi ảnh</label>
                                <input type="file" id="new_image" name="new_image">
                                <!-- Hiển thị ảnh cũ -->
                                <br>
                                <img src="{{ asset($data->image) }}" width="250">
                            </div>

                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Loại</label>
                                            <select class="form-control" name="type">
                                                <option value="1" {{ ($data->type == 1 ) ? 'selected': '' }}>Tin tức</option>
                                                <option value="2" {{ ($data->type == 2 ) ? 'selected': '' }}>Khác</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="position">Vị trí</label>
                                            <input type="number" class="form-control" id="position" name="position" value="{{ $data->position }}" min="0">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="1" name="is_active" {{ ($data->is_active == 1 ) ? 'checked': '' }}> Trạng thái hiển thị
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea id="editor2" name="summary" class="form-control" rows="10" placeholder="Nhập ...">{{ $data->summary }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" placeholder="Nhập ...">{{ $data->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Nhập..." value="{{ $data->meta_title }}">
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta description</label>
                                <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Nhập..." value="{{$data->meta_description}}">
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
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

@section('script')
    <script type="text/javascript">
        $(function () {
            // setup textarea sử dụng plugin CKeditor
            var _ckeditor = CKEDITOR.replace('editor1');
            _ckeditor.config.height = 500; // thiết lập chiều cao
            var _ckeditor2 = CKEDITOR.replace('editor2');
            _ckeditor2.config.height = 200; // thiết lập chiều cao
        })
    </script>
@endsection
