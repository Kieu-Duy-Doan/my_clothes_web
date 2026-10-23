<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShirtRequest;
use App\Models\Shirt;
use Illuminate\Http\Request;

class ShirtController extends Controller
{
    public function index()
    {
        $shirts = Shirt::paginate(10);
        return view('admins.shirts.index', compact('shirts'));
    }

    public function store(StoreShirtRequest $request)
    {
        try {
            $data = $request->validated();
            $imageUrl = null;

            if ($request->hasFile('image')) {

                // Kiểm tra có file hay không
                $file = $request->file('image');

                if (!$file) {
                    throw new \Exception('Không tìm được file bạn chọn!');
                }

                $imageUrl = $file->store('shirts', 'publice');
                // $image có  giá trị có thể: false nếu store thất bại. null nếu lấy file thất bại do dòng 24
                // gán là null.

                if (!$imageUrl) {
                    throw new \RuntimeException('Không thể lưu ảnh, vui lòng thử lại!');
                }
            }

            $data['image'] = $imageUrl;

            Shirt::create($data);

            return redirect()->route('admin.shirt.index')->with('success', 'Tạo sản phẩm thành công');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('errors', $th->getMessage());
        }
    }
}
