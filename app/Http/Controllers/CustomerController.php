<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function guestLogin()
    {
        return view('guest.customer.login');
    }

    public function guestRegister()
    {
        return view('guest.customer.register');
    }

    public function guestForgetPassword()
    {
        return view('guest.customer.forget_password');
    }

    public function guestPostLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = Customer::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'message' => 'Tên tài khoản hoặc mật khẩu không chính xác!',
            ]);
        }

        if ($user->email_verified_at === null) {
            return back()->withErrors([
                'message' => 'Tài khoản chưa được xác thực, vui lòng xác thực để đăng nhập!',
            ]);
        }

        if (Auth::guard('customers')->attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'message' => 'Lỗi đăng nhập, vui lòng thử lại!',
            ]);
        }
    }

}