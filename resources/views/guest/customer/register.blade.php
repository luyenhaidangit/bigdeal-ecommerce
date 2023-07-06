@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>register</h2>
                            <ul>
                                <li><a href="index.html">home</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="javascript:void(0)">register</a></li>
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
                <div class="col-lg-4 offset-lg-4">
                    <div class="theme-card">
                        <h3 class="text-center">Create account</h3>
                        <form class="theme-form">
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label for="email">First Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder="First Name"
                                        required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="review">Last Name</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Last Name"
                                        required="">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12 form-group">
                                    <label>email</label>
                                    <input type="text" class="form-control" placeholder="Email" required="">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter your password"
                                        required="">
                                </div>
                                <div class="col-md-12 form-group"><a href="javascript:void(0)" class="btn btn-normal">create
                                        Account</a></div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-12 ">
                                    <p>Have you already account? <a href="login.html" class="txt-default">click</a> here to
                                        &nbsp;<a href="login.html" class="txt-default">Login</a></p>
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
