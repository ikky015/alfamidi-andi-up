<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index() {
        $products = Product::with('category')->latest()->paginate(10);
        
        return view('pages.products.index', [
            "products" => $products,
        ]);
    }

    public function create() {
        $categories = Category::all();

        return view('pages.products.create', [
            "categories" => $categories,
        ]);
    }

    public function gudang(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "category_id" => "required",
            "sku" => "required",
        ],[
            "name.required" => "Nama produk harus diisi,",
            "name.min" => "Nama produk minimal 3 karakter,",
            "price.required" => "Harga produk harus diisi,",
            "stock.required" => "Stok produk harus diisi,",
            "category_id.required" => "Kategori produk harus diisi,",
            "sku.required" => "Kode produk harus diisi",
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Berhasil Menambahkan Produk');
    }

    public function edit($id) {
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('pages.products.edit', [
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "required|min:3",
            "description" => "nullable",
            "price" => "required",
            "stock" => "required",
            "category_id" => "required",
            "sku" => "required",
        ], [
            "name.required" => "Nama produk harus diisi",
            "name.min" => "Nama produk minimal 3 karakter",
            "price.required" => "Harga produk harus diisi",
            "stock.required" => "Stok produk harus diisi",
            "category_id.required" => "Kategori produk harus diisi",
            "sku.required" => "Kode produk harus diisi",
        ]);

        Product::where('id', $id)->update($validated);

        return redirect('/products')->with('success', 'Berhasil Mengubah Produk');
    }

    public function delete($id) 
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products')->with('success', 'Berhasil Menghapus Produk');
    }
}
