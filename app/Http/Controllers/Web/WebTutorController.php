<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\GiaSu;
use App\Models\User;


class WebTutorController extends Controller
{
    public function show(Request $request, $id){
        $giasu = GiaSu::with('user')->where('user_id', $id)->first();

        $posts = Post::with(['giaSu.user', 'subject'])
        ->where('status', 'accept')
        ->where('user_id', $id)
        ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo
        ->paginate(10); // Mỗi trang hiển thị 10 bài

        $newPost = Post::with(['giaSu.user', 'subject'])
        ->where('status', 'accept')
        ->orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo
        ->paginate(8); // Mỗi trang hiển thị 10 bài

        return view('web.profile.index', compact('giasu', 'posts', 'newPost'));
    }
}
