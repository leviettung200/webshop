<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image" style="height: 45px">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <p href="#"><i class="fa fa-circle text-success"></i> Online</p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-calendar"></i> <span>Bảng Điều Khiển</span>
                    <span class="pull-right-container">
            </span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.category.index')}}">
                    <i class="fa fa-folder-open-o"></i> <span>QL Danh Mục</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.banner.index')}}">
                    <i class="fa fa-photo"></i> <span>QL Banner</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.product.index')}}">
                    <i class=" fa fa-database"></i> <span> QL Sản Phẩm</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.package.index')}}">
                    <i class="fa fa-align-justify"></i> <span>QL Gói</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.brand.index')}}">
                    <i class="fa fa-id-card"></i> <span>QL Đối Tác</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.order.index')}}">
                    <i class="fa fa-cart-plus"></i> <span>QL Đơn Hàng</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.article.index')}}">
                    <i class="fa  fa-newspaper-o"></i> <span>QL Tin Tức</span>
                </a>
            </li>

            <li class="">
                <a href="{{route('admin.contact.index')}}">
                    <i class="fa fa-compress"></i> <span>QL Liên Hệ</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.coupon.index')}}">
                    <i class="fa fa-ticket"></i> <span>QL Mã Giảm giá</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.user.index')}}">
                    <i class="fa fa-user"></i> <span>QL USER</span>
                </a>
            </li>
            <li class="">
                <a href="{{route('admin.setting.index')}}">
                    <i class="fa fa-gear"></i> <span>Cấu hình website</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
