<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // Cách 1 : Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$banner = Banner::paginate(5);

        // Cách 2 : Lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
        //$banner = Banner::latest()->paginate(8);

        // Cách 3 : lấy toàn bộ dữ liệu
        $banner = Banner::all();

        return view('backend.banner.index', ['data' => $banner]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['title']);

        $request->validate([
            'title'=>'required|unique:banners,title',
            'slug'=>'required|unique:banners,slug',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'url'=>'nullable|url',
            'type'=>'required',
        ],[

        ],[
            'title'=> 'Tiêu đề',
            'image' => 'Ảnh',
            'url' =>'Liên kết Url',
        ]);

        //step 2. Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng
        $banner = new Banner();
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title'));
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/banner/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $file->move($path_upload, $filename);

            // lưu lại cái tên
            $banner->image = $path_upload . $filename;
        }

        $banner->url = $request->input('url'); // $_POST['url'];

        $banner->target = $request->input('target');

        //loại
        $banner->type = $request->input('type');
        $is_active = 0;
        if ($request->has('is_active')) { //kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        // trạn thái
        $banner->is_active = $is_active;
        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $banner->position = $position;
        $banner->description = $request->input('description');
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success','Thêm Banner thành công');


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // cách 1 Lấy chi tiết banner theo id
        // $banner = Banner::find($id);

        // cách 2 Trả về dữ liệu banner (object) , nếu không trả về lỗi
        $banner = Banner::findorFail($id);

        return view('backend.banner.edit', [
            'data' => $banner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request['slug'] = Str::slug($request['title']);
        $banner = Banner::findorFail($id);

        $request->validate([
            'title'=>'required|max:255|unique:banners,title,'.$banner->id,
            'slug'=>'unique:banners,slug,'.$banner->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'url'=>'nullable|url',
            'type'=>'required',
        ],[

        ],[
            'title'=> 'Tiêu đề',
            'image' => 'Ảnh',
            'url' =>'Liên kết Url',
        ]);
        $banner->title = $request->input('title');
        $banner->slug = Str::slug($request->input('title')); // slug

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem ảnh mới có được chọn
            // xóa file cũ
            @unlink(public_path($banner->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('image');
            // đặt tên cho file new_image
            $filename = time() . '_' . $file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/banner/';
            // Thực hiện upload file
            $file->move($path_upload, $filename);

            $banner->image = $path_upload . $filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }

        // Url
        $banner->url = $request->input('url');
        // Target
        $banner->target = $request->input('target');
        // Loại
        $banner->type = $request->input('type');
        // Trạng thái

        $is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }

        // trạng thái
        $banner->is_active = $is_active;

        // Vị trí
        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $banner->position = $position;

        // Mô tả
        $banner->description = $request->input('description');
        // Lưu
        $banner->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.banner.index')->with('success','Cập nhật Banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        // DELETE FROM ten_bang WHERE id = 33 -> execute command
        $banner = Banner::findorFail($id);
        @unlink(public_path($banner->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi

        $isDelete = Banner::destroy($id);

        if ($isDelete) { // xóa thành công
            $statusCode = 200;
            $isSuccess = true;
        } else {
            $statusCode = 400;
            $isSuccess = false;
        }

        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        return response()->json(['isSuccess' => $isSuccess], $statusCode);
    }
}
