@extends('backend.layouts.main')

@section('content')
    <style>
        tr td:first-child {max-width: 250px ;}
        .rating .active{
            color: #fd9727 !important;
        }
    </style>
    <section class="content-header">
        <h1>
            Danh Sách Sản Phẩm <a href="{{route('admin.product.create')}}" class="btn bg-olive margin"><i class="fa fa-plus"></i>  Thêm SP</a>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Admin</a></li>
            <li class="active">Sản phẩm</li>
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
                                <th>TT</th>
                                <th style="max-with:200px">Tên SP</th>
                                <th>Danh Mục</th>
                                <th>Hình ảnh</th>
{{--                               /--}}
                                <th>Vị trí</th>
                                <th>Sản phẩm Hot</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $key + 1}}</td>
                                    <td width="250px">{{ $item->name }} </td>
                                    <td>{{ @$item->category->name }}</td>
                                    <td width="20%">
                                    @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                        <img src="{{asset($item->image)}}" style="object-fit: cover; width: 100%; max-height: 80px">
                                        @endif
                                    </td>
{{--                                    <td>{{ $item->sale }}</td>--}}
{{--                                    <td>{{ $item->price }}</td>--}}
                                    <td>{{$item->position}}</td>
                                    <td>{{ ($item->is_hot == 1) ? 'Có' : 'Không' }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.product.edit', ['id'=> $item->id])}}" class="btn bg-purple">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <button onclick="deleteItem('product',{{ $item->id }})" class="btn btn-danger">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
