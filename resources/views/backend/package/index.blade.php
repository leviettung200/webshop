@extends('backend.layouts.main')

@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Gói <a href="{{route('admin.package.create')}}" type="button" class="btn bg-olive margin"><i class="fa fa-plus"></i> Thêm mới</a>

        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Gói</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <td>TT</td>
                                <th>Tiêu đề</th>
                                <th>Giá</th>
                                <th>Mô tả</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Tác Vụ</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key =>$item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $key + 1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->value}}</td>
                                    <td>{!! $item->summary !!}</td>
                                    <td>{{$item->position}}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.package.edit',['id'=>$item->id])}}" class="btn bg-purple">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <button onclick="deleteItem('package',{{ $item->id }})" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
