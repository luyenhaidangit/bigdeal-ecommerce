@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Đăng nhập</h2>
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.customer.login') }}">Đăng nhập</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-8 offset-xl-4 offset-lg-3 offset-md-2">
                    <div class="theme-card">
                        @error('message')
                            <div class="alert alert-danger bg-danger text-white" style="border: none !important" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        <h3 class="text-center">Đăng nhập</h3>
                        <form class="theme-form" method="POST" action="{{ route('guest.customer.login.post') }}">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <button type="submit" class="btn btn-normal">Đăng nhập</button>
                            <a class="float-end txt-default mt-2" href="forget-pwd.html">Quên mật khẩu?</a>
                        </form>

                        <p class="mt-3">Đăng ký tài khoản miễn phí tại cửa hàng của chúng tôi. Quá trình đăng ký nhanh
                            chóng và dễ dàng. Nó cho phép bạn có thể đặt hàng từ cửa hàng của chúng tôi. Để bắt đầu mua sắm,
                            hãy nhấp vào nút bên dưới.</p>
                        <a href="{{ route('guest.customer.register') }}" class="txt-default pt-3 d-block">Đăng ký tài
                            khoản</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
