<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Specialization;
use App\Traits\ImageTrait;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpecializationController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $categories = Specialization::query()

            ->latest()

            ->paginate(10);


        return view('admin.specializations.index', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $category = Specialization::create($request->all());

        return back()->with('status', "add successfully");
    }

    public function update(Request $request, $id)
    {

        $category=Specialization::find($id);
        $category->update($request->all());



        return back()->with('status', "add successfully");
    }

    public function destroy($id)
    {

        $category=Specialization::find($id);
        $category->delete();
        return back()->with('status', "deleted successfully");
    }
}
