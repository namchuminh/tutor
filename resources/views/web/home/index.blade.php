@extends('Web.layouts.app')
@section('title', 'Trang Chủ')
@section('content')
<div class="recent-area pt-50 pb-50 background12">
    <div class="container">
        <!--Editor's Picked Start-->
        <div class="widgets-post-carausel-1 mb-60">
            <div class="post-carausel-1 border-radius-10 bg-white">
                <div class="row no-gutters">
                    <div class="col col-1-5 background6 editor-picked-left d-none d-lg-block">
                        <div class="editor-picked">
                            <h4>Theo Môn Học</h4>
                            <p class="font-medium color-grey mt-20 mb-30">Lựa chọn môn học cần tìm kiếm gia sư, chúng
                                tôi sẽ chọn lọc và cung cấp cho phụ huynh các thông tin mới nhất!</p>
                            <div class="post-carausel-1-arrow"></div>
                        </div>
                    </div>
                    <div class="col col-4-5 col-md-12">
                        <div class="post-carausel-1-items row">
                            @foreach ($subjects as $subject)
                                <div class="slider-single col">
                                    <!-- Hiển thị tên Subject -->
                                    <h6 class="post-title pr-5 pl-5 mb-10 text-limit-2-row">
                                        <a href="{{ route('web.subject.show', $subject->slug) }}">{{ $subject->name }}</a>
                                    </h6>
                                    <!-- Hiển thị hình ảnh Subject -->
                                    <div class="img-hover-scale border-radius-5 hover-box-shadow">
                                        <a href="{{ route('web.subject.show', $subject->slug) }}">
                                            <img style="height: 197px; width: 100%;" class="border-radius-5"
                                                src="{{ asset('storage/' . $subject->image) ?? 'https://www.contentviewspro.com/wp-content/uploads/2017/07/default_image.png' }}"
                                                alt="subject-image">
                                        </a>
                                    </div>
                                    <!-- Hiển thị số lượng bài viết -->
                                    <div class="entry-meta meta-1 font-small color-grey mt-10 pr-5 pl-5">
                                        <span class="post-on">{{ $subject->posts_count }} bài viết</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Editor's Picked End-->
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="widget-header position-relative mb-30">
                    <h5 class="widget-title mb-30 text-uppercase color1 font-weight-ultra">Bài Đăng Mới</h5>
                    <div class="letter-background">Latest</div>
                </div>
                <div class="loop-list">
                    @foreach ($posts as $post)
                        <article class="row mb-50">
                            <div class="col-md-6">
                                <div class="post-thumb position-relative thumb-overlay mr-20">
                                    <div class="img-hover-slide border-radius-5 position-relative"
                                        style="background-image: url('{{ asset('storage/' . $post->image) }}')">
                                        <a class="img-link" href="{{ route('web.post.show', $post->slug) }}"></a>
                                        <span class="top-right-icon background8">
                                            <i class="mdi mdi-flash-on"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 align-center-vertical">
                                <div class="post-content">
                                    <div class="entry-meta meta-0 font-small mb-15">
                                        <a href="{{ route('web.subject.show', $post->subject->slug) }}">
                                            <span
                                                class="post-cat background2 color-white">{{ $post->subject->name ?? 'Chưa có môn học' }}</span>
                                        </a>
                                    </div>
                                    <h4 class="post-title">
                                        <a href="{{ route('web.post.show', $post->slug) }}">{{ $post->title }}</a>
                                    </h4>
                                    <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                                        <span class="time-reading"><i class="ti-user"></i>
                                            <a href="{{ route('web.giasu.show', $post->giaSu->user->id) }}">{{ $post->giaSu->user->name ?? 'Không xác định' }}</a>
                                        </span>
                                        <span class="post-on"><i
                                                class="ti-marker-alt"></i>{{ $post->created_at->format('d M Y') }}</span>
                                        <span class="time-reading"><i class="ti-timer"></i>{{ number_format($post->fee) }} VND</span>
                                    </div>
                                    <p class="font-medium">{{ strip_tags(Str::limit($post->description, 150)) }}</p>
                                    <a class="readmore-btn font-small text-uppercase font-weight-ultra"
                                        href="{{ route('web.post.show', $post->slug) }}">
                                        Đọc Thêm<i class="ti-arrow-right ml-5"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                <!-- Hiển thị phân trang -->
                <div class="pagination-area pt-30 text-center bt-1 border-color-1">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                <div class="widget-area">
                    <!-- Social Network -->
                    <div class="sidebar-widget widget-social-network mb-30">
                        <div class="widget-header position-relative mb-30">
                            <h5 class="widget-title mt-5 mb-30">Theo Dõi</h5>
                        </div>
                        <div class="social-network">
                            <div class="follow-us d-flex align-items-center">
                                <a class="follow-us-facebook clearfix mr-5 mb-10" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-facebook mr-5 v-align-space"></i>
                                        <i class="ti-facebook mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Facebook</span>
                                    <span class="social-count counter-number">65</span><span
                                        class="social-count">K</span>
                                </a>
                                <a class="follow-us-twitter clearfix ml-5 mb-10" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-twitter-alt mr-5 v-align-space"></i>
                                        <i class="ti-twitter-alt mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Twitter</span>
                                    <span class="social-count counter-number">75</span><span
                                        class="social-count">K</span>
                                </a>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <a class="follow-us-instagram clearfix mr-5" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-instagram mr-5 v-align-space"></i>
                                        <i class="ti-instagram mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Instagram</span>
                                    <span class="social-count counter-number">32</span><span
                                        class="social-count">K</span>
                                </a>
                                <a class="follow-us-youtube clearfix ml-5" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-youtube mr-5 v-align-space"></i>
                                        <i class="ti-youtube mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Youtube</span>
                                    <span class="social-count counter-number">28</span><span
                                        class="social-count">K</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--taber-->
                    <div class="sidebar-widget widget-taber mb-30">
                        <div class="widget-taber-content background-white pt-30 pb-30 pl-30 pr-30 border-radius-5">
                            <nav class="tab-nav float-none mb-20">
                                <div class="nav nav-tabs" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-popular-tab" data-toggle="tab"
                                        href="#nav-popular" role="tab" aria-controls="nav-popular"
                                        aria-selected="true">Đề Xuất</a>
                                    <a class="nav-item nav-link" id="nav-trending-tab" data-toggle="tab"
                                        href="#nav-trending" role="tab" aria-controls="nav-trending"
                                        aria-selected="false">Đánh Giá</a>
                                    <a class="nav-item nav-link" id="nav-comment-tab" data-toggle="tab"
                                        href="#nav-comment" role="tab" aria-controls="nav-comment"
                                        aria-selected="false">Bình Luận</a>
                                </div>
                            </nav>
                            <div class="tab-content">
                                <!--Tab Popular-->
                                <div class="tab-pane fade show active" id="nav-popular" role="tabpanel"
                                    aria-labelledby="nav-popular-tab">
                                    <div class="post-block-list post-module-1">
                                        <ul class="list-post">
                                            <li class="mb-30">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background5 color-white font-small">World</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">Traveling Tends to
                                                            Magnify All Human Emotions</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">26k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background7 color-white font-small">Films</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">The Luxury Of
                                                            Traveling With Yacht</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">37k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background2 color-white font-small">Travel</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">Last Minute
                                                            Festive Packages From Superbreak</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">54k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background3 color-white font-small">Beauty</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">Less Is More:
                                                            Diving into Minimalism in Photography</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">126k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Tab Trending-->
                                <div class="tab-pane fade" id="nav-trending" role="tabpanel"
                                    aria-labelledby="nav-trending-tab">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                <a href="single.html">
                                                    <img src="http://via.placeholder.com/900x630" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row">The litigants on the
                                                    screen are not actors </h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey">
                                                    <span class="post-on">25 April</span>
                                                    <span class="hit-count has-dot">126k Views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                <a href="single.html">
                                                    <img src="http://via.placeholder.com/900x630" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row">6 Ways to Instantly
                                                    Improve your Ui Design.</h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                    <span class="post-on">25 April</span>
                                                    <span class="hit-count has-dot">126k Views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                <a href="single.html">
                                                    <img src="http://via.placeholder.com/900x630" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row">Water Partners With Rag &
                                                    Bone To Consume</h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey">
                                                    <span class="post-on">25 April</span>
                                                    <span class="hit-count has-dot">126k Views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                <a href="single.html">
                                                    <img src="http://via.placeholder.com/900x630" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row">The loss is not all that
                                                    surprising</h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                    <span class="post-on">25 April</span>
                                                    <span class="hit-count has-dot">126k Views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 sm-grid-content">
                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                <a href="single.html">
                                                    <img src="http://via.placeholder.com/900x630" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a
                                                    little fight, Bonanza </h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                    <span class="post-on">25 April</span>
                                                    <span class="hit-count has-dot">126k Views</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 sm-grid-content">
                                            <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                <a href="single.html">
                                                    <img src="http://via.placeholder.com/900x630" alt="">
                                                </a>
                                            </div>
                                            <div class="post-content media-body">
                                                <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a
                                                    book of matches </h6>
                                                <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                    <span class="post-on">25 April</span>
                                                    <span class="hit-count has-dot">126k Views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Tab Comments-->
                                <div class="tab-pane fade" id="nav-comment" role="tabpanel"
                                    aria-labelledby="nav-comment-tab">
                                    <div class="post-block-list post-module-1">
                                        <ul class="list-post">
                                            <li class="mb-30">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background2 color-white font-small">World</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">Traveling Tends to
                                                            Magnify All Human Emotions</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">26k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background3 color-white font-small">Films</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">The Luxury Of
                                                            Traveling With Yacht</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">37k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="mb-30">
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background7 color-white font-small">Travel</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">Last Minute
                                                            Festive Packages From Superbreak</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">54k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="d-flex">
                                                    <div
                                                        class="post-thumb d-flex mr-15 border-radius-5 img-hover-scale">
                                                        <a href="single.html">
                                                            <img src="http://via.placeholder.com/500x500" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content media-body">
                                                        <div class="entry-meta meta-0 mb-10">
                                                            <a href="category.html"><span
                                                                    class="post-in background8 color-white font-small">Beauty</span></a>
                                                        </div>
                                                        <h6 class="post-title mb-10 text-limit-2-row">Less Is More:
                                                            Diving into Minimalism in Photography</h6>
                                                        <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                            <span class="post-on">25 April</span>
                                                            <span class="hit-count has-dot">126k Views</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Ads -->
                    <div class="sidebar-widget widget-ads mb-30 text-center">
                        <a href="https://vimeo.com/333834999" class="play-video" data-animate="zoomIn"
                            data-duration="1.5s" data-delay="0.1s">
                            <img class="d-inline-block" src="http://via.placeholder.com/432x200" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection