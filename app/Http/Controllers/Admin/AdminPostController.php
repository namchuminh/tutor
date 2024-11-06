<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{

    public function index(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ yêu cầu
        $search = $request->input('search');

        // Lấy danh sách bài đăng với thông tin liên kết GiaSu, User, và Subject
        $posts = Post::with(['giaSu.user', 'subject']) // Eager load GiaSu, User, và Subject
            ->when($search, function ($query) use ($search) {
                // Điều kiện tìm kiếm theo tiêu đề bài viết
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhereHas('giaSu.user', function ($q) use ($search) {
                        // Tìm kiếm theo tên và email của user
                        $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('subject', function ($q) use ($search) {
                        // Tìm kiếm theo tên của subject
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            })
            ->orderBy('id', 'desc')
            ->paginate(10); // Điều chỉnh phân trang nếu cần

        return view('admin.post.index', compact('posts', 'search'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $post = Post::with('subject')->findOrFail($id);
        return view('admin.post.show', compact('post'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        // Find the post by ID
        $post = Post::findOrFail($id);

        // Check if the status is not 'pending'
        if ($post->status != 'pending') {
            return redirect()->route('admin.post.index')->with('error', 'Không thể cập nhật trạng thái cho bài viết này.');
        }

        // Validate the incoming request data
        $request->validate([
            'status' => 'required|string|in:reject,accept|max:255',
        ], [
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.string' => 'Trạng thái phải là chuỗi ký tự.',
            'status.in' => 'Trạng thái phải là một trong những giá trị: reject, accept.',
            'status.max' => 'Trạng thái không được vượt quá 255 ký tự.',
        ]);

        // Update the post status
        $post->status = $request->input('status');
        $post->save(); // Save the changes

        // Redirect back to the post index with a success message
        return redirect()->route('admin.post.index')->with('success', $request->input('status') == 'reject' ? 'Đã từ chối bài viết' : 'Đã phê duyệt bài viết');
    }



    public function destroy($id)
    {
        //
    }
}
