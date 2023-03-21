<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Specialization;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;


class AuthController extends Controller
{
    use ImageTrait;
    public function loginPage()
    {
        return view('admin.signin');
    }

    public function RegisterPage()
    {
        $specializations=Specialization::latest()->get();
        return view('admin.register',compact('specializations'));
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'The email faild is required.',
            'email.string' => 'The email faild must be string.',
            'email.email' => 'The email faild must be email.',
            'email.exists' => 'The your email is incorrect.',
            'password.required' => 'The password faild is required.',
            'password.string' => 'The password faild must be string.',
            'password.min' => 'The password faild must be at leates 6 letter.',
        ]);

        $user=User::where('email',$request->email)->first();





        if (!Auth::guard('admins')->attempt($attr)|| $user) {
              if($user)
              {

                  if(auth()->guard('web')->attempt($attr)  && $user->status==1){
                    return redirect()->route('doctor.profile');

                  }
                  else{
                      return back()->withErrors(['errors' => 'data is invaild or account not activate.']);

                  }
              }
            return redirect()->route('admin.login.page')
                ->withErrors(['errors' => 'The password is incorrect.']);
        }



        return redirect()->route('patient.index');
    }

    public function register(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|unique:users|string|email',
            'phone' => 'required|unique:users',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'The email faild is required.',
            'email.email' => 'The email faild must be email.',
            'email.unique' => 'The your email has been token.',
            'phone.required' => 'The phone faild must be required.',
            'phone.unique' => 'The your phone  has been token..',
            'password.required' => 'The password faild is required.',
            'password.min' => 'The password faild must be at leates 6 letter.',
        ]);
        if(Admin::whereEmail($request->email)->first()){
            return back()->withErrors(['errors' => 'The account is exist for admin .']);

        }


         User::create([
            'email'=>$request->email,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
            'status'=>0,
            'specialization_id'=>$request->specialization_id,
            'type'=>'doctor'
         ]);
        return back()->with('status', "account is waititng form admin to active");

    }

    public function logout()
    {

        auth()->guard('admins')->logout();
        return redirect()->route('admin.login.page');

    }

    public function profile(){
      return view('website.profile');
    }

    public function updateProfile(Request $request)
    {

        $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email,'.auth()->user()->id,
        'password' =>'confirmed',
        'image'   =>'image|mimes:jpeg,png,jpg,gif,svg'
      ];

        $messages = [
        'name.required'        => 'ادخل الاسم',

        'email.required'        => 'ادخل البريد الالكتروني',
        'email.unique'          => ' هذا البريد يستخدمه شخص اخر',
        'password.confirmed'         => 'كلمة المرور غير متطابقة',
      ];

        $this->validate($request, $rules, $messages);

        $input = $request->all();

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = $request->except(['password']);
            // $input = array_except($input,array('password'));
        }


       auth()->user()->update($input);

        if ($request->file('cv')) {
            $path = $this->uploadFile('uploads/cvs/', $request->file('cv'));
            auth()->user()->update(['cv'=> $path ]);
        }



        return back()->with('status', 'Added successfully.');
    }

}
