@extends('backend.layouts.main')
@section('content')
    <style>
        .table-hover {
            cursor: pointer;
        }
    </style>
    <section class="content-header">
        <h1>
            Danh Sách Danh Mục <a href="{{route('admin.coupon.create')}}" class="btn bg-olive margin"><i
                    class="fa fa-plus"></i> Thêm mới</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Mã giảm giá</li>
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
                                <th>Mã</th>
                                <th>Loại</th>
                                <th>Số giảm</th>

                                <th class="text-center">Tác vụ</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key => $item)
                                <tr class="item-{{$item->id}}">
                                    <td>{{$key + 1}}</td>
                                    <td>{{$item->code}}</td>
                                    @if($item->type == 1)
                                        <td>Theo số tiền</td>
                                        <td>{{number_format($item->value)}} đ</td>
                                    @elseif($item->type == 2)
                                        <td>Theo phần trăm</td>
                                        <td>{{$item->percent}} %</td>
                                    @endif
                                    <td class="text-center">
                                        <button onclick="deleteItem('coupon',{{ $item->id }})" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
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
