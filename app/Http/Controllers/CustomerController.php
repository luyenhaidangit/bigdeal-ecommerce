<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Helpers\MailHelper;
use App\Mail\AccountCustomerActivationEmail;
use App\Mail\AccountCustomerResetPasswordEmail;
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

    public function guestResetPassword(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');


        return view('guest.customer.reset_password', compact('email', 'token'));
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
            session()->put('user', [
                'email' => $user->email,
                'role' => 'customer',
            ]);

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

    public function guestPostForgetPassword(Request $request)
    {
        $email = $request->input('email');

        // Kiểm tra xem khách hàng có tồn tại với email đã cung cấp hay không
        $customer = Customer::where('email', $email)->first();

        if ($customer) {
            // Tạo token cho đặt lại mật khẩu
            $token = Str::random(60);
            $customer->token = $token;
            $customer->save();

            // Gửi email đặt lại mật khẩu
            Mail::to($email)->send(new AccountCustomerResetPasswordEmail($customer));

            return redirect()->route('guest.customer.login')->with('success', 'Một email chứa hướng dẫn đặt lại mật khẩu đã được gửi đến địa chỉ email của bạn.');
        }

        return redirect()->back()->withErrors(['email' => 'Không tìm thấy người dùng với địa chỉ email đã cung cấp.'])->withInput();
    }

    public function guestPostResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $email = $request->input('email');
        $token = $request->input('token');

        $customer = Customer::where('email', $email)
            ->where('token', $token)
            ->first();

        if (!$customer) {
            return redirect()->route('guest.customer.login')->with('error', 'Liên kết đặt lại mật khẩu không hợp lệ.');
        }

        $customer->password = $request->input('password');
        $customer->token = null;
        $customer->save();

        return redirect()->route('guest.customer.login')->with('success', 'Mật khẩu đã được đặt lại thành công. Vui lòng đăng nhập bằng mật khẩu mới.');
    }

    public function guestPostCheckLogin()
    {
        if (Auth::guard('customers')->check()) {
            $user = Auth::guard('customers')->user();
            $userData = [
                'email' => $user->email,
                'name' => $user->first_name . ' ' . $user->last_name,
                'role' => 'customer',
            ];

            return response()->json([
                'success' => true,
                'user' => $userData,
            ]);
        } else {
            return response()->json([
                'success' => false,
            ]);
        }
    }

    public function guestWishlistReponse()
    {
        if (Auth::guard('customers')->check()) {
            $user = Auth::guard('customers')->user();

            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Người dùng không tồn tại.',
                ]);
            }

            // $products = $user->wishlists()->with('product')->get()->pluck('product');
            $wishlists = $user->wishlists()->with('product')->get();

            $products = $wishlists->map(function ($wishlist) {
                $product = $wishlist->product;
                $product->quantity = $wishlist->quantity;
                return $product;
            });

            return response()->json([
                'success' => true,
                'products' => $products,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Người dùng chưa đăng nhập'
            ]);
        }
    }
}