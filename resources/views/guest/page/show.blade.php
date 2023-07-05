@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Trang</h2>
                            <ul>
                                <li><a href="{{ route('guest.home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.page.show', ['slug' => $page->slug]) }}">{{$page->title}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!--section start-->
    <section class="blog-detail-page section-big-py-space ratio2_3">
        <div class="container">
            <div class="row section-big-pb-space">
                <div class="col-sm-12 blog-detail">
                    <div class="creative-card">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section ends-->
@endsection
