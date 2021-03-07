@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Cập nhật Banner <a href="{{ route('admin.banner.index') }}" type="button" class="btn bg-olive margin"><i class="fa fa-list"></i> Danh Sách</a>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-9">
                <!-- general form elements -->

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thông tin Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('admin.banner.update', ['id' => $data->id ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            @include('backend.partials.alerts')

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tiêu đề</label>
                                <input value="{{ $data->title }}" type="text" class="form-control" id="title" name="title" placeholder="Nhập tên tiêu đề">
                            </div>

                            <div class="form-group">
                                <label for="image">Thay đổi ảnh</label>
                                <input type="file" id="image" name="image">
                                <!-- Hiển thị ảnh cũ -->
                                <br>
                                <img src="{{ asset($data->image) }}" width="250">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Tùy chỉnh liên kết Url</label>
                                <input value="{{ $data->url }}" type="text" class="form-control" id="url" name="url" placeholder="Url">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Target</label>
                                        <select class="form-control" name="target">
                                            <option value="_blank" {{ ($data->target == '_blank') ? 'selected': '' }} >_blank</option>
                                            <option value="_self" {{ ($data->target == '_self') ? 'selected': '' }} >_self</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Loại</label>
                                        <select class="form-control" name="type">
                                            <option value="1" {{ ($data->type == 1 ) ? 'selected': '' }}>Slide</option>
                                            <option value="2" {{ ($data->type == 2 ) ? 'selected': '' }}>Background</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="1" name="is_active" {{ ($data->is_active == 1 ) ? 'checked': '' }}> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="{{ $data->position }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea id="editor1" name="description" class="form-control" rows="10" placeholder="Enter ...">{{ $data->description }}</textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Lưu</button>
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
            _ckeditor.config.height = 300; // thiết lập chiều cao

        })
    </script>
@endsection
