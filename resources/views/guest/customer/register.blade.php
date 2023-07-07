@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Đăng ký</h2>
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.customer.register') }}">Đăng ký</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="login-page section-big-py-space b-g-light">
        <div class="custom-container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="theme-card">
                        <h3 class="text-center">Tạo tài khoản</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger bg-danger text-white" style="border: none !important"
                                role="alert">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form class="theme-form" method="POST" action="{{ route('guest.customer.register.post') }}">
                            @csrf
                            <div class="form-group">
                                <label>Họ</label>
                                <input type="text" class="form-control" name="first_name" placeholder="Họ" required>
                            </div>
                            <div class="form-group">
                                <label>Tên</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Tên" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                            </div>
                            <button type="submit" class="btn btn-normal">Đăng ký</button>
                            <p class="mt-3">Bạn đã có tài khoản? <a href="{{ route('guest.customer.login') }}"
                                    class="txt-default">Đăng nhập</a> ngay.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
@endsection
