@extends('backend.layouts.main')
@section('content')
    <style>tr td:first-child {max-width: 250px} .price {color: red}</style>
    <section class="content-header">
        <h1>
            Danh Sách Đơn Hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin.dashboard') }}"></i> Admin</a></li>
            <li class="active">DS Đơn hàng</li>

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
                                <th class="text-center">TT</th>
                                <th class="text-center">Ngày</th>
                                <th class="text-center">Mã ĐH</th>
                                <th style="max-with:200px">Trạng thái</th>
                                <th>Họ tên</th>
                                <th>ĐT</th>
                                <th>Email</th>
                                <th>Tổng tiền</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>

                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td class="text-center">{{ $key+1 }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->code }}</td>
                                    <td>
                                        @if ($item->order_status_id == 1)
                                            <span class="label label-info">Mới</span>
                                        @elseif ($item->order_status_id == 2)
                                            <span class="label label-warning">Đang XL</span>
                                        @elseif ($item->order_status_id == 3)
                                            <span class="label label-success">Hoàn thành</span>
                                        @else
                                            <span class="label label-danger">Hủy</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->fullname }}
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="price">{{number_format($item->total) }} đ</td>
                                    <td>
                                        <a href="{{route('admin.order.edit', ['id'=> $item->id ])}}">
                                            <span title="Edit" type="button" class="btn btn-primary">Chi tiết</span>
                                        </a>&nbsp;
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
