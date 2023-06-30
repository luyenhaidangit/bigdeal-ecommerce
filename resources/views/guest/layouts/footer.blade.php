<!-- footer start -->
<footer>
    <div class="footer1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-main">
                        <div class="footer-box">
                            <div class="footer-title mobile-title">
                                <h5>Về chúng tôi</h5>
                            </div>
                            <div class="footer-contant">
                                <div class="footer-logo">
                                    <a href="index.html">
                                        <img src="{{ asset($website->logo) }}"
                                            class="img-fluid" alt="logo">
                                    </a>
                                </div>
                                <p>{!! $website->description !!}</p>
                                <ul class="paymant">
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('guest-resource/images/layout-1/pay/1.png') }}"
                                                class="img-fluid" alt="pay"></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('guest-resource/images/layout-1/pay/2.png') }}"
                                                class="img-fluid" alt="pay"></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('guest-resource/images/layout-1/pay/3.png') }}"
                                                class="img-fluid" alt="pay"></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('guest-resource/images/layout-1/pay/4.png') }}"
                                                class="img-fluid" alt="pay"></a></li>
                                    <li><a href="javascript:void(0)"><img
                                                src="{{ asset('guest-resource/images/layout-1/pay/5.png') }}"
                                                class="img-fluid" alt="pay"></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>Tài khoản</h5>
                            </div>
                            <div class="footer-contant">
                                <ul>
                                    <li><a href="javascript:void(0)">Về chúng tôi</a></li>
                                    <li><a href="javascript:void(0)">Liên lạc</a></li>
                                    <li><a href="javascript:void(0)">Điều khoản</a></li>
                                    <li><a href="javascript:void(0)">Chính sách hoàn trả</a></li>
                                    <li><a href="javascript:void(0)">Chính sách giao hàng</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>Liên hệ chúng tôi</h5>
                            </div>
                            <div class="footer-contant">
                                <ul class="contact-list">
                                    <li><i class="fa fa-map-marker"></i>Cửa hàng BigDeal <br>
                                        {!! $website->address !!}</li>
                                    <li><i class="fa fa-phone"></i>Số điện thoại: <span> {!! $website->phone !!}</span></li>
                                    <li><i class="fa fa-envelope-o"></i>Email: {!! $website->email !!}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="footer-box">
                            <div class="footer-title">
                                <h5>Đăng ký nhận tin</h5>
                            </div>
                            <div class="footer-contant">
                                <div class="newsletter-second">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Họ và tên">
                                            <span class="input-group-text"><i class="ti-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Địa chỉ email">
                                            <span class="input-group-text"><i class="ti-email"></i></span>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <a href="javascript:void(0)" class="btn btn-solid btn-sm">Xác nhận</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subfooter dark-footer ">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="footer-left">
                        <p>2023 - Cửa hàng Bigdeal</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-4 col-sm-12">
                    <div class="footer-right">
                        <ul class="sosiyal">
                            <li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->
