@extends('Web.layouts.app')
@section('title', 'Thông Tin Gia Sư')
@section('content')
<div class="main_content sidebar_right pb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--author box-->
                <div class="author-bio mb-50" style="margin: 0; padding: 50px; border: 0; background: #f4f5f9; border-radius: 5px;">
                    <div class="author-image mb-30">
                        <a href="{{ route('web.giasu.show',$giasu->user->id ) }}"><img src="{{ empty($giasu->avatar) ? asset('assets/imgs/avatar.png'): $giasu->avatar }}" alt="" class="avatar"></a>
                    </div>
                    <div class="author-info">
                        <h3><span class="vcard author"><span class="fn"><a href="{{ route('web.giasu.show',$giasu->user->id ) }}" title="Posts by Robert" rel="author">{{ $giasu->user->name }}</a></span></span>
                        </h3>
                        <h5>Thông Tin Giới Thiệu</h5>
                        <div class="author-description">{{ $giasu->bio }}</div>
                        <h5>Khu Vực Gia Sư</h5>
                        <div class="author-description"><i class="ti-location-pin"></i> {{ $giasu->area }}</div>
                        <h5>Số Điện Thoại</h5>
                        <div class="author-description"><i class="fas fa-phone"></i> {{ $giasu->user->phone }}</div>
                        <a href="#" class="author-bio-link mb-15">Xem liên hệ</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="related-posts">
                    <div class="loop-list">
                        @foreach ($posts as $post)
                            <article class="row mb-50">
                                <div class="col-md-6">
                                    <div class="post-thumb position-relative thumb-overlay mr-20">
                                        <div class="img-hover-slide border-radius-5 position-relative"
                                            style="background-image: url('{{ asset('storage/' . $post->image) }}')">
                                            <a class="img-link" href="{{ route('web.post.show', $post->slug) }}"></a>
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
                <div class="pagination-area pt-30 text-center bt-1 border-color-1">
                    {{ $posts->links('pagination::bootstrap-4') }}
                </div>
            </div>
            <!--col-lg-8-->
            <!--Right sidebar-->
            <div class="col-lg-4 col-md-12 col-sm-12 primary-sidebar sticky-sidebar">
                <div class="widget-area pl-30">
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
                </div>
            </div>
            <!--End sidebar-->
        </div>
    </div>
</div>
@endsection