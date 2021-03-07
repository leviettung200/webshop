<?php

namespace App\Http\Controllers;

use App\Article;
use App\Order;
use App\OrderStatus;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {

        $orders = Order::where(['order_status_id'=>1])
                            ->orderBy('id', 'DESC')
                                ->limit(6)->get();
        $orderMonth =[];
        $od = Order::whereMonth('created_at', Carbon::now()->month)->get();

        for ($i = 1 ; $i <= 4 ; $i++){
            array_push($orderMonth, $od->where('order_status_id', $i)->count());
        }
        array_push($orderMonth, Order::where('order_status_id',3)->whereMonth('created_at', Carbon::now()->month)->sum('total'));

//        dd($od->where('order_status_id',1)->get());

        $numArticle = Article::count();
        $numProduct = Product::count();
        $numUser = User::count();
        $numOrder = Order::count();
        return view('backend.dashboard', [
            'numOrder' => $numOrder,
            'numArticle' => $numArticle,
            'numProduct' => $numProduct,
            'numUser' => $numUser,
            'orders' =>$orders,
            'od' =>$od->count(),
            'orderMonth' =>$orderMonth,
        ]);
    }
    //Trang dang nhap
    public function login()
    {
        return view('backend.login.index');
    }

    public function postLogin(Request $request)
    {

        //validate dữ liệu
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6'
        ],
        [
            //change error msg
            'email.required'=> 'Vui lòng nhập email',
            'email.email'=> 'Sai định dạng email',
            'password.required'=> 'Vui lòng nhập password',
            'password.min'=> 'Password quá ngắn',

        ]
        ); // validate false => tạo ra biến $errors để toàn thông tin bị lỗi cho từng trường
//        $soul = $request->input('email');

        // validate thành công

        $dataLogin = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        //Hàm xác thực login của laravel
        $checkLogin = Auth::attempt($dataLogin, $request->has('remember'));

        // kiểm tra xem có đăng nhập thành công với email và password đã nhập hay không
        if ($checkLogin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('msg', 'Email hoặc Password không chính xác');


    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login');
    }
}
