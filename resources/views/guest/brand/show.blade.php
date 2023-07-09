@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Nhãn hiệu</h2>
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a
                                        href="{{ route('guest.product_category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-pt-space ratio_asos b-g-light">
        <div class="collection-wrapper">
            <div class="custom-container">
                <div class="row">
                    <div class="col-sm-3 collection-filter category-page-side">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block creative-card creative-inner category-side">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back">
                                <span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i>Quay lại</span>
                            </div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title mt-0">Loại sản phẩm</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach ($brands as $brand)
                                            <div
                                                class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                <input type="checkbox"
                                                    class="custom-control-input form-check-input brand-checkbox"
                                                    id="brand_{{ $brand->id }}" data-brand-id="{{ $brand->slug }}"
                                                    onclick="handleBrandFilter()"
                                                    {{ in_array($brand->slug, $selectedBrands) ? 'checked' : '' }}>
                                                <label class="custom-control-label form-check-label"
                                                    for="brand_{{ $brand->id }}">{{ $brand->name }}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <!-- size filter start here -->
                            @if (isset($options['colors']) && count($options['colors']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Màu sắc</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['colors']->take(5) as $color)
                                                    <div
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input color-checkbox"
                                                            id="{{ Str::slug($color) }}" onclick="handleColorFilter()"
                                                            {{ in_array(urldecode(Str::slug($color)), $selectedColors) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($color) }}">{{ $color }}</label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['sizes']) && count($options['sizes']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Kích thước</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['sizes']->take(5) as $size)
                                                    <div
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input size-checkbox"
                                                            id="{{ Str::slug($size) }}" onclick="handleSizeFilter()"
                                                            {{ in_array(urldecode(Str::slug($size)), $selectedSizes) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($size) }}">
                                                            {{ $size }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['rams']) && count($options['rams']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">RAM</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['rams']->take(5) as $ram)
                                                    <div
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input ram-checkbox"
                                                            id="{{ Str::slug($ram) }}" onclick="handleRamFilter()"
                                                            {{ in_array(urldecode(Str::slug($ram)), $selectedRams) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($ram) }}">
                                                            {{ $ram }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['roms']) && count($options['roms']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">ROM</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['roms']->take(5) as $rom)
                                                    <div
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input rom-checkbox"
                                                            id="{{ Str::slug($rom) }}" onclick="handleRomFilter()"
                                                            {{ in_array(urldecode(Str::slug($rom)), $selectedRoms) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($rom)}}">
                                                            {{ $rom }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['ram_roms']) && count($options['ram_roms']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">RAM & ROM</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['ram_roms']->take(5) as $ram_rom)
                                                    <div
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input ram-rom-checkbox"
                                                            id="{{ Str::slug($ram_rom) }}" onclick="handleRamRomFilter()"
                                                            {{ in_array(urldecode(Str::slug($ram_rom)), $selectedRamRoms) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($ram_rom) }}">
                                                            {{ $ram_rom }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['cpus']) && count($options['cpus']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">CPU</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['cpus']->take(5) as $cpu)
                                                    <div
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input cpu-checkbox"
                                                            id="{{ Str::slug($spu) }}" onclick="handleCpuFilter()"
                                                            {{ in_array(urldecode(Str::slug($cpu)), $selectedCpus) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($cpu) }}">
                                                            {{ $cpu }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['sweep_frequencys']) && count($options['sweep_frequencys']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Sweep Frequency</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['sweep_frequencys']->take(5) as $frequency)
                                                    <div>
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input frequency-checkbox"
                                                            id="{{ Str::slug($frequency) }}" onclick="handleFrequencyFilter()"
                                                            {{ in_array(urldecode(Str::slug($frequency)), $selectedSweepFrequencys) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($frequency) }}">
                                                            {{ $frequency }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['hard_drives']) && count($options['hard_drives']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Hard Drive</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['hard_drives']->take(5) as $hardDrive)
                                                    <div>
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input hard-drive-checkbox"
                                                            id="{{ Str::slug($hardDrive) }}" onclick="handleHardDriveFilter()"
                                                            {{ in_array(urldecode(Str::slug($hardDrive)), $selectedHardDrives) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($hardDrive) }}">
                                                            {{ $hardDrive }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (isset($options['resolutions']) && count($options['resolutions']->filter()) > 0)
                                <div class="collection-collapse-block open">
                                    <h3 class="collapse-block-title">Resolution</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="size-selector">
                                            <div class="collection-brand-filter">
                                                @foreach ($options['resolutions']->take(5) as $resolution)
                                                    <div
                                                        class="custom-control custom-checkbox form-check collection-filter-checkbox">
                                                        <input type="checkbox"
                                                            class="custom-control-input form-check-input resolution-checkbox"
                                                            id="{{ Str::slug($resolution) }}" onclick="handleResolutionFilter()"
                                                            {{ in_array(urldecode(Str::slug($resolution)), $selectedResolutions) ? 'checked' : '' }}>
                                                        <label class="custom-control-label form-check-label"
                                                            for="{{ Str::slug($resolution) }}">
                                                            {{ $resolution }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">Giá</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="filter-slide">
                                        <input id="price-slider" class="js-range-slider" type="text" name="my_range"
                                            value="" data-type="double" />
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card creative-card creative-inner">
                            <h5 class="title-border">Sản phẩm mới</h5>
                            <div class="slide-1">
                                @foreach ($newProducts as $key => $product)
                                    @if ($key % 3 == 0)
                                        <div>
                                    @endif

                                    <div class="media-banner plrb-0 b-g-white1 border-0">
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
                    <!-- side-bar single product slider end -->
                    <!-- side-bar banner start here -->
                    <div class="collection-sidebar-banner">
                        <a href="javascript:void(0)"><img src="{{ $category->bottom_banner }}" class="img-fluid "
                                alt=""></a>
                    </div>
                    <!-- side-bar banner end here -->
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <a href="product-page(left-sidebar).html"><img
                                            src="{{ asset($category->top_banner) }}" class="img-fluid "
                                            alt=""></a>
                                    <div class="top-banner-content small-section">
                                        {!! $category->description !!}
                                    </div>
                                </div>
                                <div class="collection-product-wrapper">
                                    <div class="product-top-filter">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="filter-main-btn"><span class="filter-btn  "><i
                                                            class="fa fa-filter" aria-hidden="true"></i> Filter</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="product-filter-content">
                                                    <div class="search-count">
                                                        <h5>Hiển thị kết quả
                                                            {{ $products->firstItem() }}-{{ $products->lastItem() }}
                                                            trong tổng số {{ $products->total() }} kết quả</h5>
                                                    </div>
                                                    <div class="collection-view">
                                                        <ul>
                                                            <li><i class="fa fa-th grid-layout-view"></i></li>
                                                            <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="collection-grid-view">
                                                        <ul>
                                                            <li><img src="{{ asset('guest-resource/images/category/icon/2.png') }}"
                                                                    alt="" class="product-2-layout-view"></li>
                                                            <li><img src="{{ asset('guest-resource/images/category/icon/3.png') }}"
                                                                    alt="" class="product-3-layout-view"></li>
                                                            <li><img src="{{ asset('guest-resource/images/category/icon/4.png') }}"
                                                                    alt="" class="product-4-layout-view"></li>
                                                            <li><img src="{{ asset('guest-resource/images/category/icon/6.png') }}"
                                                                    alt="" class="product-6-layout-view"></li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-page-per-view">
                                                        <select id="perPageSelect" onchange="handlePerPageChange()">
                                                            <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>
                                                                10 sản phẩm mỗi trang</option>
                                                            <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>
                                                                20 sản phẩm mỗi trang</option>
                                                            <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>
                                                                50 sản phẩm mỗi trang</option>
                                                        </select>
                                                    </div>
                                                    <div class="product-page-filter">
                                                        <select id="sortSelect" onchange="handleSortChange()">
                                                            <option value="default"
                                                                {{ $sort == 'default' ? 'selected' : '' }}>Sắp xếp sản
                                                                phẩm</option>
                                                            <option value="low_to_high"
                                                                {{ $sort == 'low_to_high' ? 'selected' : '' }}>Giá thấp
                                                                tới cao</option>
                                                            <option value="high_to_low"
                                                                {{ $sort == 'high_to_low' ? 'selected' : '' }}>Giá cao
                                                                tới thấp</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-wrapper-grid product">
                                        <div class="row">
                                            @foreach ($products as $product)
                                                <div class="col-xl-3 col-md-4 col-6  col-grid-box">
                                                    <div class="product-box">
                                                        <div class="product-imgbox">
                                                            <div class="product-front">
                                                                <a href="product-page(left-sidebar).html"> <img
                                                                        src="{{ asset($product->image) }}"
                                                                        class="img-fluid  " alt="product"> </a>
                                                            </div>
                                                            <div class="product-back">
                                                                <a href="product-page(left-sidebar).html"> <img
                                                                        src="{{ asset($product->image) }}"
                                                                        class="img-fluid  " alt="product"> </a>
                                                            </div>
                                                        </div>
                                                        <div class="product-detail detail-center detail-inverse">
                                                            <div class="detail-title">
                                                                <div class="detail-left">
                                                                    <div class="rating-star">
                                                                        @for ($i = 1; $i <= 5; $i++)
                                                                            @if ($i <= floor($product->ratingStar))
                                                                                <div class="fa fa-star text-warning">
                                                                                </div>
                                                                            @else
                                                                                <div class="fa fa-star-o text-secondary">
                                                                                </div>
                                                                            @endif
                                                                        @endfor
                                                                    </div>
                                                                    <p>{{ $product->short_description }}</p>
                                                                    <a href="product-page(left-sidebar).html">
                                                                        <h6 class="price-title">
                                                                            {{ $product->name }}
                                                                        </h6>
                                                                    </a>
                                                                </div>
                                                                <div class="detail-right">
                                                                    @if ($product->price)
                                                                        @if ($product->discount_price)
                                                                            <div class="check-price">
                                                                                {{ number_format($product->price, 0, ',', '.') }}đ
                                                                            </div>
                                                                            <div class="price">
                                                                                <div class="price">
                                                                                    {{ number_format($product->discount_price, 0, ',', '.') }}đ
                                                                                </div>
                                                                            </div>
                                                                        @else
                                                                            <div class="price">
                                                                                <div class="price">
                                                                                    {{ number_format($product->price, 0, ',', '.') }}đ
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @else
                                                                        <div class="price">
                                                                            <div class="price">Đang cập nhật...</div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="icon-detail">
                                                                <button class="tooltip-top add-cartnoty"
                                                                    data-tippy-content="Add to cart"> <i
                                                                        data-feather="shopping-cart"></i> </button>
                                                                <a href="javascript:void(0)"
                                                                    class="add-to-wish tooltip-top"
                                                                    data-tippy-content="Add to Wishlist"> <i
                                                                        data-feather="heart"></i> </a>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#quick-view" class="tooltip-top"
                                                                    data-tippy-content="Quick View"> <i
                                                                        data-feather="eye"></i> </a>
                                                                <a href="compare.html" class="tooltip-top"
                                                                    data-tippy-content="Compare"> <i
                                                                        data-feather="refresh-cw"></i> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="product-pagination">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <nav aria-label="Page navigation">
                                                        <ul class="pagination">
                                                            @if ($products->onFirstPage())
                                                                <li class="page-item disabled">
                                                                    <a class="page-link" href="javascript:void(0)"
                                                                        onclick="handlePageChange({{ $products->currentPage() - 1 }})"
                                                                        aria-label="Previous">
                                                                        <span aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="page-item">
                                                                    <a class="page-link" href="javascript:void(0)"
                                                                        onclick="handlePageChange({{ $products->currentPage() - 1 }})"
                                                                        aria-label="Previous">
                                                                        <span aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span>
                                                                        <span class="sr-only">Previous</span>
                                                                    </a>
                                                                </li>
                                                            @endif

                                                            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                                                @if ($page == $products->currentPage())
                                                                    <li class="page-item active">
                                                                        <a class="page-link" href="javascript:void(0)"
                                                                            onclick="handlePageChange({{ $page }})">{{ $page }}</a>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="javascript:void(0)"
                                                                            onclick="handlePageChange({{ $page }})">{{ $page }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach

                                                            @if ($products->hasMorePages())
                                                                <li class="page-item">
                                                                    <a class="page-link" href="javascript:void(0)"
                                                                        onclick="handlePageChange({{ $products->currentPage() + 1 }})"
                                                                        aria-label="Next">
                                                                        <span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="page-item disabled">
                                                                    <a class="page-link" href="javascript:void(0)"
                                                                        onclick="handlePageChange({{ $products->currentPage() + 1 }})"
                                                                        aria-label="Next">
                                                                        <span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span>
                                                                        <span class="sr-only">Next</span>
                                                                    </a>
                                                                </li>
                                                            @endif
                                                        </ul>

                                                    </nav>
                                                </div>
                                                <div class="col-xl-6 col-md-6 col-sm-12">
                                                    <div class="product-search-count-bottom">
                                                        <h5>Hiển thị kết quả
                                                            {{ $products->firstItem() }}-{{ $products->lastItem() }}
                                                            trong tổng số {{ $products->total() }} kết quả</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- section End -->

    <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="row">
                        <div class="col-lg-6 col-xs-12">
                            <div class="quick-view-img">
                                <img src="../assets/images/layout-1/product/3.jpg" alt=""
                                    class="img-fluid bg-img">
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <div class="pro-group">
                                    <h2>
                                        reader will be distracted
                                    </h2>
                                    <ul class="pro-price">
                                        <li>$70</li>
                                        <li><span>mrp $140</span></li>
                                        <li>50% off</li>
                                    </ul>
                                    <div class="revieu-box">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                        <a href="review.html"><span>(6 reviews)</span></a>
                                    </div>
                                    <ul class="best-seller">
                                        <li>
                                            <svg viewBox="0 0 128 128" xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="m102.427 43.155-2.337-2.336a3.808 3.808 0 0 1 -.826-4.149l1.263-3.053a3.808 3.808 0 0 0 -2.063-4.975l-3.036-1.256a3.807 3.807 0 0 1 -2.352-3.519v-3.286a3.808 3.808 0 0 0 -3.809-3.808h-3.3a3.81 3.81 0 0 1 -3.518-2.35l-1.269-3.052a3.808 3.808 0 0 0 -4.98-2.059l-3.032 1.258a3.807 3.807 0 0 1 -4.152-.825l-2.323-2.323a3.809 3.809 0 0 0 -5.386 0l-2.336 2.336a3.808 3.808 0 0 1 -4.149.826l-3.053-1.263a3.809 3.809 0 0 0 -4.975 2.063l-1.257 3.036a3.808 3.808 0 0 1 -3.519 2.353h-3.285a3.808 3.808 0 0 0 -3.809 3.808v3.3a3.808 3.808 0 0 1 -2.349 3.519l-3.053 1.266a3.809 3.809 0 0 0 -2.059 4.976l1.259 3.035a3.81 3.81 0 0 1 -.825 4.152l-2.324 2.323a3.809 3.809 0 0 0 0 5.386l2.337 2.337a3.807 3.807 0 0 1 .826 4.149l-1.263 3.056a3.808 3.808 0 0 0 2.063 4.975l3.036 1.256a3.807 3.807 0 0 1 2.352 3.519v3.286a3.808 3.808 0 0 0 3.809 3.808h3.3a3.809 3.809 0 0 1 3.518 2.35l1.265 3.052a3.808 3.808 0 0 0 4.984 2.059l3.035-1.259a3.811 3.811 0 0 1 4.152.825l2.323 2.324a3.809 3.809 0 0 0 5.386 0l2.336-2.336a3.81 3.81 0 0 1 4.149-.827l3.053 1.264a3.809 3.809 0 0 0 4.975-2.063l1.257-3.037a3.809 3.809 0 0 1 3.519-2.352h3.285a3.808 3.808 0 0 0 3.809-3.808v-3.3a3.808 3.808 0 0 1 2.349-3.518l3.053-1.266a3.809 3.809 0 0 0 2.059-4.976l-1.259-3.036a3.809 3.809 0 0 1 .825-4.151l2.324-2.324a3.809 3.809 0 0 0 -.003-5.39z"
                                                        fill="#f9cc4e" />
                                                    <circle cx="64" cy="45.848" fill="#4ec4b5"
                                                        r="29.146" />
                                                    <path
                                                        d="m59.795 41.643 4.205-12.614 4.205 12.614h12.615l-8.41 8.41 4.205 12.615-12.615-8.41-12.615 8.41 4.205-12.615-8.41-8.41z"
                                                        fill="#f9cc4e" />
                                                    <path
                                                        d="m87.579 74.924h-1.6a3.809 3.809 0 0 0 -3.519 2.352l-1.257 3.037a3.809 3.809 0 0 1 -4.975 2.063l-3.053-1.264a3.81 3.81 0 0 0 -4.149.827l-2.336 2.336a3.809 3.809 0 0 1 -5.386 0l-2.323-2.324a3.811 3.811 0 0 0 -4.152-.825l-3.029 1.259a3.808 3.808 0 0 1 -4.977-2.059l-1.265-3.052a3.809 3.809 0 0 0 -3.518-2.35h-1.618l-17.417 35.386 17.255-5.872 5.872 17.256 17.868-36.304 17.868 36.3 5.872-17.256 17.26 5.876z"
                                                        fill="#f95050" />
                                                </g>
                                            </svg>
                                            3 best seller
                                        </li>
                                        <li>
                                            <svg enable-background="new 0 0 497 497" viewBox="0 0 497 497"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g>
                                                    <path
                                                        d="m329.63 405.42-.38.43c-10.048 19.522-48.375 35.567-80.775 35.607-24.881 0-53.654-9.372-71.486-20.681-5.583-3.54-2.393-10.869-6.766-15.297l19.149-5.13c3.76-1.22 6.46-4.54 6.87-8.47l8.574-59.02 82.641-2.72 12.241 28.06.837 8.668-1.844 9.951 3.456 6.744.673 6.967c.41 3.93 3.11 7.25 6.87 8.47z"
                                                        fill="#f2d1a5" />
                                                    <path
                                                        d="m420.39 497h-343.78c-6.21 0-7.159-6.156-6.089-12.266l2.53-14.57c3.82-21.96 16.463-37.323 37.683-44.153l27.702-8.561 28.754-8.035c18.34 18.57 48.615 27.957 81.285 27.957 32.4-.04 61.709-8.478 80.259-26.809l.38-.43 31.486 5.256 26.39 8.5c21.22 6.83 36.9 24.87 40.72 46.83l2.53 14.57c1.07 6.111-3.64 11.711-9.85 11.711z"
                                                        fill="#7e8b96" />
                                                    <g>
                                                        <path
                                                            d="m384.055 215c-2.94 43.71-18.85 104.74-24.92 130.96-.68 2.94-2.33 5.45-4.56 7.22-2.23 1.78-5.05 2.82-8.06 2.82-6.88 0-12.55-5.37-12.94-12.23 0 0-5.58-84.28-7.63-128.77z"
                                                            fill="#dc4955" />
                                                    </g>
                                                    <path
                                                        d="m141 271c-27.062 0-49-21.938-49-49 0-11.046 8.954-20 20-20h8.989l240.468-6.287 8.293 6.287h15.25c11.046 0 20 8.954 20 20 0 27.062-21.938 49-49 49z"
                                                        fill="#f2bb88" />
                                                    <path
                                                        d="m360.6 415.39-.06.09c-49.3 66.23-174.56 66.38-223.76.56l-.43-.63 18.171-1.91 12.669-8.02c18.34 18.57 48.41 29.8 81.08 29.8h.15c32.4-.04 62.28-11.1 80.83-29.43l.38-.43z"
                                                        fill="#a9a4d3" />
                                                    <path
                                                        d="m147.8 418.394v10.136l-32.89 10.59c-15.6 5.02-27.05 18.18-29.86 34.34l-3.59 23.54h-4.85c-6.21 0-10.92-5.6-9.85-11.71l2.53-14.57c3.82-21.96 19.5-40 40.72-46.83l26.34-8.48z"
                                                        fill="#64727a" />
                                                    <path
                                                        d="m182.19 417.45-34.39 11.08c-3.99-3.86-7.68-8.02-11.02-12.49l-.43-.63 30.84-9.93c1.828 1.848 10.344.351 12.353 2.02 2.928 2.433-.561 7.928 2.647 9.95z"
                                                        fill="#938dc8" />
                                                    <path
                                                        d="m299.7 358.2-2.71-28.06-79.861 2.255.001-.005-16.48.47-2.98 26.56-.763 6.8 2.039 12.83-3.989 4.55-.778 6.93c-.41 3.93-3.11 7.25-6.87 8.47l-20.12 6.48c4.37 4.43 9.41 8.44 15 11.97l10.02-3.22c9.79-3.17 16.79-11.79 17.88-21.97l2.058-17.506c.392-3.33 3.888-5.367 6.958-4.02 11.414 5.008 21.565 7.765 28.393 7.765 11.322.001 31.852-7.509 52.202-20.299z"
                                                        fill="#f2bb88" />
                                                    <path
                                                        d="m134.539 164.427s-.849 18.411-.849 33.002c0 38.745 9.42 76.067 25.701 105.572 20.332 36.847 72.609 61.499 88.109 61.499s68.394-24.653 89.275-61.499c14.137-24.946 23.338-55.482 25.843-87.741.458-5.894-9.799-20.073-9.799-26.058l10.491-24.775c0-38.422-36.205-111.427-114.81-111.427s-113.961 73.005-113.961 111.427z"
                                                        fill="#f2d1a5" />
                                                    <g>
                                                        <path
                                                            d="m294 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                            fill="#64727a" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="m203 227.5c-4.142 0-7.5-3.358-7.5-7.5v-15c0-4.142 3.358-7.5 7.5-7.5s7.5 3.358 7.5 7.5v15c0 4.142-3.358 7.5-7.5 7.5z"
                                                            fill="#64727a" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="m249 260.847c-5.976 0-11.951-1.388-17.398-4.163-3.691-1.88-5.158-6.397-3.278-10.087 1.88-3.691 6.398-5.158 10.087-3.278 6.631 3.379 14.547 3.379 21.178 0 3.689-1.881 8.207-.413 10.087 3.278 1.88 3.69.413 8.207-3.278 10.087-5.447 2.775-11.422 4.163-17.398 4.163z"
                                                            fill="#f2bb88" />
                                                    </g>
                                                    <path
                                                        d="m288.989 40.759c0 22.511-9.303 40.759-40.489 40.759s-48.702-42.103-48.702-42.103 17.516-39.415 48.702-39.415c25.911 0 47.746 12.597 54.392 29.769 1.353 3.497-13.903 7.182-13.903 10.99z"
                                                        fill="#df646e" />
                                                    <path
                                                        d="m254.305 81.307c1.031-.099 2.069-.167 3.093-.295 26.96-3.081 47.572-19.928 47.572-40.252 0-3.81-.72-7.49-2.08-10.99-15.42-6.31-33.46-10.34-54.39-10.34-4.139 0-8.163.159-12.073.462-5.127.397-7.393-6.322-3.107-9.163 7.36-4.878 16.519-8.364 26.68-9.879-3.71-.56-7.56-.85-11.5-.85-25.933 0-47.766 12.621-54.393 29.813-.006.002-.011.004-.017.007-1.337 3.487-2.055 7.201-2.06 10.94 0 22.51 25.28 40.76 56.47 40.76 1.946.008 3.872-.09 5.805-.213z"
                                                        fill="#dc4955" />
                                                    <path
                                                        d="m363.31 164.43v33c0 5.99-.23 11.94-.7 17.83-4.32-.91-8.4-2.66-12.05-5.19-22.785-15.834-31.375-40.163-37.64-60.936-.382-1.268-1.547-2.134-2.871-2.134h-30.949c-4.96 0-9.65-2.15-12.89-5.91l-10.947-12.711c-1.197-1.39-3.349-1.39-4.546 0l-10.947 12.711c-3.24 3.76-7.93 5.91-12.89 5.91h-90.33c8.47-39.6 44.09-94 111.95-94 78.61 0 114.81 73 114.81 111.43z"
                                                        fill="#f2bb88" />
                                                    <path
                                                        d="m381 164.19v37.81h-11.25c-4 0-7.93-1.16-11.22-3.44-19.74-13.72-26.93-35.65-33.69-58.43-1.26-4.24-5.16-7.13-9.58-7.13h-36.165c-.873 0-1.703-.38-2.273-1.042l-21.559-25.029c-1.197-1.389-3.349-1.389-4.546 0l-21.559 25.029c-.57.662-1.4 1.042-2.273 1.042h-38.015c-5.3 0-9.68 4.14-9.98 9.44 0 0-2.331 25.591-4.032 66.31-1.765 42.256-7.908 135.02-7.908 135.02-.16 2.822-1.215 5.393-2.879 7.441-2.381 2.929-5.67.375-9.72.375-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-.792-5.474-1.472-8.414-6.7-28.94-23.83-94.686-23.83-138.351 0-13.73-.14-34.689 0-37.649.14-26.43 12.74-54.048 32-78.128 12.937-16.178 28.667-38.955 58.628-47.692 10.986-3.204 23.248-5.101 36.883-5.101 50.8 0 82.75 26.31 100.6 48.39 19.68 24.319 31.9 55.879 31.9 82.369z"
                                                        fill="#df646e" />
                                                    <path
                                                        d="m211.62 38.54c-19.38 9.9-33.55 23.84-43.37 36.44-19.26 24.69-31.27 56.78-31.41 83.88-.14 3.03-.84 25.18-.84 39.25 0 44.77 18.69 117.93 25.39 147.6.47 2.08 1.4 3.94 2.68 5.5-2.38 2.93-6.01 4.79-10.06 4.79-3.01 0-5.83-1.04-8.06-2.82-2.23-1.77-3.88-4.28-4.56-7.22-6.7-28.94-25.39-100.29-25.39-143.96 0-13.73.7-35.33.84-38.29.14-26.43 12.15-57.73 31.41-81.81 12.94-16.18 33.4-34.63 63.37-43.36z"
                                                        fill="#dc4955" />
                                                    <g>
                                                        <path
                                                            d="m316.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.172.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                            fill="#df646e" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="m225.539 193.816c-1.277 0-2.571-.327-3.755-1.013-11.762-6.82-25.806-6.82-37.567 0-3.583 2.078-8.171.858-10.25-2.726-2.078-3.583-.857-8.172 2.726-10.25 16.474-9.552 36.143-9.552 52.616 0 3.583 2.078 4.804 6.667 2.726 10.25-1.392 2.399-3.909 3.739-6.496 3.739z"
                                                            fill="#df646e" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="m302.143 383.517c-16.23 10.87-34.973 16.353-53.643 16.353s-37.3-5.41-53.54-16.27l3.476-6.313-1.526-11.067 4.15 3.37c28.46 20.41 66.63 20.37 95.05-.12.2-.14.39-.27.6-.39l3.826-2.211z"
                                                            fill="#a9a4d3" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="m211.98 376.2-1.85 15.68c-5.23-2.27-10.31-5.03-15.17-8.28l1.95-17.38 4.15 3.37c3.5 2.51 7.15 4.72 10.92 6.61z"
                                                            fill="#938dc8" />
                                                    </g>
                                                    <g>
                                                        <path
                                                            d="m269.5 306.5h-42c-4.142 0-7.5-3.358-7.5-7.5s3.358-7.5 7.5-7.5h42c4.142 0 7.5 3.358 7.5 7.5s-3.358 7.5-7.5 7.5z"
                                                            fill="#df646e" />
                                                    </g>
                                                </g>
                                            </svg>
                                            44 active view this
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-group">
                                    <h6 class="product-title">product infomation</h6>
                                    <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                        doloremque laudantium</p>
                                </div>
                                <div class="pro-group pb-0">
                                    <h6 class="product-title size-text">select size<span>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#sizemodal">size
                                                chart</a></span></h6>
                                    <div class="modal fade" id="sizemodal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sheer Straight Kurta
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"><img src="../assets/images/size-chart.jpg"
                                                        alt="" class="img-fluid "></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="size-box">
                                        <ul>
                                            <li><a href="javascript:void(0)">s</a></li>
                                            <li><a href="javascript:void(0)">m</a></li>
                                            <li><a href="javascript:void(0)">l</a></li>
                                            <li><a href="javascript:void(0)">xl</a></li>
                                            <li><a href="javascript:void(0)">2xl</a></li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">color</h6>
                                    <div class="color-selector inline">
                                        <ul>
                                            <li>
                                                <div class="color-1 active"></div>
                                            </li>
                                            <li>
                                                <div class="color-2"></div>
                                            </li>
                                            <li>
                                                <div class="color-3"></div>
                                            </li>
                                            <li>
                                                <div class="color-4"></div>
                                            </li>
                                            <li>
                                                <div class="color-5"></div>
                                            </li>
                                            <li>
                                                <div class="color-6"></div>
                                            </li>
                                            <li>
                                                <div class="color-7"></div>
                                            </li>
                                        </ul>
                                    </div>
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1">
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="product-buttons">
                                        <a href="javascript:void(0)" onclick="openCart()"
                                            class="btn cart-btn btn-normal tooltip-top" data-tippy-content="Add to cart">
                                            <i class="fa fa-shopping-cart"></i>
                                            add to cart
                                        </a>
                                        <a href="product-page(left-sidebar).html" class="btn btn-normal tooltip-top"
                                            data-tippy-content="view detail">
                                            view detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->

    <!-- edit product modal start-->
    <div class="modal fade bd-example-modal-lg theme-modal pro-edit-modal" id="edit-product" tabindex="-1"
        role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="pro-group">
                        <div class="product-img">
                            <div class="media">
                                <div class="img-wraper">
                                    <a href="product-page(left-sidebar).html">
                                        <img src="../assets/images/layout-2/product/1.jpg" alt="">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <a href="product-page(left-sidebar).html">
                                        <h3>redmi not 3</h3>
                                    </a>
                                    <h6>$80<span>$120</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pro-group">
                        <h6 class="product-title">Select Size</h6>
                        <div class="size-box">
                            <ul>
                                <li><a href="javascript:void(0)">s</a></li>
                                <li><a href="javascript:void(0)">m</a></li>
                                <li><a href="javascript:void(0)">l</a></li>
                                <li><a href="javascript:void(0)">xl</a></li>
                                <li><a href="javascript:void(0)">2xl</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="pro-group">
                        <h6 class="product-title">Select color</h6>
                        <div class="color-selector inline">
                            <ul>
                                <li>
                                    <div class="color-1 active"></div>
                                </li>
                                <li>
                                    <div class="color-2"></div>
                                </li>
                                <li>
                                    <div class="color-3"></div>
                                </li>
                                <li>
                                    <div class="color-4"></div>
                                </li>
                                <li>
                                    <div class="color-5"></div>
                                </li>
                                <li>
                                    <div class="color-6"></div>
                                </li>
                                <li>
                                    <div class="color-7"></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pro-group">
                        <h6 class="product-title">Quantity</h6>
                        <div class="qty-box">
                            <div class="input-group">
                                <button class="qty-minus"></button>
                                <input class="qty-adj form-control" type="number" value="1" />
                                <button class="qty-plus"></button>
                            </div>
                        </div>
                    </div>
                    <div class="pro-group mb-0">
                        <div class="modal-btn">
                            <a href="cart.html" class="btn btn-solid btn-sm">
                                add to cart
                            </a>
                            <a href="product-page(left-sidebar).html" class="btn btn-solid btn-sm">
                                more detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- edit product modal end-->

    <!-- Add to cart bar -->
    <div id="cart_side" class="add_to_cart top">
        <a href="javascript:void(0)" class="overlay" onclick="closeCart()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my cart</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeCart()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>redmi not 3</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>Double Door Refrigerator</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/3.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>woman hande bag</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="cart_total">
                    <li>
                        subtotal : <span>$1050.00</span>
                    </li>
                    <li>
                        shpping <span>free</span>
                    </li>
                    <li>
                        taxes <span>$0.00</span>
                    </li>
                    <li>
                        <div class="total">
                            total<span>$1050.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="cart.html" class="btn btn-solid btn-sm">view cart</a>
                            <a href="checkout.html" class="btn btn-solid btn-sm ">checkout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Add to cart bar end-->

    <!-- wishlistbar bar -->
    <div id="wishlist_side" class="add_to_cart right">
        <a href="javascript:void(0)" class="overlay" onclick="closeWishlist()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my wishlist</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeWishlist()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="cart_media">
                <ul class="cart_product">
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>redmi not 3</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>Double Door Refrigerator</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="media">
                            <a href="product-page(left-sidebar).html">
                                <img alt="megastore1" class="me-3" src="../assets/images/layout-2/product/3.jpg">
                            </a>
                            <div class="media-body">
                                <a href="product-page(left-sidebar).html">
                                    <h4>woman hande bag</h4>
                                </a>
                                <h6>
                                    $80.00 <span>$120.00</span>
                                </h6>
                                <div class="addit-box">
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <button class="qty-minus"></button>
                                            <input class="qty-adj form-control" type="number" value="1" />
                                            <button class="qty-plus"></button>
                                        </div>
                                    </div>
                                    <div class="pro-add">
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                            data-bs-target="#edit-product">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i data-feather="trash-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="cart_total">
                    <li>
                        subtotal : <span>$1050.00</span>
                    </li>
                    <li>
                        shpping <span>free</span>
                    </li>
                    <li>
                        taxes <span>$0.00</span>
                    </li>
                    <li>
                        <div class="total">
                            total<span>$1050.00</span>
                        </div>
                    </li>
                    <li>
                        <div class="buttons">
                            <a href="wishlist.html" class="btn btn-solid btn-block btn-md">view wislist</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- wishlistbar bar end-->

    <!-- My account bar start-->
    <div id="myAccount" class="add_to_cart right account-bar">
        <a href="javascript:void(0)" class="overlay" onclick="closeAccount()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my account</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeAccount()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <form class="theme-form">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label for="review">Password</label>
                    <input type="password" class="form-control" id="review" placeholder="Enter your password"
                        required="">
                </div>
                <div class="form-group">
                    <a href="javascript:void(0)" class="btn btn-solid btn-md btn-block ">Login</a>
                </div>
                <div class="accout-fwd">
                    <a href="forget-pwd.html" class="d-block">
                        <h5>forget password?</h5>
                    </a>
                    <a href="register.html" class="d-block">
                        <h6>you have no account ?<span>signup now</span></h6>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- Add to account bar end-->

    <!-- add to  setting bar  start-->
    <div id="mySetting" class="add_to_cart right">
        <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
        <div class="cart-inner">
            <div class="cart_top">
                <h3>my setting</h3>
                <div class="close-cart">
                    <a href="javascript:void(0)" onclick="closeSetting()">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div class="setting-block">
                <div class="form-group">
                    <select>
                        <option value="">language</option>
                        <option value="">english</option>
                        <option value="">french</option>
                        <option value="">hindi</option>
                    </select>
                </div>
                <div class="form-group">
                    <select>
                        <option value="">currency</option>
                        <option value="">uro</option>
                        <option value="">ruppees</option>
                        <option value="">piund</option>
                        <option value="">doller</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- add to  setting bar  end-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function handleSortChange() {
            var selectElement = document.getElementById('sortSelect');
            var selectedValue = selectElement.value;
            var url = new URI(window.location.href);
            var params = url.search(true);

            if (selectedValue === 'default') {
                delete params.sort;
            } else {
                params.sort = selectedValue;
            }

            var updatedUrl = url.search(params).toString();

            window.location.href = updatedUrl;
        }

        function handleBrandFilter() {
            var selectedBrands = Array.from(document.querySelectorAll('.brand-checkbox:checked'))
                .map(checkbox => checkbox.getAttribute('data-brand-id'));

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.product_category;

            if (selectedBrands.length > 0) {
                var brandParam = selectedBrands.filter(brand => brand !== '').join(',');
                params.product_category = brandParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&product_category=,)|(\?product_category=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handlePerPageChange() {
            var perPage = document.getElementById('perPageSelect').value;
            var url = new URI(window.location.href);
            var params = url.search(true);

            params.perPage = perPage;

            var updatedUrl = url.search(params).toString();

            window.location.href = updatedUrl;
        }

        function handleColorFilter() {
            var selectedColors = Array.from(document.querySelectorAll('.color-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.color;

            if (selectedColors.length > 0) {
                var colorParam = selectedColors.filter(color => color !== '').join(',');
                params.color = colorParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&color=,)|(\?color=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleSizeFilter() {
            var selectedSizes = Array.from(document.querySelectorAll('.size-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.size;

            if (selectedSizes.length > 0) {
                var sizeParam = selectedSizes.filter(size => size !== '').join(',');
                params.size = sizeParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&size=,)|(\?size=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleRamFilter() {
            var selectedRams = Array.from(document.querySelectorAll('.ram-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.ram;

            if (selectedRams.length > 0) {
                var ramParam = selectedRams.filter(ram => ram !== '').join(',');
                params.ram = ramParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&ram=,)|(\?ram=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleRomFilter() {
            var selectedRoms = Array.from(document.querySelectorAll('.rom-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.rom;

            if (selectedRoms.length > 0) {
                var romParam = selectedRoms.filter(rom => rom !== '').join(',');
                params.rom = romParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&rom=,)|(\?rom=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleCpuFilter() {
            var selectedCpus = Array.from(document.querySelectorAll('.cpu-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.cpu;

            if (selectedCpus.length > 0) {
                var cpuParam = selectedCpus.filter(cpu => cpu !== '').join(',');
                params.cpu = cpuParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&cpu=,)|(\?cpu=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleFrequencyFilter() {
            var selectedFrequencies = Array.from(document.querySelectorAll('.frequency-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.sweep_frequency;

            if (selectedFrequencies.length > 0) {
                var frequencyParam = selectedFrequencies.filter(frequency => frequency !== '').join(',');
                params.sweep_frequency = frequencyParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&sweep_frequency=,)|(\?sweep_frequency=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleHardDriveFilter() {
            var selectedHardDrives = Array.from(document.querySelectorAll('.hard-drive-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.hard_drive;

            if (selectedHardDrives.length > 0) {
                var hardDriveParam = selectedHardDrives.filter(hardDrive => hardDrive !== '').join(',');
                params.hard_drive = hardDriveParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&hard_drive=,)|(\?hard_drive=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleResolutionFilter() {
            var selectedResolutions = Array.from(document.querySelectorAll('.resolution-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.resolution;

            if (selectedResolutions.length > 0) {
                var resolutionParam = selectedResolutions.filter(resolution => resolution !== '').join(',');
                params.resolution = resolutionParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&resolution=,)|(\?resolution=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handleRamRomFilter() {
            var selectedRamRoms = Array.from(document.querySelectorAll('.ram-rom-checkbox:checked'))
                .map(checkbox => checkbox.id);

            var url = new URI(window.location.href);
            var params = url.search(true);

            delete params.ram_rom;

            if (selectedRamRoms.length > 0) {
                var ramRomParam = selectedRamRoms.filter(ramRom => ramRom !== '').join(',');
                params.ram_rom = ramRomParam;
            }

            var updatedUrl = url.search(params).toString();

            updatedUrl = updatedUrl.replace(/(&ram_rom=,)|(\?ram_rom=,)/g, '');

            window.location.href = updatedUrl;
        }

        function handlePageChange(page) {
            var url = new URI(window.location.href);
            var params = url.search(true);

            params.page = page;

            var updatedUrl = url.search(params).toString();
            window.location.href = updatedUrl;
        }

        $(document).ready(function() {
            var url = new URI(window.location.href);
            var minPrice = url.query(true).min_price || {{ $minPriceAll }};
            var maxPrice = url.query(true).max_price || {{ $maxPriceAll }};

            $("#price-slider").ionRangeSlider({
                type: "double",
                min: {{ $minPriceAll }},
                max: {{ $maxPriceAll }},
                from: minPrice,
                to: maxPrice,
                grid: true,
                grid_snap: true,
                onFinish: function(data) {
                    handlePriceFilter();
                }
            });
        });

        function handlePriceFilter() {
            var priceSlider = $("#price-slider").data("ionRangeSlider");
            var minPrice = priceSlider.result.from;
            var maxPrice = priceSlider.result.to;

            var url = new URL(window.location.href);
            var params = new URLSearchParams(url.search);

            params.set('min_price', minPrice);
            params.set('max_price', maxPrice);

            url.search = params.toString();
            var updatedUrl = url.toString();

            window.location.href = updatedUrl;
        }
    </script>


@endsection
