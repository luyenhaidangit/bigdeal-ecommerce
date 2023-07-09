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

    @include('guest.layouts.modal')

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
