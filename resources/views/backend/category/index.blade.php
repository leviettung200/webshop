@extends('backend.layouts.main')
@section('content')
    <style>
        .table-hover {
            cursor: pointer;
        }
    </style>
    <section class="content-header">
        <h1>
            Danh Sách Danh Mục <a href="{{route('admin.category.create')}}" class="btn bg-olive margin"><i
                    class="fa fa-plus"></i> Thêm Danh Mục</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Danh mục</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Danh Mục</th>
                                <th>image</th>
                                <th>Danh Mục Cha</th>
                                <th>Vị Trí</th>
                                <th>Trạng Thái</th>
                                <th>Loại</th>
                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key => $item)
                                <tr class="item-{{$item->id}}">
                                    <td>{{$key + 1}}</td>

                                    <td>{{$item->name}}</td>
                                    <td>
                                        @if($item->image)
                                            <img src="{{asset($item->image)}}" alt="" style="width: 60px ">
                                        @endif
                                    </td>
                                    <td>{{$item->parent->name or ''}}</td>
                                    <td>{{$item->position}}</td>
                                    @if($item->is_active == 1)
                                        <td class="text-green"> <i class="fa fa-eye" ></i> Hiển thị</td>
                                    @else
                                        <td> <i class="fa fa-eye-slash"></i> Ẩn</td>
                                    @endif
                                    <td>{{($item->type == 1 ) ? 'Mẫu Website' : 'Khác'}}</td>

                                    <td class="text-center">
                                        {{--                                    <a href="{{route('admin.category.show', ['id'=> $item->id ])}}" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></a>--}}
                                        <a href="{{route('admin.category.edit', ['id'=> $item->id])}}" class="btn bg-purple"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <button onclick="deleteItem('category',{{ $item->id }})" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.box-header -->
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    <script>
        $(function () {
            $('#example1').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true,
                "language": {
                    "search"      : "Tìm kiếm:",
                    "zeroRecords" : "Không tìm thấy",
                    "lengthMenu": "Hiển thị _MENU_ bản ghi",
                    "info": "Hiển thị _START_ đến _END_ trong tổng _TOTAL_ bản ghi",
                    "sInfoEmpty": "Không tìm thấy",
                    "infoFiltered":   "(trong tổng _MAX_ bản ghi)",
                    "paginate": {
                        "first":      "Đầu",
                        "last":       "Cuối",
                        "next":       "Sau",
                        "previous":   "Trước"
                    },
                }
            })
        })
    </script>
@endsection
