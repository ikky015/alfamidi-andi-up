<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function gudang(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required|unique:categories,name",
        ], [
            "name.required" => "Nama kategori harus disi",
            "name.unique" => "Nama kategori sudah ada!",
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories')->with('success', 'Berhasil Menambahkan Kategori');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            "name" => "required|unique:categories,name",
        ], [
            "name.required" => "Nama kategori harus disi",
            "name.unique" => "Nama kategori sudah ada!",
        ]);

        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = Str::slug($request->input('name'));
        $category->save();

        return redirect('/categories')->with('success', 'Berhasil Mengubah Kategori');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();

        return redirect('/categories')->with('success', 'Berhasil Menghapus Kategori');
    }
}
