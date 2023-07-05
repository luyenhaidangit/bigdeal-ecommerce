@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Tìm kiếm</h2>
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.search.product') }}">Tìm kiếm sản phẩm</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->
    @if ($keyword)
        <div class="title6 ">
            <h4>Từ khoá: {{ $keyword }}</h4>
        </div>
    @else
        <div class="title6 ">
            <h4>Toàn bộ sản phẩm</h4>
        </div>
    @endif


    <!--element product box start -->
    <section class=" ratio_asos product b-g-light ">
        <div class="custom-container">
            <div class="row">
                <div class="col pr-0">
                    <div class="product-slide-6 product-m no-arrow">
                        @foreach ($products as $product)
                            <div>
                                <div class="product-box">
                                    <div class="product-imgbox">
                                        <div class="product-front">
                                            <a href="product-page(left-sidebar).html">
                                                @if ($product->image)
                                                    <img src="{{ asset($product->image) }}" class="img-fluid" alt="product"
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
                                                    <img src="{{ asset($product->image) }}" class="img-fluid" alt="product"
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
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#quick-view"
                                                class="tooltip-top" data-tippy-content="Quick View">
                                                <i data-feather="eye"></i>
                                            </a>
                                            <a href="compare.html" class="tooltip-top" data-tippy-content="Compare">
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
            </div>
        </div>
    </section>
    <!--element product box end-->
@endsection
