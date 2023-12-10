<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view("admin.dashboard");
    }

    public function productManage()
    {
        $books = Book::paginate(9);
        return view("product.products", compact("books"));
    }

    public function productAdmin()
    {
        $books = Book::all();
        return view("admin.products.index", compact("books"));
    }

    public function getMoreProducts(Request $request)
    {
        if ($request->ajax()) {
            $books = Book::paginate(9, ['*'], 'page');
            return view("product.product_list", compact("books"))->render();
        }

        return response()->json(['error' => 'Invalid request'], 400);
    }

    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        return view('admin.products.create', compact('categories', 'authors', 'publishers'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'book_name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'book_image' => 'required|image|mimes:jpeg,png,jpg|max:100000',
            'book_file' => 'required|mimes:pdf|max:100000',
            'book_description' => 'required',
            'quantity_stock' => 'required|numeric',
            'product_code' => 'required|unique:books,product_code',
            'price' => 'required|numeric',
            'status' => 'required',
        ]);


        $book = Book::create([
            'book_name' => $request->input('book_name'),
            'category_id' => $request->input('category_id'),
            'author_id' => $request->input('author_id'),
            'publisher_id' => $request->input('publisher_id'),
            'book_description' => $request->input('book_description'),
            'quantity_stock' => $request->input('quantity_stock'),
            'product_code' => $request->input('product_code'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);

        if ($request->hasFile('book_image')) {
            $image = $request->file('book_image');
            //$imagePath = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->getClientOriginalName();
            $destinationPath = public_path('book_images');
            $image->move($destinationPath,$imagePath);
            $imagePath = 'book_images/' . $imagePath;
            $book->book_image = $imagePath;
            $book->save();
        }

        if($request->hasFile('book_file')) {
            $file = $request->file('book_file');
            //$fileName = time() . '_' . $file->getClientOriginalName();
            $fileName =$file->getClientOriginalName();
            $destinationFilePath = public_path('book_files');
            $file->move($destinationFilePath,$fileName);
            $filePath = 'book_files/' . $fileName;
            $book->book_file = $fileName;
            $book->save();
        }

        // Redirect to the index page using the route name
        return redirect()->route('products.index')->with('message', 'Book created successfully');
    }

    public function edit($id)
    {

    }

    public function delete($id)
    {

    }

    public function search()
    {

    }
}
