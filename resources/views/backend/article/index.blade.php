@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Tin tức<a href="{{ route('admin.article.create') }}" type="button" class="btn bg-olive margin"><i class="fa fa-plus"></i> Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Tin tức</li>
        </ol>
    </section>
    <style>
        td p {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    </style>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tiêu đề</th>
                                <th>Ảnh</th>
                                <th>Tóm tắt</th>
                                <th>Vị trí</th>
                                <th>Loại</th>
                                <th>Trang thái</th>
                                <th>Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key =>$item)
                                <tr class="item-{{$item->id}}">
                                    <td>{{$key +1}}</td>
                                    <td width="15%">{{$item->title}}</td>
                                    <td >
                                    @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                        <img src="{{ asset($item->image)}} " width="50" height="50">
                                        @endif
                                    </td>
                                    <td width="30%">{!! $item->summary !!}</td>
                                    <td>{{$item->position}}</td>
                                    <td>{{$item->type == 1 ? 'Tin tức' : 'Khác'}}</td>
                                    @if($item->is_active == 1)
                                        <td class="text-green"> <i class="fa fa-eye" ></i> Hiển thị</td>
                                    @else
                                        <td> <i class="fa fa-eye-slash"></i> Ẩn</td>
                                    @endif
                                    <td class=" text-center">
{{--                                        <a href="{{route('admin.article.show', ['id'=> $item->id ])}}" class="btn btn-default" title="Xem">--}}
{{--                                            <i class="fa fa-eye" aria-hidden="true"></i>--}}
{{--                                        </a>--}}
                                        <a href="{{ route('admin.article.edit', ['id' => $item->id ]) }}" class="btn bg-purple " title="Sửa">
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <button onclick="deleteItem('article',{{ $item->id }})" class="btn btn-danger" title="Xoá"><i class="fa fa-trash-o"></i></button>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
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
