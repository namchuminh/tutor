<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Post;

class WebHomeController extends Controller
{
    public function index(){
        // Lấy danh sách Subject cùng số lượng bài viết
        $subjects = Subject::withCount(['posts' => function ($query) {
            $query->where('status', 'accept');
        }])->get();

        $posts = Post::with(['giaSu.user', 'subject'])
        ->where('status', 'accept')
        ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo
        ->paginate(10); // Mỗi trang hiển thị 10 bài

        return view('web.home.index', compact('subjects', 'posts'));
    }
}
