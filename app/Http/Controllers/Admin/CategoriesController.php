<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listCate=Category::all();
        return view('admin.categories.list',compact('listCate'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->hasFile('img_cate')) {
                $photo = $request->file('img_cate')->store('uploads/categories', 'public');
            } else {
                $photo = null;
            }
            $data = [
                'img_cate' => $photo,
                'img_name' => $request->img_name,
                'status' => $request->status,
            ];
            Category::create($data);
            return redirect()->route('admin.categories.index')->with([
                'messageSucess' => 'Thêm danh mục thành công'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detailCate=Category::findOrFail($id);
        return view('admin.categories.edit',compact('detailCate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->isMethod('put')) {
            $detailCategory = Category::findOrFail($id);
            if ($request->hasFile('img_cate')) {
                if ($detailCategory->img_cate && Storage::disk('public')->exists($detailCategory->img_cate)) {
                    Storage::disk('public')->delete($detailCategory->img_cate);
                }
                $photo = $request->file('img_cate')->store('uploads/categories', 'public');
            } else {
                $photo = $detailCategory->img_cate;
            }
            $data = [
                'img_cate' => $photo,
                'img_name' => $request->img_name,
                'status' => $request->status,
            ];

            $detailCategory->update($data);
            return redirect()->route('admin.categories.index')->with([
                'messageSucess' => 'Cập nhật  danh mục thành công'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailCategory = Category::findOrFail($id);
        $detailCategory->delete();
        return redirect()->route('admin.categories.index')->with([
            'messageSucess' => 'Xóa  danh mục thành công'
        ]);
    }
}
