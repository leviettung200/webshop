<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\CheckoutRequest;
use App\Order;
use App\OrderDetail;
use App\Package;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Exception;

class CartController extends GeneralController
{
    /**
     * Danh sách sản phẩm trong giỏ hàng
     */
    public function cart()
    {
        $cart = Cart::content();
        $packages = Package::all();
        session(['totalItem' => Cart::count()]);
        return view('frontend.cart.index', [
            'cart' => $cart,
            'packages'=>$packages,

        ]);
    }

    /**
     * Thêm sản phẩm vào giỏ hàng
     * @param Request $request
     * @param $id
     */
    public function addToCart( $id)
    {
        $product = Product::findOrFail($id);

        $cartInfo = [
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => 999000,
            'options' => [
                'image' => $product->image,
                'slug' => $product->slug,
                'package' => "Basic",

            ]
        ];
//        dd($cartInfo);

        // gọi đến thư viện thêm sản phẩm vào giỏ hàng
        Cart::add($cartInfo);
        $cartInfo['qty'] = 1;

        session(['totalItem' => Cart::count()]);

//        dd(Cart::content());
        // chuyển về trang danh sách
        return redirect()->route('shop.cart');
    }

    // Hủy đơn hàng
    public function destroy(Request $request)
    {
        // remove session
        Cart::destroy();
        session(['totalItem' => Cart::count()]);

        return redirect('/');
    }

    public function checkCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();
        if (!$coupon){
            return redirect()->route('shop.cart.checkout')->withErrors('Mã giảm giá không tồn tại !!');
        }
        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(intval(Cart::subtotal(0,",",""))),
        ]);
        return redirect()->route('shop.cart.checkout')->with('success','Mã giảm giá đã được thêm');

    }
    public function deleteCoupon()
    {
        session()->forget('coupon');
        return redirect()->route('shop.cart.checkout')->with('success','Xoá mã giảm giá thành công');

    }
    /**
     * Đặt hàng
     */
    public function checkout(Request $request)
    {
        $totalCount = Cart::count();
        if ($totalCount <= 0) {
            return redirect()->route('shop.cart');
        }
        $cart = Cart::content();
        $packages = Package::all();


        foreach ($cart as $key => $item){
//            $item->options->package = $request->input('package_'.$key);
            foreach ($packages as $pack){
                if ($request->input('package_'.$key) == $pack->id){
                    $item->price= $pack->value;
                    $item->options->package = $pack->name;
                    $item->qty = 1;
                }
            }
        }
//        dd($cart);
        session(['totalItem' => Cart::count()]);

        $subPrice =intval(Cart::subtotal(0,"",""));
        $discount = session()->get('coupon')['discount'] ?? 0;
        $totalPrice = $subPrice - $discount;
        // Kiểm tra xem có sản phẩm nào trong giỏ hàng
        if ($totalCount <= 0) {
            return view('frontend.cart.index');
        }
//        dd(intval($totalPrice));


        return view('frontend.cart.checkout', [
            'totalCount' => $totalCount,
//            'discount' =>$discount,
            'subPrice' => $subPrice,
            'totalPrice' => $totalPrice,
            'cart'=> $cart,

        ]);
    }

    /**
     * Xử lý lưu đơn đặt hàng
     */
    public function postCheckout(CheckoutRequest $request)
    {
        $validated = $request->validated();

        $cart = Cart::content();
        $subPrice =intval(Cart::subtotal(0,"",""));
        $discount = session()->get('coupon')['discount'] ?? 0;
        $coupon = session()->get('coupon')['name'] ?? '';
        $totalPrice = $subPrice - $discount;

//        dd($totalPrice);

        // Kiểm tra tồn tại giỏ hàng cũ
        try {
            // Lưu vào bảng đơn đặt hàng - orders
            $order = new Order();
            $order->fullname = $request->input('name');
            $order->phone = $request->input('phone');
            $order->email = $request->input('email');
            $order->note = $request->input('note');
            $order->discount = $discount;
            $order->coupon = $coupon;
            $order->total = $totalPrice;
            $order->order_status_id = 1; // 1 = mới
            // Lưu vào bảng chỉ tiết đơn đặt hàng
            if ($order->save()) {
                $maDonHang = 'WS-'.rand(0,9999).time(); // Tạo mã đơn hàng
                $order->code = $maDonHang;
                $order->save();

                if (count($cart) >0) {
                    foreach ($cart as $key => $item) {
                        $_detail = new OrderDetail();
                        $_detail->order_id = $order->id;
                        $_detail->name = $item->name;
                        $_detail->package = $item->options->package;
                        $_detail->image = $item->options->image;
                        $_detail->product_id = $item->id;
                        $_detail->qty = $item->qty;
                        $_detail->price = $item->price;
                        $_detail->save();
                    }
                }
                $to_mail = $order->email;
                $content =array('name'=>$order->fullname,'email'=>$order->email,
                    'orderId'=>$maDonHang, 'phone'=>$order->phone,
                    'total'=>$order->total,
                    );
                Mail::send('frontend.partials.clientCheckout', $content,
                    function($message) use ($to_mail){
                    $message->to($to_mail, 'Dookie')->subject('Dookie - Đơn hàng mới');
                    $message->from('admin@webshop.com', 'Dookie');
                });

                // Xóa thông tin giỏ hàng Hiện tại sau khi đặt hàng thành công
                Cart::destroy();
                session()->forget('coupon');

                return response()->json(['orderId' =>  $maDonHang], 200);
            }

        } catch (Exception $e) {
            return redirect()->route('shop.cart.completedOrder')->withErrors( 'Đã xảy ra lỗi, vui lòng thử lại');
        }
    }

    /**
     * Xóa sản phảm khỏi giỏ hàng
     * @param $id Product Id
     */
    public function removeToCart($rowId)
    {
        // xóa sản phẩm trong giỏ
        Cart::remove($rowId);
        $packages = Package::all();
        $cart = Cart::content();
        $totalPrice = Cart::total(0,",","."); // lấy tổng giá của sản phẩm

        session(['totalItem' => Cart::count()]);

        return view('frontend.cart.info', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
            'packages' =>$packages
        ]);
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ
     */
    public function updateToCart(Request $request)
    {
        // check nhập số lượng không đúng định dạng
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|min:1',
        ]);

        // check số lượng lỗi
        if ($validator->fails()) {
            return false;
        }

        $rowId = $request->input('rowId');
        $qty = (int) $request->input('qty');

        // cập nhật lại số lương
        Cart::update($rowId, $qty);

        $cart = Cart::content();
        $totalPrice = Cart::total(0,",","."); // lấy tổng giá của sản phẩm


        return view('frontend.components.cart', [
            'cart' => $cart,
            'totalPrice' => $totalPrice
        ]);
    }

    /**
     * Form Hiển thị hoàn tất đơn đặt hàng
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function completedOrder()
    {
        return view('frontend.cart.completeOrder');
    }
}
