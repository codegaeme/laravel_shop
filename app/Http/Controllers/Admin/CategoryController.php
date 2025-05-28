<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.categories.list', compact('categories'));
    }
     public function create(){
        return view('admin.categories.add');
   }
     public function store(Request $request){
        $data=[
            'name_cate'=>$request->name_cate,
            'description'=>$request->description,
            'status'=>$request->status,

        ];
        $newCate =Category::create($data);
        return redirect()->route('admin.categories.list-cate')->with('success','Thêm mới thành công');
   }
     public function show(){
            return 'list';
   }

     public function edit($id){
        $category=Category::find($id);
         if ($category) {
           return view('admin.categories.edit',compact('category'));
        }else{
            return redirect()->back()->with('error','Không tồn tại');
        }
   }
     public function update($id, Request $request){
         $category=Category::find($id);
         if ($category) {
           $data=[
            'name_cate'=>$request->name_cate,
            'description'=>$request->description,
            'status'=>$request->status,

        ];
        $category->update($data);
        return redirect()->route('admin.categories.list-cate')->with('success','Sửa thành công');
        }else{
            return redirect()->back()->with('error','Không tồn tại');
        }
   }
     public function delete(Request $request){
        $id=$request->id;
        $data=Category::find($id);

        if ($data) {
            $data->delete();
            return redirect()->back()->with('success','Xóa thành công');
        }else{
            return redirect()->back()->with('error','Xóa thất bại');
        }


   }

}
