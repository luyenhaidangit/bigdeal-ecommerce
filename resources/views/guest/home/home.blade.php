@extends('guest.layouts.layout')

@section('content')
    <!--top brand panel start-->
    <section class="brand-panel">
        <div class="brand-panel-box">
            <div class="brand-panel-contain ">
                <ul>
                    <li><a href="javascript:void(0)">top brand</a></li>
                    <li><a>:</a></li>
                    <li><a href="category-page(left-sidebar).html">aerie</a></li>
                    <li><a href="category-page(left-sidebar).html">baci lingrie</a></li>
                    <li><a href="category-page(left-sidebar).html">gerbe</a></li>
                    <li><a href="category-page(left-sidebar).html">jolidon</a></li>
                    <li><a href="category-page(left-sidebar).html">Wonderbra</a></li>
                    <li><a href="category-page(left-sidebar).html">Ultimo</a></li>
                    <li><a href="category-page(left-sidebar).html">Vassarette </a></li>
                    <li><a href="category-page(left-sidebar).html">Oysho</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--top brand panel end-->

    <!--slider start-->
    <section class="theme-slider home-slide b-g-white " id="home-slide">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <div class="slide-1 no-arrow">
                        @foreach ($mainSliders as $mainSlider)
                            <div>
                                <div class="slider-banner p-center slide-banner-1">
                                    <div class="slider-img" style="background-image: url('{{ asset($mainSlider->image)}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                        <ul class="layout1-slide-1">
                                            <li id="img-1"><img src="{{ asset($mainSlider->child_image_1)}}"
                                                    class="img-fluid"></li>
                                            <li id="img-2"><img
                                                    src="{{ asset($mainSlider->child_image_2)}}" class="img-fluid"
                                                    ></li>
                                        </ul>
                                    </div>
                                    <div class="slider-banner-contain">
                                        <div>
                                            <h1>{{ $mainSlider->title_1 }}</h1>
                                            <h4>{{ $mainSlider->title_2 }}</h4>
                                            <h2>{{ $mainSlider->title_3 }}</h2>
                                            @if ($mainSlider->link_url)
                                                <a href="{{ $mainSlider->link_url }}" class="btn btn-normal">
                                                    Mua ngay
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--slider end-->

    <!-- cookie bar start -->
    <div class="cookie-bar">
        <p>Chúng tôi sử dụng cookie để cải thiện trang web và trải nghiệm mua sắm của bạn. Bằng cách tiếp tục duyệt trang
            web của chúng tôi, bạn chấp nhận chính sách cookie của chúng tôi.</p>
        <a href="javascript:void(0)" class="btn btn-solid btn-xs">Tiếp tục</a>
        <a href="javascript:void(0)" class="btn btn-solid btn-xs">Từ chối</a>
    </div>
    <!-- cookie bar end -->

    <!-- notification product -->
    <div class="product-notification" id="dismiss">
        <span onclick="dismiss();" class="btn-close" aria-hidden="true"></span>
        <div class="media">
            <img class="me-2" src="{{ asset('guest-resource/images/layout-1/product/iphone-14.jpg') }}"
                alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0 mb-1">Xu hướng</h5>
                Điện thoại Iphone 14 giảm mạnh tới 50%
            </div>
        </div>
    </div>
    <!-- notification product -->
@endsection
