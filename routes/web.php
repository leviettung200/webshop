<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//php artisan route:list             show toàn bộ route
//Trang chủ
Route::get('/', 'ShopController@index')->name('shop.index');

//Search
Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');


Route::get('/lien-he', 'ShopController@contact')->name('shop.contact');
Route::post('/lien-he', 'ShopController@postContact')->name('shop.postContact');

Route::get('/mau-website', 'ShopController@getProjects')->name('shop.projects');
Route::get('/tag/{tag}', 'ShopController@tagProducts')->name('shop.tagProducts');
Route::get('/mau-website/{slug}', 'ShopController@category')->name('shop.category');
Route::get('/mau_website/{slug}', 'ShopController@getDetailProject')->name('shop.project.detail');

//tin tức
Route::get('/tin-tuc', 'ShopController@getArticles')->name('shop.articles');
Route::get('/tin-tuc/{slug}', 'ShopController@getDetailArticle')->name('shop.article.detail');

//giới thiệu
Route::get('/gioi-thieu', 'ShopController@about')->name('shop.about');
Route::get('/dang-ky-ten-mien', 'DomainController@indexDomain')->name('shop.indexDomain');
Route::get('/ten-mien', 'DomainController@aboutDomain')->name('shop.aboutDomain');

//tìm kiếm
Route::get('/tim-kiem', 'ShopController@search')->name('shop.search');


//middleware
Route::get('/admin/login', 'AdminController@login')->name('admin.login');
Route::post('/admin/login','AdminController@postLogin')->name('admin.postLogin');
Route::get('admin/logout','AdminController@logout')->name('admin.logout');

//Group route
Route::group(['prefix'=> 'admin', 'as' => 'admin.', 'middleware'=>'CheckLogin'], function (){
    Route::get('/', 'AdminController@index')->name('dashboard');
    Route::resource('banner', 'BannerController');
    Route::resource('vendor', 'VendorController');
    Route::resource('category', 'CategoryController');
    Route::resource('contact', 'ContactController');
    Route::resource('product', 'ProductController');
    Route::resource('article', 'ArticleController');
    Route::resource('setting', 'SettingController');
    Route::resource('user', 'UserController');
    Route::resource('brand', 'BrandController');
    Route::resource('order', 'OrderController');
    Route::resource('package', 'PackageController');
    Route::resource('coupon', 'CouponController');

});
Route::get('/gio-hang', 'CartController@cart')->name('shop.cart');

// Thêm sản phẩm vào giỏ hàng
Route::get('/gio-hang/them-sp-vao-gio-hang/{product_id}', 'CartController@addToCart')->name('shop.cart.add-to-cart');

// Xóa SP khỏi giỏ hàng
Route::get('/gio-hang/xoa-sp-gio-hang/{id}', 'CartController@removeToCart')->name('shop.cart.remove-to-cart');
// Cập nhật giỏ hàng
Route::get('/gio-hang/cap-nhat-so-luong-sp', 'CartController@updateToCart')->name('shop.cart.update-to-cart');
// Hủy đơn đặt hàng
Route::get('/gio-hang/huy-don-hang', 'CartController@destroy')->name('shop.cart.destroy');

//Coupon
Route::post('/coupon', 'CartController@checkCoupon')->name('shop.cart.checkCoupon');
Route::delete('/coupon', 'CartController@deleteCoupon')->name('shop.cart.deleteCoupon');


Route::get('/dat-hang', 'CartController@checkout')->name('shop.cart.checkout');
Route::post('/dat-hang', 'CartController@postCheckout')->name('shop.cart.postCheckout');
Route::get('/dat-hang/hoan-tat-dat-hang', 'CartController@completedOrder')->name('shop.cart.completedOrder');


Route::get('/404', 'ShopController@notfound')->name('shop.404');

//Send mail
