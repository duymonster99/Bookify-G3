<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Hiển thị form tạo mới danh mục
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.categories.create');
    }

    // Xử lý tạo mới danh mục
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);

        // Tạo mới danh mục
        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('categories.index')->with('message', 'Category created successfully');
    }

    public function edit($id)
    {

    }

    public function delete($id)
    {

    }
}
