<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;
class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginForm(AuthRequest $request){
        $remember =$request->has('remember');
        if(Auth::attempt([
            'email' => $request-> email,
            'password' => $request->password,
        ],$remember)){
            if(Auth::user()->role== '1') {
                return redirect()->route('admin')->with(['messageSucess'=>'Đang nhập thành công']);
            }else {
                return redirect()->route('home')->with(['messageSucess'=>'Đang nhập thành công']);
            }

        }else{
            return redirect()->back()->with([
                'message' => 'Email hoặc mật khẩu sai',
            ]);
        }
    }
    public function register(){
        return view('auth.register');
    }
    public function registerpost(RegisterRequest $request){

        $check = User::where('email',$request->email)->exists();
        if($check){
            return redirect()->route('register')->with([
                'message'=>'Email đã tồn tại',
            ]);
        }
        else{
            $data=[

                'email'=> $request->email,
                'password'=>Hash::make($request ->password),
                'name'=> $request->name,
                'address' =>$request ->address,
                'phone' =>$request ->phone,
            ];

            $newUser= User::create($data);
            Auth::login($newUser);
            return redirect()->route('home')->with([
                'messageSucess'=> 'Đăng nhập thành công',
            ]);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with([
            'messageSucess'=>'Đăng xuát thành công',
        ]);
    }
}
