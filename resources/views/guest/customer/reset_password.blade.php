@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Đặt lại mật khẩu</h2>
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.customer.reset_password') }}">Đặt lại mật khẩu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="login-page pwd-page section-big-py-space b-g-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="theme-card">
                        @error('password')
                            <div class="alert alert-danger bg-danger text-white" style="border: none !important" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session('error'))
                            <div class="alert alert-danger bg-danger text-white">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success bg-success text-white">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h3>Đổi mật khẩu</h3>
                        <form class="theme-form" action="{{ route('guest.customer.reset_password.post') }}" method="POST">
                            @csrf
                            <input type="hidden" name="email" value="{{ $email }}">
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu mới" required="">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu mới" required="">
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-normal">Xác nhận</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
