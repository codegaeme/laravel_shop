<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductAttribute;
use App\Models\Admin\ProductAttributeValue;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
        public function index(){


          $data = ProductAttribute::with(['values'])
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('admin.products.variants.attribute.list',compact('data'));
    }
    public function create(){
        return view('admin.products.variants.attribute.add');
    }
      public function store(Request $request){
        $data = [
            'name'=> request()->input('name'),
        ];
        $newAttribute = ProductAttribute::create($data);
        if ($newAttribute) {
             return redirect()->route('admin.products.variants.attributes.index')->with('success','Thêm thành công');
        }
        else{
              return redirect()->route('admin.products.variants.attributes.index')->with('error','Thêm thất bại');
        }

    }
    public function addValue($id){
        return view('admin.products.variants.attribute.detail',compact('id'));
    }
    public function add(Request $request ){

         $data = [
            'value'=> request()->input('value'),
            'attribute_id'=>request()->input('attribute_id')
        ];
        $newAttribute = ProductAttributeValue::create($data);
        if ($newAttribute) {
             return redirect()->route('admin.products.variants.attributes.index')->with('success','Thêm thành công');
        }
        else{
              return redirect()->route('admin.products.variants.attributes.index')->with('error','Thêm thất bại');
        }
    }
}
