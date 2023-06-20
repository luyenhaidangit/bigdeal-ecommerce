@extends('guest.layouts.layout')

@section('content')
    <!--top brand panel start-->
    <section class="brand-panel">
        <div class="brand-panel-box">
            <div class="brand-panel-contain ">
                <ul>
                    <li><a href="javascript:void(0)">Nhãn hiệu nổi bật</a></li>
                    <li><a>:</a></li>
                    @foreach ($brands as $brand)
                        <li><a href="category-page(left-sidebar).html">{{ $brand->name }}</a></li>
                    @endforeach
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
                                    <div class="slider-img"
                                        style="background-image: url('{{ asset($mainSlider->image) }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                                        <ul class="layout1-slide-1">
                                            <li id="img-1"><img src="{{ asset($mainSlider->child_image_1) }}"
                                                    class="img-fluid"></li>
                                            <li id="img-2"><img src="{{ asset($mainSlider->child_image_2) }}"
                                                    class="img-fluid"></li>
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

    <!--collection banner start-->
    <section class="collection-banner section-pt-space b-g-white ">
        <div class="custom-container">
            <div class="row collection2">
                @foreach ($bannersTypeMainHome as $banner)
                    <div class="col-md-4">
                        <div class="collection-banner-main banner-1  p-right">
                            <div class="collection-img" style="height: 232px; border-radius: 12px;">
                                <img src="{{ asset($banner->image) }}" class="img-fluid bg-img  " alt="banner">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--collection banner end-->

    <!--discount banner start-->
    <section class="discount-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="discount-banner-contain">
                        <h2>Chào mừng đến với trang web của chúng tôi.</h2>
                        <h1><span>Đặt hàng</span> <span>ngay hôm nay!</span></h1>
                        <div class="rounded-contain rounded-inverse">
                            <div class="rounded-subcontain">
                                Chúng tôi cam kết mang đến cho bạn những sản phẩm chất lượng với mức giá vô cùng hấp dẫn!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--discount banner end-->

    <!--tab product-->
    <section class="section-pt-space">
        <div class="tab-product-main">
            <div class="tab-prodcut-contain">
                <ul class="tabs tab-title">
                    @foreach ($productCategories as $index => $productCategory)
                        <li class="{{ $loop->first ? 'current' : '' }}">
                            <a href="tab-{{ $index + 1 }}">{{ $productCategory->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!--tab product-->

    <!-- slider tab  -->
    <section class="section-py-space ratio_square product">
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="theme-tab product mb--5">
                        <div class="tab-content-cls ">
                            @foreach ($productCategories as $index => $productCategory)
                                <div id="tab-{{ $index + 1 }}"
                                    class="tab-content {{ $loop->first ? 'active default' : '' }}">
                                    @foreach ($productCategory->products as $product)
                                        <div class="product-slide-6 product-m no-arrow">
                                            <div>
                                                <div class="product-box">
                                                    <div class="product-imgbox">
                                                        <div class="product-front">
                                                            <a href="product-page(left-sidebar).html">
                                                                @if ($product->image)
                                                                    <img src="{{ asset($product->image) }}"
                                                                        class="img-fluid" alt="product"
                                                                        style="margin: 12px; width: -webkit-fill-available; min-height: 160px;">
                                                                @else
                                                                    <img src="{{ asset('guest-resource/images/layout-2/product/5.jpg') }}"
                                                                        class="img-fluid" alt="default-image">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="product-back">
                                                            <a href="product-page(left-sidebar).html">
                                                                @if ($product->image)
                                                                    <img src="{{ asset($product->image) }}"
                                                                        class="img-fluid" alt="product"
                                                                        style="margin: 12px; width: -webkit-fill-available;min-height: 160px;">
                                                                @else
                                                                    <img src="{{ asset('guest-resource/images/layout-2/product/5.jpg') }}"
                                                                        class="img-fluid" alt="default-image">
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="product-icon icon-inline">
                                                            <button onclick="openCart()" class="tooltip-top"
                                                                data-tippy-content="Add to cart">
                                                                <i data-feather="shopping-cart"></i>
                                                            </button>
                                                            <a href="javascript:void(0)" class="add-to-wish tooltip-top"
                                                                data-tippy-content="Add to Wishlist">
                                                                <i data-feather="heart"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                data-bs-target="#quick-view" class="tooltip-top"
                                                                data-tippy-content="Quick View">
                                                                <i data-feather="eye"></i>
                                                            </a>
                                                            <a href="compare.html" class="tooltip-top"
                                                                data-tippy-content="Compare">
                                                                <i data-feather="refresh-cw"></i>
                                                            </a>
                                                        </div>
                                                        @if ($product->created_at >= now()->subDays(7))
                                                            <div class="new-label1">
                                                                <div>Mới</div>
                                                            </div>
                                                        @endif
                                                        @if (
                                                            !is_null($product->discount_price) &&
                                                                $product->start_date_discount <= now() &&
                                                                $product->expiration_date_discount >= now())
                                                            <div class="on-sale1">
                                                                Giảm giá
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="product-detail detail-inline">
                                                        <div class="detail-title">
                                                            <div class="detail-left">
                                                                <div class="rating-star">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= floor($product->ratingStar))
                                                                            <div class="fa fa-star text-warning"></div>
                                                                        @else
                                                                            <div class="fa fa-star-o text-secondary"></div>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                                <a href="product-page(left-sidebar).html">
                                                                    <h6 class="price-title">
                                                                        {{ $product->name }}
                                                                    </h6>
                                                                </a>
                                                            </div>
                                                            <div class="detail-right">
                                                                <div class="check-price">
                                                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                                                </div>
                                                                <div class="price">
                                                                    <div class="price">
                                                                        {{ number_format($product->discount_price, 0, ',', '.') }}đ
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider tab end -->

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
