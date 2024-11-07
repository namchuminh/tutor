<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VipPackageDetail;
use Illuminate\Http\Request;

class AdminVipPackageDetailController extends Controller
{
    public function index(Request $request)
    {
        // Nhận từ khóa tìm kiếm từ request
        $search = $request->input('search');

        // Lấy các gói VIP, lọc theo tên nếu có từ khóa tìm kiếm
        $vipPackages = VipPackageDetail::when($search, function ($query) use ($search) {
                $query->where('package_type', 'like', '%' . $search . '%');
            })
            ->orderBy('id', 'desc')
            ->paginate(10); // Phân trang 10 bản ghi

        return view('admin.vip.index', compact('vipPackages', 'search'));
    }

    public function create()
    {
        return view('admin.vip.create');
    }

    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'package_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'post_number' => 'required|integer|min:1',
            'benefits' => 'nullable|string',
        ], [
            'package_type.required' => 'Loại gói VIP là bắt buộc.',
            'package_type.string' => 'Loại gói VIP phải là chuỗi ký tự.',
            'package_type.max' => 'Loại gói VIP không được vượt quá 255 ký tự.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là số.',
            'price.min' => 'Giá không được nhỏ hơn 0.',
            'duration_days.required' => 'Số ngày hiệu lực là bắt buộc.',
            'duration_days.integer' => 'Số ngày hiệu lực phải là số nguyên.',
            'duration_days.min' => 'Số ngày hiệu lực phải lớn hơn hoặc bằng 1.',
            'post_number.required' => 'Số bài đăng là bắt buộc.',
            'post_number.integer' => 'Số bài đăng phải là số nguyên.',
            'post_number.min' => 'Số bài đăng tối thiểu là 1.',
            'benefits.string' => 'Lợi ích phải là chuỗi ký tự.',
        ]);

        // Lưu gói VIP
        VipPackageDetail::create($request->all());

        return redirect()->route('admin.vip.index')->with('success', 'Gói VIP đã được thêm thành công.');
    }

    public function show($id)
    {
        $vip = VipPackageDetail::findOrFail($id);
        return view('admin.vip.show', compact('vip'));
    }

    public function edit($id)
    {
        $vip = VipPackageDetail::findOrFail($id);
        return view('admin.vip.edit', compact('vip'));
    }

    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'package_type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'post_number' => 'required|integer|min:1',
            'benefits' => 'nullable|string',
        ], [
            'package_type.required' => 'Loại gói VIP là bắt buộc.',
            'package_type.string' => 'Loại gói VIP phải là chuỗi ký tự.',
            'package_type.max' => 'Loại gói VIP không được vượt quá 255 ký tự.',
            'price.required' => 'Giá là bắt buộc.',
            'price.numeric' => 'Giá phải là số.',
            'price.min' => 'Giá không được nhỏ hơn 0.',
            'duration_days.required' => 'Số ngày hiệu lực là bắt buộc.',
            'duration_days.integer' => 'Số ngày hiệu lực phải là số nguyên.',
            'duration_days.min' => 'Số ngày hiệu lực phải lớn hơn hoặc bằng 1.',
            'post_number.required' => 'Số bài đăng là bắt buộc.',
            'post_number.integer' => 'Số bài đăng phải là số nguyên.',
            'post_number.min' => 'Số bài đăng tối thiểu là 1.',
            'benefits.string' => 'Lợi ích phải là chuỗi ký tự.',
        ]);

        // Cập nhật gói VIP
        $vipPackage = VipPackageDetail::findOrFail($id);
        $vipPackage->update($request->all());

        return redirect()->route('admin.vip.index')->with('success', 'Gói VIP đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        $vipPackage = VipPackageDetail::findOrFail($id);
        $vipPackage->delete();

        return redirect()->route('admin.vip.index')->with('success', 'Gói VIP đã được xóa thành công.');
    }
}
