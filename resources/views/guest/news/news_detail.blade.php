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
                                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.news') }}">Tin tức</a></li>
                                <li><i class="fa fa-angle-double-right"></i></li>
                                <li><a href="{{ route('guest.news.show', ['id' => $news->id]) }}">{{ $news->title }}</a>
                                </li>
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
                        <img src="{{ asset($news->image) }}" class="img-fluid w-100 " alt="blog"
                            style="max-height: 280px">
                        <h3>{{ $news->title }}</h3>
                        <ul class="post-social">
                            <li>Ngày đăng: {{ $news->created_at->format('d-m-Y') }}</li>
                            <li>Người đăng : BigDeal</li>
                            <li>
                                @if (in_array($news->id, json_decode(request()->cookie('liked_posts'), true)))
                                    <i class="fa fa-heart text-danger"></i>
                                @else
                                <a style="color: unset !important" href="{{ route('guest.news.love', $news->id) }}">
                                    <i class="fa fa-heart"></i>
                                </a>
                                @endif
                                {{ $news->number_love }} lượt thích
                            </li>
                            <li><i class="fa fa-comments"></i> {{ $news->NumberComment }} bình luận</li>
                        </ul>
                        <p>{{ $news->content }}</p>
                    </div>
                </div>
            </div>
            <div class="row section-big-pb-space">
                <div class="col-sm-12 ">
                    <div class="creative-card">
                        <ul class="comment-section d-flex flex-column">
                            @foreach ($comments as $comment)
                                <li>
                                    <div class="media"><img src="{{ asset('guest-resource/images/avtar/2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <h6>{{ $comment->name }} <span>( {{ $comment->created_at->format('d-m-Y') }}
                                                    )</span></h6>
                                            <p>{{ $comment->content }}.</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4 ms-4">
                            {{ $comments->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class=" row blog-contact">
                <div class="col-sm-12  ">
                    <div class="creative-card">
                        @if (session('success'))
                        <div class="alert alert-success bg-success text-white" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <h2>Bình luận</h2>
                        <form class="theme-form" action="{{ route('guest.news_comment.store') }}" method="POST">
                            <div class="row g-3">
                                <div class="col-md-12 d-none">
                                    <label for="name">Id</label>
                                    <input hidden type="text" name="news_id" class="form-control" id="name"
                                        value="{{ $news->id }}" required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="name">Tên</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Nhập tên của bạn" required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Nhập email" required="">
                                </div>
                                <div class="col-md-12">
                                    <label for="exampleFormControlTextarea1">Bình luận</label>
                                    <textarea class="form-control" name="content" placeholder="Viết bình luận" id="exampleFormControlTextarea1"
                                        rows="6"></textarea>
                                </div>
                                <div class="col-md-12">
                                    {{ csrf_field() }}
                                    <button class="btn btn-normal" type="submit">Đăng</button>
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
