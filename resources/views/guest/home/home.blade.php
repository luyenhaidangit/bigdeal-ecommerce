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
                                    <div class="product-slide-6 product-m no-arrow">
                                        @foreach ($productCategory->products as $product)
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
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider tab end -->

    <!--collection banner start-->
    <section class="collection-banner section-pb-space ">
        <div class="custom-container">
            <div class="row">
                <div class="col">
                    <a href="{{ $bannerTypeSpecial->link_url }}" class="collection-banner-main banner-5 p-center">
                        <div class="collection-img" style="height: 160px;">
                            <img src="{{ asset($bannerTypeSpecial->image) }}" class="bg-img  " alt="banner">
                        </div>
                        <div class="collection-banner-contain ">
                            <div class="sub-contain">
                                <h3>{{ $bannerTypeSpecial->title_1 }}</h3>
                                <h4>{{ $bannerTypeSpecial->title_2 }}</span></h4>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--collection banner end-->

    <!--deal banner start-->
    <section class="deal-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="deal-banner-containe">
                        <h2>
                            Khuyến mãi hấp dẫn: Các sản phẩm giảm giá đặc biệt!
                        </h2>
                        <h1 class="mt-2">
                            Các mặt hàng giảm giá mạnh lên tới 50%
                        </h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 ">
                    <div class="deal-banner-containe">
                        <diV class="deal-btn">
                            <a href="category-page(left-sidebar).html" class="btn-white">
                                Xem thêm
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--deal banner end-->

    <!--rounded category start-->
    <section class="rounded-category">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="slide-6 no-arrow">
                        @foreach ($productCategories as $productCategory)
                            <div>
                                <div class="category-contain">
                                    <div class="img-wrapper">
                                        <a href="category-page(left-sidebar).html">
                                            <img src="{{ asset($productCategory->image) }}" alt="category  "
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <a href="category-page(left-sidebar).html" class="btn-rounded">
                                        {{ $productCategory->name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--rounded category end-->

    <!--box categroy start-->
    <section class="box-category section-py-space">
        <div class="container-fluid ">
            <div class="row">
                <div class="col pl-0">
                    <div class="slide-10 no-arrow">
                        <div>
                            <a href="category-page(left-sidebar).html">
                                <div class="box-category-contain">
                                    <h4>Hàng hiệu</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="category-page(left-sidebar).html">
                                <div class="box-category-contain">
                                    <h4>Miễn phí vận chuyển</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="category-page(left-sidebar).html">
                                <div class="box-category-contain">
                                    <h4>Giảm 50%</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="category-page(left-sidebar).html">
                                <div class="box-category-contain">
                                    <h4>Hàng quốc tế</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="category-page(left-sidebar).html">
                                <div class="box-category-contain">
                                    <h4>Dưới 99K</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="category-page(left-sidebar).html">
                                <div class="box-category-contain">
                                    <h4>Tiết kiệm</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--box category end-->

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

    <!-- media banner tab start-->
    <section class=" ratio_square">
        <div class="custom-container b-g-white section-pb-space">
            <div class="row">
                <div class="col p-0">
                    <div class="theme-tab product">
                        <ul class="tabs tab-title media-tab">
                            <li class="current"><a href="tab-7">Mới ra mắt</a></li>
                            <li class=""><a href="tab-8">Bán chạy</a></li>
                            <li class=""><a href="tab-9">Giảm giá mạnh</a></li>
                            <li class=""><a href="tab-10">Xem nhiều</a></li>
                        </ul>
                        <div class="tab-content-cls">
                            <div id="tab-7" class="tab-content active default ">
                                <div class="media-slide-5 product-m no-arrow">
                                    @foreach ($newProducts as $key => $product)
                                        @if ($key % 3 == 0)
                                            <div>
                                        @endif

                                        <div class="media-banner media-banner-1 border-0">
                                            <div class="media-banner-box">
                                                <div class="media">
                                                    <a href="product-page(left-sidebar).html">
                                                        <img src="{{ asset($product->image) }}" class="img-fluid"
                                                            alt="banner" style="height: 84px; width: 84px;">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="media-contant">
                                                            <div>
                                                                <div class="product-detail">
                                                                    <ul class="rating">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= floor($product->ratingStar))
                                                                                <div class="fa fa-star text-warning"></div>
                                                                            @else
                                                                                <div class="fa fa-star-o text-secondary">
                                                                                </div>
                                                                            @endif
                                                                        @endfor
                                                                    </ul>
                                                                    <a href="product-page(left-sidebar).html">
                                                                        <p>{{ $product->name }}</p>
                                                                    </a>
                                                                    @if ($product->price)
                                                                        @if ($product->discount_price)
                                                                            <h6>{{ number_format($product->discount_price, 0, ',', '.') }}đ<span
                                                                                    class="ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                                                            </h6>
                                                                        @else
                                                                            <h6>{{ number_format($product->price, 0, ',', '.') }}đ<span
                                                                                    class="ms-2"></span></h6>
                                                                        @endif
                                                                    @else
                                                                        <h6>Đang cập nhật...<span class="ms-2"></span>
                                                                        </h6>
                                                                    @endif
                                                                </div>
                                                                <div class="cart-info">
                                                                    <button onclick="openCart()" class="tooltip-top"
                                                                        data-tippy-content="Add to cart">
                                                                        <i data-feather="shopping-cart"></i>
                                                                    </button>
                                                                    <a href="javascript:void(0)"
                                                                        class="add-to-wish tooltip-top"
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (($key + 1) % 3 == 0 || $loop->last)
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        <div id="tab-8" class="tab-content ">
                            <div class="media-slide-5 product-m no-arrow">
                                @foreach ($sellingProducts as $key => $product)
                                    @if ($key % 3 == 0)
                                        <div>
                                    @endif

                                    <div class="media-banner media-banner-1 border-0">
                                        <div class="media-banner-box">
                                            <div class="media">
                                                <a href="product-page(left-sidebar).html">
                                                    <img src="{{ asset($product->image) }}" class="img-fluid"
                                                        alt="banner" style="height: 84px; width: 84px;">
                                                </a>
                                                <div class="media-body">
                                                    <div class="media-contant">
                                                        <div>
                                                            <div class="product-detail">
                                                                <ul class="rating">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        @if ($i <= floor($product->ratingStar))
                                                                            <div class="fa fa-star text-warning"></div>
                                                                        @else
                                                                            <div class="fa fa-star-o text-secondary">
                                                                            </div>
                                                                        @endif
                                                                    @endfor
                                                                </ul>
                                                                <a href="product-page(left-sidebar).html">
                                                                    <p>{{ $product->name }}</p>
                                                                </a>
                                                                @if ($product->price)
                                                                    @if ($product->discount_price)
                                                                        <h6>{{ number_format($product->discount_price, 0, ',', '.') }}đ<span
                                                                                class="ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                                                        </h6>
                                                                    @else
                                                                        <h6>{{ number_format($product->price, 0, ',', '.') }}đ<span
                                                                                class="ms-2"></span></h6>
                                                                    @endif
                                                                @else
                                                                    <h6>Đang cập nhật...<span class="ms-2"></span>
                                                                    </h6>
                                                                @endif
                                                            </div>
                                                            <div class="cart-info">
                                                                <button onclick="openCart()" class="tooltip-top"
                                                                    data-tippy-content="Add to cart">
                                                                    <i data-feather="shopping-cart"></i>
                                                                </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @if (($key + 1) % 3 == 0 || $loop->last)
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-9" class="tab-content ">
                        <div class="media-slide-5 product-m no-arrow">
                            @foreach ($bigDiscountProducts as $key => $product)
                                @if ($key % 3 == 0)
                                    <div>
                                @endif

                                <div class="media-banner media-banner-1 border-0">
                                    <div class="media-banner-box">
                                        <div class="media">
                                            <a href="product-page(left-sidebar).html">
                                                <img src="{{ asset($product->image) }}" class="img-fluid" alt="banner"
                                                    style="height: 84px; width: 84px;">
                                            </a>
                                            <div class="media-body">
                                                <div class="media-contant">
                                                    <div>
                                                        <div class="product-detail">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= floor($product->ratingStar))
                                                                        <div class="fa fa-star text-warning"></div>
                                                                    @else
                                                                        <div class="fa fa-star-o text-secondary">
                                                                        </div>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                            <a href="product-page(left-sidebar).html">
                                                                <p>{{ $product->name }}</p>
                                                            </a>
                                                            @if ($product->price)
                                                                @if ($product->discount_price)
                                                                    <h6>{{ number_format($product->discount_price, 0, ',', '.') }}đ<span
                                                                            class="ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                                                    </h6>
                                                                @else
                                                                    <h6>{{ number_format($product->price, 0, ',', '.') }}đ<span
                                                                            class="ms-2"></span></h6>
                                                                @endif
                                                            @else
                                                                <h6>Đang cập nhật...<span class="ms-2"></span>
                                                                </h6>
                                                            @endif
                                                        </div>
                                                        <div class="cart-info">
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (($key + 1) % 3 == 0 || $loop->last)
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div id="tab-10" class="tab-content ">
                    <div class="media-slide-5 product-m no-arrow">
                        @foreach ($bestViewProducts as $key => $product)
                            @if ($key % 3 == 0)
                                <div>
                            @endif

                            <div class="media-banner media-banner-1 border-0">
                                <div class="media-banner-box">
                                    <div class="media">
                                        <a href="product-page(left-sidebar).html">
                                            <img src="{{ asset($product->image) }}" class="img-fluid" alt="banner"
                                                style="height: 84px; width: 84px;">
                                        </a>
                                        <div class="media-body">
                                            <div class="media-contant">
                                                <div>
                                                    <div class="product-detail">
                                                        <ul class="rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= floor($product->ratingStar))
                                                                    <div class="fa fa-star text-warning"></div>
                                                                @else
                                                                    <div class="fa fa-star-o text-secondary">
                                                                    </div>
                                                                @endif
                                                            @endfor
                                                        </ul>
                                                        <a href="product-page(left-sidebar).html">
                                                            <p>{{ $product->name }}</p>
                                                        </a>
                                                        @if ($product->price)
                                                            @if ($product->discount_price)
                                                                <h6>{{ number_format($product->discount_price, 0, ',', '.') }}đ<span
                                                                        class="ms-2">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                                                </h6>
                                                            @else
                                                                <h6>{{ number_format($product->price, 0, ',', '.') }}đ<span
                                                                        class="ms-2"></span></h6>
                                                            @endif
                                                        @else
                                                            <h6>Đang cập nhật...<span class="ms-2"></span>
                                                            </h6>
                                                        @endif
                                                    </div>
                                                    <div class="cart-info">
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (($key + 1) % 3 == 0 || $loop->last)
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </section>
    <!-- media banner tab end -->

    <!--collection banner start-->
    <section class="collection-banner section-py-space">
        <div class="container-fluid">
            <div class="row collection2">
                @foreach ($bannersTypeProductHome as $banner)
                    <div class="col-md-4">
                        <div class="collection-banner-main banner-1  p-right">
                            <div class="collection-img" style="height: 204px; border-radius: 12px;">
                                <img src="{{ asset($banner->image) }}" class="img-fluid bg-img  " alt="banner">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--collection banner end-->
@endsection
