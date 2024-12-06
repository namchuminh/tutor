<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\GiaSu;
use App\Models\PhuHuynh;
use App\Models\User;
use App\Models\VipPackage;
use Carbon\Carbon;


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

    public function phone(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        if(!auth()->user()){
            echo "Vui lòng đăng nhập để xem thông tin liên hệ!";
            return;
        }

        if(auth()->user()->role != "phu_huynh"){
            echo "Phụ huynh mới được phép xem thông tin liên hệ!";
            return;
        }


        $phuHuynh = PhuHuynh::where('user_id', auth()->id())->first();
        $vipPackage = VipPackage::where('phu_huynh_id', $phuHuynh->id)
        ->where('end_date', '>=', Carbon::now()) // Kiểm tra hạn còn hiệu lực
        ->first();

        if ($vipPackage) {
            $user = User::findOrFail($request->user_id);
            echo $user->phone;
        } else {
            echo "Vui lòng mua VIP để xem thông tin liên hệ gia sư!";
            return;
        }
    }
}
