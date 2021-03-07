<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $category = Category::latest()->paginate(20);
        $category = Category::paginate(10);
        return view('backend.category.index',['data'=>$category]);

//        $category = Category::latest()->paginate(10);
//        return view('backend.category.index', ['data' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 1. lấy toàn bộ dữ danh mục
        $categories = Category::all();

        // 2. max postion
        $max_position = Category::max('position');

        return view('backend.category.create',[
            'data' => $categories,
            'max_position' => $max_position
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['name']);

        $validated = $request->validate([
            'name' => 'required|max:255|unique:categories,name',
            'slug'=>'unique:categories,slug',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ],[

        ],[
            'name' =>'Tiêu đề',
            'image' =>'Ảnh',
        ]);

        //luu vào csdl
        $category = new Category;
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->parent_id = $request->input('parent_id');
        $category->type = $request->input('type');
        if ($request->hasFile('image')) {
            // get file
            $file = $request->file('image');
            // get ten
            $filename = time() . '_' . $file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/category/';
            // upload file
            $request->file('image')->move($path_upload, $filename);

            $category->image = $path_upload . $filename;
        }
        $is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;
        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $category->position = $position;

        $category->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.category.index')->with('success','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findorFail($id);
        return view('backend.category.show', ['data' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
        $data = Category::findorFail($id);

        return view('backend.category.edit',[
            'data'=>$data,
            'category'=>$category
            ]);
//        return view('backend.category.edit', [
//            'data' => $data,
//            'category' => $category
//        ]);
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
        $category = Category::findorFail($id);

        $request['slug'] = Str::slug($request['name']);

        $validated = $request->validate([
            'name' => 'required|max:255|unique:articles,title,'.$category->id,
            'slug'=>'unique:articles,slug,'.$category->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ],[

        ],[
            'name' =>'Tiêu đề',
            'image' =>'Ảnh',
        ]);

        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->parent_id = $request->input('parent_id');
        $category->type = $request->input('type');
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($category->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time() . '_' . $file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/category/';
            // upload file
            $request->file('new_image')->move($path_upload, $filename);

            $category->image = $path_upload . $filename;
        }
        $is_active = 0;
        if ($request->has('is_active')) {//kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $category->is_active = $is_active;
        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $category->position = $position;

        $category->save();

        // chuyen dieu huong trang
        return redirect()->route('admin.category.index')->with('success','Cập nhật danh mục thành công');
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
        $isDelete = Category::destroy($id);

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
