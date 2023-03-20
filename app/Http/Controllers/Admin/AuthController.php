<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Specialization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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

        if (!Auth::guard('admins')->attempt($attr) || $user) {
            if($user->type=='doctor' && $user->status==1){
               return 'dd';
            }
            else{
                return back()->withErrors(['errors' => 'The account is not active.']);

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
}
