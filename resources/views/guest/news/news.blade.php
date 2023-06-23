@extends('guest.layouts.layout')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-main ">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-contain">
                        <div>
                            <h2>Tin tức</h2>
                            <ul>
                                <li><a href=""{{ route('home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href=""{{ route('guest.news') }}">Tin tức</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <!-- section start -->
    <section class="section-big-py-space blog-page ratio2_3">
        <div class="custom-container">
            <div class="row">
                <!--Blog sidebar start-->
                <div class="col-xl-3 col-lg-4 col-md-5">
                    <div class="blog-sidebar">
                        <div class="theme-card">
                            <h4>Tin tức mới</h4>
                            <ul class="recent-blog">
                                @foreach ($newsNew as $news)
                                <li>
                                    <div class="media"><img class="img-fluid " src="{{asset($news->image)}}"
                                            alt="Generic placeholder image">
                                        <div class="media-body align-self-center">
                                            <h6>Ngày đăng: {{ $news->created_at->format('d-m-Y') }}</h6>
                                            <p>{{$news->number_love}} lượt thích</p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="theme-card">
                            <h4>Tin tức phổ biến</h4>
                            <ul class="popular-blog">
                                @foreach ($newsNew as $news)
                                <li>
                                    <div class="media">
                                        <div class="blog-date">
                                            <span>{{ $news->created_at->day }}</span><span>{{ $news->created_at->month }}</span>
                                        </div>
                                        <div class="media-body align-self-center">
                                            <h6>{{$news->title}}</h6>
                                            <p>{{$news->number_love}} lượt thích</p>
                                        </div>
                                    </div>
                                    <p>{{ Str::limit($news->content, 80, '...') }}</p>
                                </li>
                                @endforeach
                                
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Blog sidebar start-->
                <!--Blog List start-->
                <div class="col-xl-9 col-lg-8 col-md-7 order-sec">
                    @foreach ($newsNew as $news)
                    <div class="row blog-media">
                        <div class="col-xl-4 ">
                            <div class="blog-left">
                                <a href="javascript:void(0)"><img src="{{asset($news->image)}}" class="img-fluid  "
                                        alt="blog-left"></a>
                                <div class="label-block">
                                    <div class="date-label">
                                        Ngày đăng: {{ $news->created_at->format('d-m-Y') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 ">
                            <div class="blog-right">
                                <div>
                                    <a href="javascript:void(0)">
                                        <h4>{{ $news->title }}</h4>
                                    </a>
                                    <ul class="post-social">
                                        <li>Đăng bởi : BigDeal</li>
                                        <li><i class="fa fa-heart"></i> {{$news->number_love}} lượt thích</li>
                                        <li><i class="fa fa-comments"></i>{{$news->NumberComment}}</li>
                                    </ul>
                                    <p>{{ Str::limit($news->content, 80, '...') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{ $newsAll->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
                <!--Blog List start-->
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection
