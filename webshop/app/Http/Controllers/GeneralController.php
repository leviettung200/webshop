<?php

namespace App\Http\Controllers;

use Cart;
use App\Category;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class GeneralController extends Controller
{
    protected $categories;

    public function __construct()
    {
        //Menu
        $menu = Category::where(['is_active'=>1] )
            ->orderBy('position', 'ASC')
            ->orderBy('id', 'DESC')
            ->get();
        //Setting
        $setting = Setting::first();
        $cart = Cart::content();

        //chia sẻ dữ liệu qua tất cả layout
//        View::share([
//            'menu' => $menu,
//            'setting' => $setting,
//        ]);
//        abort(404, array(
//            'menu' => $menu
//        ));
//        dd($menu);
        view()->share([
            'menu' => $menu,
            'setting' => $setting,
//            'cart' => $cart
        ]);

    }
}
