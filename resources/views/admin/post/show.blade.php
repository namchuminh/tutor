@extends('Admin.layouts.app')
@section('title', 'Xem Bài Viết')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Xem Bài Viết</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Quản Lý Bài Viết</a></li>
                    <li class="breadcrumb-item active">Xem Bài Viết</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Nội Dung Bài Viết</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="content" class="form-control" disabled>{{ $post->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Thông Tin Bài Viết</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tiêu đề</label>
                                    <input type="text" class="form-control" placeholder="Tiêu đề" value="{{ $post->title }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="slug">Đường dẫn</label>
                                    <input type="text" class="form-control" placeholder="Đường dẫn" value="{{ $post->slug }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="name">Môn học</label>
                                    <input type="text" class="form-control" placeholder="Môn học" value="{{ $post->subject->name }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="fee">Mức phí</label>
                                    <input type="number" class="form-control" placeholder="Mức phí" value="{{ $post->fee }}" disabled>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="{{ route('admin.post.index') }}">Quay Lại</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div><!-- /.container-fluid -->
</section>
<style>
    .form-control:disabled, .form-control[readonly] {
        background-color: white;
        opacity: 1;
    }
</style>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
