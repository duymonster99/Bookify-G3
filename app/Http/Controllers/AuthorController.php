<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $authors = Author::all();
        return view("admin.authors.index", compact("authors"));
    }


    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view("admin.authors.create");
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'author_name' => 'required',
    //         'author_info'=> 'required',
    //         'author_img'=>'required|image|mimes:jpeg,png,jpg|max:100000'
    //     ]);

    //     $author = Author::create([
    //         'author_name'=>$request->author_name,
    //         'author_info' => $request->author_info
    //     ]);

    //     if($request->hasFile('author_img')){
    //         $image = $request->file("author_img");
    //         $filename = $image->getClientOriginalName();
    //         $destinationPath = public_path('author_images');
    //         $image -> move($destinationPath, $filename);
    //         $imagePath = 'author_images/' . $filename;
    //         $author->author_img = $imagePath;
    //         $author->save();
    //     }

    //     return redirect()->route('authors.index')->with('message', 'Author created successfully');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required',
            'author_info' => 'required',
            'author_img.*' => 'required|image|mimes:jpeg,png,jpg|max:100000' // Đặt author_img.* để xác định multiple files
        ]);

        $author = Author::create([
            'author_name' => $request->author_name,
            'author_info' => $request->author_info,
            'author_images' => [] // Khởi tạo trường JSON với mảng rỗng
        ]);

        if ($request->hasFile('author_img')) {
            $images = $request->file("author_img");
            $imagePaths = [];
            dd($images);

            foreach ($images as $image) {
                try {
                    $filename = $image->getClientOriginalName();
                    $destinationPath = public_path('author_images');
                    $image->move($destinationPath, $filename);
                    $imagePath = 'author_images/' . $filename;
                    $imagePaths[] = $imagePath;
                } catch (\Exception $e) {
                    dd($e->getMessage()); // Hiển thị thông báo lỗi
                }
            }


            // Chuyển đổi mảng đường dẫn thành chuỗi JSON
            $jsonPaths = Json::encode($imagePaths);

            // Thêm đường dẫn của các ảnh vào trường JSON 'author_images'
            $author->author_img = $jsonPaths;
            $author->save();
        }

        return redirect()->route('authors.index')->with('message', 'Author created successfully');
    }


    public function edit($id)
    {
    }

    public function delete($id)
    {
    }
}

