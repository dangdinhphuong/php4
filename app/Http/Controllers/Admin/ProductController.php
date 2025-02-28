<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Origin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\ProductImage;


class ProductController extends Controller
{
    public function index(Request $request)
    {

        $supplier = Supplier::all();
        $categoryAll = Category::all();
        $origin = Origin::all();
        $products = Product::filter(request(['search','category_id','supplier_id','origin_id','status']))->orderBy('id', 'DESC')->Paginate(7);
        $products->load('category'); // gọi products bên model
        $products->load('supplier');
        $products->load('origin');
        $products->load('User');
        return view('admin.pages.product.index', compact('products','supplier', 'categoryAll', 'origin'));
    }
    public function create()
    {
        $supplier = Supplier::all();
        $category = Category::all();
        $origin = Origin::all();
        return view('admin.pages.product.create', compact('supplier', 'category', 'origin'));
    }
    public function store(StoreProductRequest $request)
    {
        $pathAvatar = null;

        try {
            // Bắt đầu transaction
            DB::beginTransaction();

            // Lưu ảnh đại diện
            if ($request->hasFile('image')) {
                $pathAvatar = $request->file('image')->store('public/images/products');
                $pathAvatar = str_replace("public/", "", $pathAvatar);
            }

            // Lưu dữ liệu sản phẩm
            $data = $request->only(['namePro', 'quantity', 'slug', 'price', 'discounts', 'Description', 'status', 'category_id', 'supplier_id', 'origin_id']);
            $data['users_id'] = auth()->user()->id;
            $data['image'] = $pathAvatar; // Đường dẫn ảnh đại diện
            $product = Product::create($data);

            // Lưu các ảnh khác
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('public/images/products');
                    $imagePath = str_replace("public/", "", $imagePath);

                    // Lưu ảnh vào bảng `product_images`
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $imagePath,
                    ]);
                }
            }

            // Hoàn tất transaction
            DB::commit();
            return redirect()->route('cp-admin.products.index')->with('message', 'Thêm sản phẩm thành công!');
        } catch (Exception $exception) {
            // Rollback transaction khi có lỗi
            DB::rollBack();
            Log::error('Error:', [
                'message' => $exception->getMessage(),
                'line' => $exception->getLine(),
            ]);

            // Xóa ảnh đại diện nếu đã lưu nhưng xảy ra lỗi
            if ($pathAvatar && file_exists('storage/' . $pathAvatar)) {
                unlink('storage/' . $pathAvatar);
            }

            return redirect()->route('cp-admin.products.index')->with('error', 'Thêm sản phẩm thất bại!');
        }
    }

    public function edit($id)
    {
        $Product = Product::find($id);
        if(!$Product){
            return redirect()->back();
        }
        $supplier = Supplier::all();
        $categoryAll = Category::all();
    //    dd($supplier);
        $origin = Origin::all();
        return view('admin.pages.product.edit', compact('Product', 'supplier', 'categoryAll', 'origin'));
    }

    public function update(Request $request, $id)
    {
        $Product = Product::find($id);
        if (!$Product) {
            return redirect()->back();
        }

        $this->validate(
            $request,
            [
                'namePro' => 'required|unique:products,namePro,' . $Product->id,
                'slug' => 'required|unique:products,slug,' . $Product->id,
                'image' => 'mimes:jpg,bmp,png|max:2048',
                'images.*' => 'max:2048', // Validate cho ảnh nhiều
                'quantity' => 'required|numeric|min:0',
                'price' => 'required|numeric|min:1',
                'discounts' => 'required|numeric|min:0|max:100',
                'status' => 'required|numeric|min:0|max:1',
                'category_id' => 'required|numeric|min:1',
                'supplier_id' => 'required|numeric|min:1',
                'origin_id' => 'required|numeric|min:1',
            ]
        );

        // Xử lý ảnh đại diện
        if ($request->file('image') != null) {
            if (file_exists('storage/' . $Product->image)) {
                unlink('storage/' . $Product->image);
            }
            $pathAvatar = $request->file('image')->store('public/images/products');
            $pathAvatar = str_replace("public/", "", $pathAvatar);
        } else {
            $pathAvatar = $Product->image;
        }

        // Xử lý ảnh nhiều
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('public/images/products');
                $imagePaths[] = str_replace("public/", "", $path);
            }
        }

        try {
            DB::beginTransaction();

            // Cập nhật thông tin sản phẩm
            $data = $request->only(['namePro', 'quantity', 'slug', 'price', 'discounts', 'Description', 'status', 'category_id', 'supplier_id', 'origin_id']);
            $data['users_id'] = auth()->user()->id;
            $data['image'] = $pathAvatar;

            $Product->update($data);

            // Xóa các ảnh cũ trong bảng `images` nếu cần
            foreach ($Product->images as $image) {
                if (file_exists('storage/' . $image->image_path) && !empty($image->image_path)) {
                    unlink('storage/' . $image->image_path);
                }
                $image->delete();
            }

            // Lưu ảnh mới vào bảng `product_images`
            foreach ($imagePaths as $imagePath) {
                ProductImage::create([
                    'product_id' => $Product->id,
                    'image_path' => $imagePath,
                ]);
            }

            DB::commit();
            return redirect()->route('cp-admin.products.index')->with('message', 'Cập nhật sản phẩm thành công');
        } catch (\Exception $exception) {
            DB::rollBack();

            // Xóa ảnh vừa tải lên nếu có lỗi
            if (isset($pathAvatar) && file_exists('storage/' . $pathAvatar)) {
                unlink('storage/' . $pathAvatar);
            }
            foreach ($imagePaths as $path) {
                if (file_exists('storage/' . $path)) {
                    unlink('storage/' . $path);
                }
            }

            return redirect()->route('cp-admin.products.index')->with('error', 'Sửa sản phẩm thất bại!');
        }
    }


    public function delete($id)
    {
        $Product = Product::find($id);

        if ($Product) {
            if (file_exists('storage/' . $Product->image)) {
                unlink('storage/' . $Product->image);
            }
            $Product->delete();
            return response()->json([
                'message' => "Xóa sản phẩm thành công",
                'status' => "200"
            ]);
        }
        return response()->json([
            'message' => "Không tìm thấy sản phẩm",
            'status' => "401"
        ]);
    }
}
