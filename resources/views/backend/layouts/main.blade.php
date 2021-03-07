<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>

    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Tags -->
    <link rel="stylesheet" href="/backend/css/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="/backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/backend/dist/css/skins/_all-skins.min.css">
    <style>

        #toast {
            position: fixed;
            z-index: 999;
            top: 50px;
            right: 12px;
        }
        .notification {
            display: block;
            position: relative;
            overflow: hidden;
            margin-top: 10px;
            margin-right: 10px;
            padding: 20px;
            border-radius: 3px;
            color: white;
            right: -400px;
        }
        .normal {
            background: #273140;
        }
        .success {
            background: #44be75;
        }
        .error {
            background: #c33c3c;
        }

    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- header -->
    @include('backend.layouts.header')

    <!-- Left side column. contains the logo and sidebar -->
    @include('backend.layouts.sidebar')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('backend.partials.alerts')
    <!-- /.content-wrapper -->

    <!-- footer -->
    @include('backend.layouts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/backend/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/backend/dist/js/demo.js"></script>
<script src="/backend/plugins/ckeditor/ckeditor.js"></script>
<!-- Tags -->
<script src="/backend/js/bootstrap-tagsinput.min.js"></script>
<script src="/backend/dist/js/pages/dashboard2.js"></script>

<script src="/backend/js/main.js"></script>
@yield('script')
<script>
    // jQuery(document).ready(function(){
    //     jQuery('.toast__close').click(function(e){
    //         e.preventDefault();
    //         var parent = $(this).parent('.toast');
    //         parent.fadeOut("slow", function() { $(this).remove(); } );
    //     });
    // });
    (function($) {

        $.fn.toast = function(options)  {

            // var settings = $.extend({
            //     type: 'normal',
            //     message:  null
            // }, options);

            var item = $("#notify");
            this.append($(item));
            $(item).animate({ "right": "12px" }, "fast");
            setInterval(function() {
                $(item).animate({ "right": "-400px" }, function() {
                    $(item).remove();
                });
            }, 5000);
        }
        $(document).on('click', '.notification', function() {
            $(this).fadeOut(400, function(){
                $(this).remove();
            });
        });

    }(jQuery));

    $("#toast").toast({
        type: 'success',
        message: 'Success message'
    });

</script>
</body>
</html>
