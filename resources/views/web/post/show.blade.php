@extends('Web.layouts.app')
@section('title', 'Tìm Gia Sư')
@section('content')
<div class="main_content sidebar_right pb-50 pt-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="entry-header entry-header-1 mb-30">
                    <div class="entry-meta meta-0 font-small mb-15"><a href="{{ route('web.subject.show', $post->subject->slug) }}"><span class="post-cat background2 color-white">{{ $post->subject->name }}</span></a></div>
                    <h1 class="post-title">
                        <a href="#">{{ $post->title }}</a>
                    </h1>
                    <div class="entry-meta meta-1 font-small color-grey mt-15 mb-15">
                        <span class="post-by">Bởi <a href="{{ route('web.giasu.show', $post->giaSu->user->id) }}">{{ $post->giasu->user->name }}</a></span>
                        <span class="post-on has-dot">{{ $post->created_at->format('d M Y') }}</span>
                        <span class="hit-count"><i class="ti-bolt"></i> {{ number_format($post->fee) }} VND</span>
                    </div>
                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                    <div class="single-social-share clearfix ">
                        <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                            <span class="hit-count"><i class="ti-comment mr-5"></i>82 comments</span>
                            <span class="hit-count"><i class="ti-heart mr-5"></i>68 likes</span>
                            <span class="hit-count"><i class="ti-star mr-5"></i>8/10</span>
                        </div>
                        <ul class="d-inline-block list-inline float-right">
                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="entry-main-content">
                    {!! $post->description !!}
                </div>
                <div class="single-social-share clearfix ">
                    <div class="entry-meta meta-1 font-small color-grey float-left mt-10">
                        <span class="hit-count"><i class="ti-comment"></i>82 comments</span>
                        <span class="hit-count"><i class="ti-heart"></i>68 likes</span>
                        <span class="hit-count"><i class="ti-star"></i>8/10</span>
                    </div>
                    <ul class="d-inline-block list-inline float-right">
                        <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                        <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center color-white" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                <!--author box-->
                <div class="author-bio">
                    <div class="author-image mb-30">
                        <a href="{{ route('web.giasu.show', $post->giaSu->user->id) }}"><img src="http://via.placeholder.com/223x223" alt="" class="avatar"></a>
                    </div>
                    <div class="author-info">
                        <h3><span class="vcard author"><span class="fn"><a href="{{ route('web.giasu.show', $post->giaSu->user->id) }}" rel="author">{{ $post->giasu->user->name }}</a></span></span>
                        </h3>
                        <h5>Khu Vực Gia Sư</h5>
                        <div class="author-description"> <i class="ti-location-pin"></i> {{ $post->giasu->area }}</div>
                        <h5>Số Điện Thoại</h5>
                        <div class="author-description"> <i class="fas fa-phone"></i> {{ $post->giasu->phone }} <a href="#" class="author-bio-link">Xem Đầy Đủ</a></div>
                    </div>
                </div>
                <!--related posts-->
                <div class="related-posts">
                    <h3 class="mb-30">Bài Viết Liên Quan</h3>
                    <div class="loop-list">
                        @foreach ($relatedPosts as $post)
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
                </div>
                <!--Comments-->
                <div class="comments-area">
                    <h3 class="mb-30">03 Bình Luận</h3>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="http://via.placeholder.com/223x223" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Vestibulum euismod, leo eget varius gravida, eros enim interdum urna, non rutrum enim ante quis metus. Duis porta ornare nulla ut bibendum
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Robert</a>
                                            </h5>
                                            <p class="date">December 4, 2020 at 3:12 pm </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="http://via.placeholder.com/223x223" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Sed ac lorem felis. Ut in odio lorem. Quisque magna dui, maximus ut commodo sed, vestibulum ac nibh. Aenean a tortor in sem tempus auctor
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Maria</a>
                                            </h5>
                                            <p class="date">December 4, 2020 at 3:12 pm </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment-list">
                        <div class="single-comment justify-content-between d-flex">
                            <div class="user justify-content-between d-flex">
                                <div class="thumb">
                                    <img src="http://via.placeholder.com/223x223" alt="">
                                </div>
                                <div class="desc">
                                    <p class="comment">
                                        Donec in ullamcorper quam. Aenean vel nibh eu magna gravida fermentum. Praesent eget nisi pulvinar, sollicitudin eros vitae, tristique odio.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <h5>
                                                <a href="#">Robert</a>
                                            </h5>
                                            <p class="date">December 4, 2020 at 3:12 pm </p>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="#" class="btn-reply text-uppercase">reply</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--comment form-->
                <div class="comment-form">
                    <h3 class="mb-30">Leave a Reply</h3>
                    <form class="form-contact comment_form" action="#" id="commentForm">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="button button-contactForm">Post Comment</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--col-lg-8-->
            <!--Right sidebar-->
            <div class="col-lg-4 col-md-12 col-sm-12 primary-sidebar sticky-sidebar">
                <div class="widget-area pl-30">
                    <!--Widget about-->
                    <div class="sidebar-widget widget-about mb-50 pt-30 pr-30 pb-30 pl-30 background12 border-radius-5">
                        <h5 class="mb-20">Hello, I'm Robert<img class="about-author-img float-right ml-30" src="http://via.placeholder.com/223x223" alt=""></h5>
                        <p class="font-medium">You should write because you love the shape of stories and sentences and the creation of different words on a page. Writing comes from reading, and reading is the finest teacher of how to write.</p>
                        <ul class="header-social-network d-inline-block list-inline color-white mb-20">
                            <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i class="ti-facebook"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i class="ti-twitter-alt"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i class="ti-pinterest"></i></a></li>
                            <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i class="ti-instagram"></i></a></li>
                        </ul>
                        <p>
                            <a class="readmore-btn font-small text-uppercase font-weight-ultra" href="contact.html">Contact me<i class="ti-arrow-right ml-5"></i></a>
                        </p>
                    </div>
                    <!--Widget social-->
                    <div class="sidebar-widget widget-social-network mb-50">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Theo Dõi</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="social-network">
                            <div class="follow-us d-flex align-items-center">
                                <a class="follow-us-facebook clearfix mr-5 mb-10" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-facebook mr-5 v-align-space"></i>
                                        <i class="ti-facebook mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Facebook</span>
                                    <span class="social-count counter-number">65</span><span class="social-count">K</span>
                                </a>
                                <a class="follow-us-twitter clearfix ml-5 mb-10" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-twitter-alt mr-5 v-align-space"></i>
                                        <i class="ti-twitter-alt mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Twitter</span>
                                    <span class="social-count counter-number">75</span><span class="social-count">K</span>
                                </a>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <a class="follow-us-instagram clearfix mr-5" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-instagram mr-5 v-align-space"></i>
                                        <i class="ti-instagram mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Instagram</span>
                                    <span class="social-count counter-number">32</span><span class="social-count">K</span>
                                </a>
                                <a class="follow-us-youtube clearfix ml-5" href="#" target="_blank">
                                    <div class="social-icon">
                                        <i class="ti-youtube mr-5 v-align-space"></i>
                                        <i class="ti-youtube mr-5 v-align-space nth-2"></i>
                                    </div>
                                    <span class="social-name">Youtube</span>
                                    <span class="social-count counter-number">28</span><span class="social-count">K</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Widget latest posts style 1-->
                    <div class="sidebar-widget widget_alitheme_lastpost mb-50">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Bài Viết Mới</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="row">
                            @foreach ($newPost as $post)
                                <div class="col-md-6 col-sm-6 sm-grid-content mb-30">
                                    <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                        <a href="{{ route('web.post.show', $post->slug) }}">
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content media-body">
                                        <h6 class="post-title mb-10 text-limit-2-row"><a href="{{ route('web.post.show', $post->slug) }}">{{ $post->title }}</a> </h6>
                                        <div class="entry-meta meta-1 font-x-small color-grey">
                                            <span class="time-reading"><i class="ti-user"></i>
                                                <a href="{{ route('web.giasu.show', $post->giaSu->user->id) }}">{{ $post->giaSu->user->name ?? 'Không xác định' }}</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--Widget categories-->
                    <div class="sidebar-widget widget_categories mb-50">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Môn Học</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="post-block-list post-module-1 post-module-5">
                            <ul>
                                @foreach ($subjects as $subject)
                                    <li class="cat-item cat-item-2"><a href="{{ route('web.subject.show', $subject->slug) }}">{{ $subject->name }}</a> ({{ $subject->posts_count }})</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--Widget latest posts style 2-->
                    <div class="sidebar-widget widget_alitheme_lastpost mb-50">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">Được Đề Xuất</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <div class="post-block-list">
                            @foreach ($postsRandom as $post)
                                <article class="mb-30">
                                    <div class="post-thumb position-relative thumb-overlay mb-30">
                                        <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url({{ asset('storage/' . $post->image) }})">
                                            <a class="img-link" href="{{ route('web.post.show', $post->slug) }}"></a>
                                        </div>
                                    </div>
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
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!--End sidebar-->
        </div>
    </div>
</div>
@endsection