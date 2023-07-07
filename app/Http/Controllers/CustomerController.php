<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Helpers\MailHelper;
use App\Mail\AccountCustomerActivationEmail;
use Illuminate\Support\Facades\Mail;

class CustomerController extends Controller
{
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

    public function guestPostRegister(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
        ], [
            'first_name.required' => 'Vui lòng nhập Họ.',
            'last_name.required' => 'Vui lòng nhập Tên.',
            'email.required' => 'Vui lòng nhập Email.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'password.required' => 'Vui lòng nhập Mật khẩu.',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự.',
        ]);

        $customer = new Customer($request->only('first_name', 'last_name', 'email', 'password'));

        // Send email
        $token = Str::random(32);
        $customer->token = $token;

        $customer->save();

        $activeLink = route('guest.customer.active', ['email' => $customer->email, 'token' => $token]);
        Mail::to($customer->email)->send(new AccountCustomerActivationEmail($activeLink));

        return redirect()->route('guest.customer.login')->with('success', 'Đăng ký thành công! Vui lòng xác nhận email để tiếp tục đăng nhập!');
    }

    public function guestVerify(Request $request, $email)
    {
        $token = $request->token;

        $customer = Customer::where('email', $email)
            ->where('token', $token)
            ->first();

        if ($customer) {
            $customer->email_verified_at = now();
            $customer->token = null;
            $customer->save();

            return redirect()->route('guest.customer.login')->with('success', 'Xác nhận email thành công! Vui lòng đăng nhập để tiếp tục.');
        }

        return redirect()->route('guest.customer.login')->with('error', 'Xác nhận email không hợp lệ.');
    }
}