<?php

namespace App\Http\Controllers;

use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendor = Vendor::all();
        return view('backend.vendor.index',['data'=>$vendor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.vendor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = new Vendor();
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name')); // slug

        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/Vendor/'; // uploads/brand ; uploads/vendor
            // Thực hiện upload file
            $file->move($path_upload,$filename);

            // lưu lại cái tên
            $vendor->image = $path_upload.$filename;
        }

        // Url
        $vendor->website = $request->input('website'); // $_POST['url'];
        // Target
        $vendor->email = $request->input('email');
        // Loại
        $vendor->phone = $request->input('phone');
        $vendor->address = $request->input('address');
        // Trạng thái
        $is_active = 0;
        if ($request->has('is_active')){ //kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        // trạn thái
        $vendor->is_active = $is_active;
        // Vị trí
        $position=0;
        if ($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position = $position;

        // Lưu
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.vendor.index')->with('success','Thêm NCC thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::findorFail($id);

        return view('backend.vendor.edit',['data'=>$vendor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vendor =  Vendor::findorFail($id);
        $vendor->name = $request->input('name');
        $vendor->slug = Str::slug($request->input('name')); // slug

        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem ảnh mới có được chọn
            // xóa file cũ
            @unlink(public_path($vendor->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get new_image
            $file = $request->file('new_image');
            // đặt tên cho file new_image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/Vendor/';
            // Thực hiện upload file
            $file->move($path_upload,$filename);

            $vendor->image = $path_upload.$filename; // gán giá trị ảnh mới cho thuộc tính image của đối tượng
        }

        $vendor->website = $request->input('website'); // $_POST['url'];
        // Target
        $vendor->email = $request->input('email');
        // Loại
        $vendor->phone = $request->input('phone');
        $vendor->address = $request->input('address');
        // Trạng thái
        $is_active = 0;
        if ($request->has('is_active')){ //kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        // trạn thái
        $vendor->is_active = $is_active;
        // Vị trí
        $position=0;
        if ($request->has('position')){
            $position = $request->input('position');
        }
        $vendor->position = $position;

        // Lưu
        $vendor->save();

        // Chuyển hướng trang về trang danh sách
        return redirect()->route('admin.vendor.index')->with('success','Cập nhật NCC thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // gọi tới hàm destroy của laravel để xóa 1 object
        // DELETE FROM ten_bang WHERE id = 33 -> execute command
        $isDelete = Vendor::destroy($id);

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
