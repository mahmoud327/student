<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use App\Traits\ImageTrait;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $users=User::latest()
        ->whereType('doctor')

        ->paginate(10);

        return view('admin.users.index',compact('users'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->uploadImage('uploads/services/',$request->file('image'));
       $ervice= Service::create($request->all());
        $ervice->update(['image'=>$request->image->hashName()]);

        return back()->with('status', "add successfully");
    }

    public function update(Request $request, Service $category)
    {

        $category->update($request->all());


        return back()->with('status', "add successfully");
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return back()->with('status', "deleted successfully");
    }

    public function Publish($id)
    {
        $user = user::find($id);
        $user->status = 1;
        $user->save();
        return back()->with('success', __('user Publish Successful'));

    }
    public function notPublish($id)
    {
        $user = user::find($id);
        $user->status = 0;
        $user->save();
        return back()->with('success', __('offer notPublish Successful'));

    }

}
