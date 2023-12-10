<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publishers.index', compact('publishers'));
    }

    public function create()
    {
        return view('admin.publishers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'publisher_name' => 'required',
            'publisher_info' => 'required',
            'publisher_image' => 'required|image|mimes:jpeg,png,jpg|max:1000000',
        ]);

        $publisher = Publisher::create([
            'publisher_name' => $request->publisher_name,
            'publisher_info' => $request->publisher_info,
        ]);

        if ($request->hasFile('publisher_image')) {
            $image = $request->file("publisher_image");
            $filename = $image->getClientOriginalName();
            $destinationPath = public_path('publisher_images');
            $image->move($destinationPath, $filename);
            $imagePath = 'publisher_images/' . $filename;
            $publisher->publisher_image = $imagePath;
            $publisher->save();
        }

        return redirect()->route('publishers.index')->with('message', 'Publisher created successfully');
    }

    public function edit($id)
    {

    }

    public function delete($id)
    {

    }
}
