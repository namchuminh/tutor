<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminTutorController;
use App\Http\Controllers\Admin\AdminLogoutController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminPhuHuynhController;
use App\Http\Controllers\Admin\AdminSubjectController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminVipPackageDetailController;


Route::prefix('admin')->group(function () {
    Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login')->middleware('notadmin');
    Route::post('login', [AdminLoginController::class, 'login'])->name('admin.login.submit')->middleware('notadmin');
    Route::get('logout', [AdminLogoutController::class, 'index'])->name('admin.logout')->middleware('admin');
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('/tutor', AdminTutorController::class)->names([
            'index' => 'admin.tutor.index',
            'create' => 'admin.tutor.create',
            'store' => 'admin.tutor.store',
            'show' => 'admin.tutor.show',
            'edit' => 'admin.tutor.edit',
            'update' => 'admin.tutor.update',
            'destroy' => 'admin.tutor.destroy',
        ]);
        Route::resource('/post', AdminPostController::class)->names([
            'index' => 'admin.post.index',
            'create' => 'admin.post.create',
            'store' => 'admin.post.store',
            'show' => 'admin.post.show',
            'edit' => 'admin.post.edit',
            'update' => 'admin.post.update',
            'destroy' => 'admin.post.destroy',
        ]);
        Route::resource('/subject', AdminSubjectController::class)->names([
            'index' => 'admin.subject.index',
            'create' => 'admin.subject.create',
            'store' => 'admin.subject.store',
            'show' => 'admin.subject.show',
            'edit' => 'admin.subject.edit',
            'update' => 'admin.subject.update',
            'destroy' => 'admin.subject.destroy',
        ]);

        Route::get('phuhuynh', [AdminPhuHuynhController::class, 'index'])->name('admin.phuhuynh.index')->middleware('admin');
        Route::get('phuhuynh/{phuhuynh}/show', [AdminPhuHuynhController::class, 'show'])->name('admin.phuhuynh.show')->middleware('admin');
        Route::post('phuhuynh/{phuhuynh}/balance', [AdminPhuHuynhController::class, 'balance'])->name('admin.phuhuynh.balance')->middleware('admin');
        Route::get('phuhuynh/{phuhuynh}/block', [AdminPhuHuynhController::class, 'block'])->name('admin.phuhuynh.block')->middleware('admin');
        
        Route::get('review', [AdminReviewController::class, 'index'])->name('admin.review.index')->middleware('admin');
        Route::delete('review/{review}/destroy', [AdminReviewController::class, 'destroy'])->name('admin.review.destroy')->middleware('admin');
        
        Route::get('comment', [AdminCommentController::class, 'index'])->name('admin.comment.index')->middleware('admin');
        Route::delete('comment/{comment}/destroy', [AdminCommentController::class, 'destroy'])->name('admin.comment.destroy')->middleware('admin');
    
        Route::resource('/vip', AdminVipPackageDetailController::class)->names([
            'index' => 'admin.vip.index',
            'create' => 'admin.vip.create',
            'store' => 'admin.vip.store',
            'show' => 'admin.vip.show',
            'edit' => 'admin.vip.edit',
            'update' => 'admin.vip.update',
            'destroy' => 'admin.vip.destroy',
        ]);
    });
});






Route::get('/api/province', function () {
    $response = Http::get('https://vapi.vnappmob.com/api/province');
    return $response->json();
});

Route::get('/api/district/{provinceId}', function ($provinceId) {
    $response = Http::get("https://vapi.vnappmob.com/api/province/district/{$provinceId}");
    return $response->json();
});

Route::get('/api/ward/{districtId}', function ($districtId) {
    $response = Http::get("https://vapi.vnappmob.com/api/province/ward/{$districtId}");
    return $response->json();
});



