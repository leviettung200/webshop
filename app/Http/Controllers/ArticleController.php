<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();

        return view('backend.article.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['title']);

        $validated = $request->validate([
            'title' => 'required|max:255|unique:articles,title',
            'slug'=>'unique:articles,slug',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'summary' => 'required',
            'description' => 'required',
        ],[

        ],[
            'title' =>'Tiêu đề',
//            'slug' =>'Slug',
            'image' =>'Ảnh',
            'summary' =>'Tóm tắt',
            'description' => 'Nội dung',
        ]);

        $article = new Article(); // khởi tạo model

        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));

        // Upload file
        if ($request->hasFile('image')) { // dòng này Kiểm tra xem có image có được chọn
            // get file
            $file = $request->file('image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/article/';
            // Thực hiện upload file
            $file->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $article->image = $path_upload.$filename;
        }

        $article->type = $request->input('type');

        $article->position = $request->input('position');
        $article->url = $request->input('url');

        $is_active = 0;// mặc định gán không hiển
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong ?
            $is_active = $request->input('is_active');
        }
        $article->is_active = $is_active;

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');
        // $article->user_id=Auth::id();

        $article->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.article.index')->with('success','Thêm tin tức thành công');
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

        // cách 1 Lấy chi tiết banner theo id
        // $banner = Banner::find($id);

        // cách 2 Trả về dữ liệu banner (object) , nếu không trả về lỗi
        $article = Article::findorFail($id);

        return view('backend.article.edit', [
            'data' => $article
        ]);
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
        $request['slug'] = Str::slug($request['title']);
        $article = Article::findorFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255|unique:articles,title,'.$article->id,
            'slug' => 'unique:articles,slug,'.$article->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'summary' => 'required',
            'description' => 'required',
        ],[

        ],[
            'title' =>'Tiêu đề',
            'image' =>'Ảnh',
            'summary' =>'Tóm tắt',
            'description' => 'Nội dung',
        ]);


        $article->title = $request->input('title');
        $article->slug = Str::slug($request->input('title'));

        // Upload file
        if ($request->hasFile('new_image')) { // dòng này Kiểm tra xem có image có được chọn
            // xóa file cũ
            @unlink(public_path($article->image)); // hàm unlink của PHP không phải laravel , chúng ta thêm @ đằng trước tránh bị lỗi
            // get file
            $file = $request->file('new_image');
            // đặt tên cho file image
            $filename = time().'_'.$file->getClientOriginalName(); // $file->getClientOriginalName() == tên ban đầu của image
            // Định nghĩa đường dẫn sẽ upload lên
            $path_upload = 'uploads/article/';
            // Thực hiện upload file
            $file->move($path_upload,$filename); // upload lên thư mục public/uploads/product

            $article->image = $path_upload.$filename;
        }
        $article->type = $request->input('type');

        $article->position = $request->input('position');
        $article->url = $request->input('url');

        $is_active = 0;// mặc định gán không hiển
        if ($request->has('is_active')) { // kiem tra is_active co ton tai khong ?
            $is_active = $request->input('is_active');
        }

        $article->is_active = $is_active;

        $article->summary = $request->input('summary');
        $article->description = $request->input('description');
        $article->meta_title = $request->input('meta_title');
        $article->meta_description = $request->input('meta_description');
        // $article->user_id=Auth::id();

        $article->save();

        // chuyển hướng đến trang
        return redirect()->route('admin.article.index')->with('success','Cập nhật tin tức thành công');
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
        $isDelete = Article::destroy($id);

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
