@extends('guest.layouts.layout')

@section('content')
    <!-- section start -->
    <section class="p-0 b-g-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="error-section">
                        <h1>404</h1>
                        <h2>Trang không tồn tại</h2>
                        <a href="{{ route('guest.home') }}" class="btn btn-normal">Trở về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection
