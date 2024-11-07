<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class AdminReviewController extends Controller
{
    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm
        $search = $request->input('search');

        // Lấy danh sách đánh giá với tìm kiếm và phân trang
        $reviews = Review::with(['giaSu.user', 'phuHuynh.user']) // Eager load người đánh giá và người bị đánh giá
            ->when($search, function ($query) use ($search) {
                $query->whereHas('phuHuynh.user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
                })
                ->orWhereHas('giaSu.user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.review.index', compact('reviews', 'search'));
    }

    public function destroy($id)
    {
        // Tìm và xóa đánh giá
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.review.index')->with('success', 'Đánh giá đã được xóa thành công.');
    }
}
