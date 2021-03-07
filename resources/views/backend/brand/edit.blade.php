@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Sửa thông tin đối tác <a href="{{ route('admin.brand.index') }}" type="button" class="btn bg-olive margin"><i
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
                        <h3 class="box-title">Thông tin đối tác</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('admin.brand.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tiêu đề</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên tiêu đề" value="{{$data->name}}">
                            </div>
                            <div class="form-group">
                                <label for="image">Ảnh</label>
                                <input type="file" id="image" name="new_image">
                                @if($data->image)
                                    <img src="{{asset($data->image)}}" alt="" width="200px">
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="url">Website</label>
                                <input type="url" class="form-control" id="url" name="website" placeholder="Url" value="{{$data->website}}">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input {{ ($data->is_active == 1 ) ? 'checked': '' }} type="checkbox" value="1" name="is_active"> Trạng thái hiển thị
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="position">Vị trí</label>
                                        <input type="number" class="form-control" id="position" name="position" value="{{$data->position}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="desciption">Nội dung</label>
                                <input type="text" class="form-control" id="desciption" name="desciption" placeholder="Nhập ..." value="{{$data->name}}">
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

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>
