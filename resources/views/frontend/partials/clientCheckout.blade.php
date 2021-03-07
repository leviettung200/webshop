<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cảm ơn bạn đã đặt hàng tại Dookie</h1>
    <p>Đơn hàng của bạn đangg được xử lí. Bộ phận bán hàng sẽ liên hệ bạn sớm nhất</p>
    <div style="padding:10px 15px">
        <h4 style="color:#8083c5">THÔNG TIN ĐƠN HÀNG  {{$orderId}}</h4>
        <div style="padding:0px 30px">
            <table style="width:100%">
                <tbody>
                <tr>
                    <td><b>Khách hàng: {{$name}}</b></td>
                    <td><b>Tổng : </b>{{number_format($total)}} đ</td>
                </tr>
                <tr>
                    <td><b>Email: </b>{{$email}}</td>
                    <td><b>Số điện thoại: </b> {{$phone}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

{{--    <div style="padding:10px 15px">--}}
{{--        <h4 style="color:#8083c5">CHI TIẾT ĐƠN HÀNG</h4>--}}
{{--        <table style="width:100%;border-collapse:collapse">--}}
{{--            <thead style="color:#ffffff;background:#7376c0;text-align:left">--}}
{{--            <tr style="padding:8px">--}}
{{--                <th style="padding:8px">Sản phẩm</th>--}}
{{--                <th style="padding:8px;text-align:left">Gói</th>--}}
{{--                <th style="padding:8px;text-align:right">Giá</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody style="text-align:left">--}}
{{--            <tr style="background-color:#eaeaea;border-bottom:1px solid #d4d4d4">--}}
{{--                <td style="padding:8px;width:28%">--}}
{{--                    Don't Starve Together - Mua 1 tặng 1--}}
{{--                </td>--}}
{{--                <td style="padding:8px;text-align:left;width:35%">--}}
{{--                </td>--}}
{{--                <td style="padding:8px;text-align:right;width:11%;white-space:nowrap">164.000 đ</td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--            <tfoot style="text-align:right">--}}
{{--            </tfoot>--}}
{{--        </table>--}}
{{--    </div>--}}
</body>
</html>
