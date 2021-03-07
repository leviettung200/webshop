@extends('backend.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Sửa Danh Mục <a href="{{route('admin.category.index')}}" class="btn bg-olive"><i class="fa fa-list"></i> Danh Sách</a>
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
                    <form role="form" action="{{route('admin.category.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">
                            @include('backend.partials.validate')
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control" name="parent_id">
                                    <option value="0">-- Chọn --</option>
                                    @foreach($category as $item)
                                        <option {{ ($data->parent_id == $item->id ? 'selected':'') }} value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input value="{{$data->name}}" type="text" class="form-control" id="name"
                                       name="name" placeholder="Nhập tên danh mục">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Change File</label>
                                <input type="file" id="new_image" name="new_image"><br>
                                @if ($data->image)
                                    <img src="{{asset($data->image)}}" width="200">
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input {{ ($data->is_active == 1) ? 'checked':'' }} type="checkbox" value="1"
                                           name="is_active"> Trạng thái
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Vị trí</label>
                                <input value="{{$data->position}}" type="number" class="form-control" id="position"
                                       name="position" placeholder="Nhập vị trí" min="0">
                            </div>
                            <div class="form-group">
                                <label>Loại</label>
                                <select class="form-control" name="type">
                                    <option value="1" {{ ($data->type == 1) ? 'selected': '' }}>Mẫu Website</option>
                                    <option value="2" {{ ($data->type == 2 ) ? 'selected': '' }}>Khác</option>
                                </select>
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
