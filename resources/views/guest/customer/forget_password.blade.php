@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Quên mật khẩu</h2>
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.customer.forget_password') }}">Quên mật khẩu</a></li>
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
                        @error('email')
                            <div class="alert alert-danger bg-danger text-white" style="border: none !important" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                        @if (session('success'))
                            <div class="alert alert-success bg-success text-white">
                                {{ session('success') }}
                            </div>
                        @endif
                        <h3>Quên mật khẩu</h3>
                        <form class="theme-form" action="{{ route('guest.customer.forget_password.post') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Nhập email của bạn" required="">
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
