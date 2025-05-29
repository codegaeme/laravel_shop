<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use Illuminate\Http\Request;
use Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.products.simple.list', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.simple.add', compact('categories'));


    }

public function store(Request $request)
{
    // Chuẩn bị dữ liệu giá: loại bỏ dấu cách và dấu chấm
    if (!empty($request->price)) {
         $cleanPrice = str_replace([' ', '.'], '', $request->price);
    }else{
          $cleanPrice= null;
    }
     if (!empty($request->price_sale)) {
         $cleanPriceSale = str_replace([' ', '.'], '', $request->price_sale);
    }else{
          $cleanPriceSale= null;
    }



    // Tạo thư mục lưu ảnh nếu chưa có
    if (!Storage::exists('public/products')) {
        Storage::makeDirectory('public/products');
    }

    // Xử lý ảnh thumbnail
    $thumbnailPath = null;
    if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
        $thumbnail = $request->file('thumbnail');
        $thumbnailName = Str::slug(pathinfo($thumbnail->getClientOriginalName(), PATHINFO_FILENAME))
            . '_' . time() . '_' . uniqid() . '.' . $thumbnail->getClientOriginalExtension();

        // Lưu file vào storage/app/public/products
        $thumbnail->storeAs('products', $thumbnailName,'public');

        // Lưu đường dẫn không có 'public/' để dùng Storage::url()
        $thumbnailPath = 'products/' . $thumbnailName;
    }

    // Tạo sản phẩm mới với dữ liệu đã chuẩn bị
    $product = Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'category_id' => $request->category_id,
        'is_variant' => '0',
        'status' => $request->status,
        'price' => $cleanPrice,
        'stook' => $request->stook,
        'price_sale' => $cleanPriceSale,
        'decription_short' => $request->decription_short,
        'thumbnail' => $thumbnailPath,
    ]);

    // Xử lý nhiều ảnh chi tiết
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $imageFile) {
            if ($imageFile->isValid()) {
                $imageName = Str::slug(pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME))
                    . '_' . time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();

                // Lưu file vào storage/app/public/products

                $imageFile->storeAs('products', $imageName,'public');

                // Lưu đường dẫn ảnh chi tiết vào DB
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'products/' . $imageName,
                ]);
            }
        }
    }

    // Chuyển hướng về danh sách sản phẩm với thông báo thành công
    return redirect()->route('admin.products.list')->with('success', 'Thêm mới sản phẩm thành công!');
}


    public function show()
    {

    }
    public function edit()
    {

    }
    public function update()
    {

    }


public function delete(Request $request)
{
    $id = $request->input('id');

    // Tìm sản phẩm
    $product = Product::find($id);

    if (!$product) {
        return redirect()->route('admin.products.list')->with('error', 'Sản phẩm không tồn tại.');
    }

    // Xóa ảnh đại diện (thumbnail) nếu có
    if ($product->thumbnail && Storage::disk('public')->exists($product->thumbnail)) {
        Storage::disk('public')->delete($product->thumbnail);
    }

    // Lấy và xóa ảnh chi tiết nếu có
    $images = ProductImage::where('product_id', $id)->get();
    foreach ($images as $image) {

        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
        }
    }

    // Xóa bản ghi ảnh khỏi DB
    ProductImage::where('product_id', $id)->delete();

    // Xóa sản phẩm
    $product->delete();

    return redirect()->route('admin.products.list')->with('success', 'Xóa sản phẩm thành công.');
}


}
