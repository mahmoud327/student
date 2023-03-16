<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\NewPage;
use App\Services\newService;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewController extends Controller
{


    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'categories' => Category::latest()->get(),

            'news' => NewPage::latest()
                ->with('category')
                ->paginate(10),

        ];
        return view('admin.news.index', $data);
    }
    public function create()
    {

        $data = [
            'categories' => Category::latest()->get(),
        ];
        return view('admin.news.create', $data);
    }
    /**
     * Store a NewPagely created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $new = NewPage::create($data);

        if ($request->file('image')) {
            $new->image = $this->uploadImage('uploads/news/', $request->file('image'));
            $new->save();
        }
        if ($request->file('image2')) {
            $new->image2 = $this->uploadImage('uploads/news/', $request->file('image2'));
            $new->save();
        }



        return redirect(route('news.index'))->with('status', "add successfully");
    }

    public function update(Request $request, NewPage $news)
    {

        $news->update($request->all());
        if ($request->image) {
            $news->image = $this->uploadImage('uploads/newss/', $request->image);
            $news->save();
        }
        if ($request->image2) {
            $news->image2 = $this->uploadImage('uploads/newss/', $request->image2);
            $news->save();
        }
        return back()->with('status', "add successfully");
    }

    public function destroy($id)
    {
      $new=NewPage::find($id);
        if (!is_null($new->image)) {

            Storage::disk('news')->delete($new->image);
        }
        $new->delete();

        // $new = $this->newService->deletenew($new);

        return back()->with('status', "deleted successfully");
    }

    public function uploadNewImage(Request $request)
    {
        $file = $request->file('dzfile');
        $filename = $this->uploadImage('uploads/news', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
}
