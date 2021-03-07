<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $package = Package::all();

        return view('backend.package.index', ['data' => $package]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //step 2. Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng
        $package = new Package();
        $package->name = $request->input('name');
        $package->slug = Str::slug($request->input('name'));


        //loại
        $package->type = 1;

        $is_active = 0;
        if ($request->has('is_active')) { //kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $package->is_active = $is_active;

        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $package->position = $position;

        $package->value = $request->input('value');
        $package->summary = $request->input('summary');

        $package->save();

        return redirect()->route('admin.package.index')->with('success','Thêm Gói thành công');

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
        $package = Package::find($id);

        return view('backend.package.edit',['package' => $package]);
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
        $package = Package::findorFail($id);
        //step 2. Khởi tạo Model và gán giá trị từ form cho những thuộc tính của đối tượng
        $package->name = $request->input('name');
        $package->slug = Str::slug($request->input('name'));

        //loại
        $package->type = 1;

        $is_active = 0;
        if ($request->has('is_active')) { //kiem tra is_active co ton tai khong?
            $is_active = $request->input('is_active');
        }
        $package->is_active = $is_active;

        $position = 0;
        if ($request->has('position')) {
            $position = $request->input('position');
        }
        $package->position = $position;

        $package->value = $request->input('value');
        $package->summary = $request->input('summary');

        $package->save();

        return redirect()->route('admin.package.index')->with('success','Cập nhật Gói thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDelete = Package::destroy($id);

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
