<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Traits\ImageTrait;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $categories = Category::query()
            ->whereParentId(0)

            ->latest()

            ->paginate(10);


        return view('admin.categories.index', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->uploadImage('uploads/categories/', $request->file('image'));

        $category = Category::create($request->all());
        $category->update(['image' => $request->image->hashName()]);

        return back()->with('status', "add successfully");
    }

    public function update(Request $request, Category $category)
    {
        $this->uploadImage('uploads/categories/', $request->file('image'));

        $category->update($request->all());

        $category->update(['image' => $request->image->hashName()]);


        return back()->with('status', "add successfully");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('status', "deleted successfully");
    }
}
