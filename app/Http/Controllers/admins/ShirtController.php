<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShirtRequest;
use App\Http\Requests\UpdateShirtRequest;
use App\Models\Rate;
use App\Models\Shirt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShirtController extends Controller
{
    public function index()
    {
        $shirts = Shirt::paginate(1);
        $priceAvg = Shirt::avg('price');
        $rateAvg = Rate::avg('star');
        return view('admins.shirts.index', compact('shirts', 'priceAvg', 'rateAvg'));
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

                $imageUrl = $file->store('shirts', 'public');
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
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function view(Request $request, $shirtId)
    {
        $shirt = Shirt::findOrFail($shirtId);
        return view('admins.shirts.view', compact('shirt'));
    }

    public function edit($shirtId)
    {
        $shirt = Shirt::findOrFail($shirtId);
        return view('admins.shirts.edit', compact('shirt'));
    }

    public function update(UpdateShirtRequest $request)
    {
        try {
            $shirt = Shirt::findOrFail($request->shirtId);
            // Chỉ lấy những trường được định nghĩa trong request
            // Lấy dữ liệu đã validate, loại bỏ trường image để xử lý riêng
            $data = $request->safe()->except(['image']);

            if ($request->hasFile('image')) {
                $oldImageUrl = $shirt->image;
                $file = $request->file('image');

                if (!$file) {
                    throw new \RuntimeException('Không tìm thấy file ảnh!');
                }

                $newImageUrl = $file->store('shirts', 'public');

                if(!$newImageUrl) {
                    throw new \RuntimeException('Không thể lưu ảnh!');
                }

                
                if ($oldImageUrl && Storage::disk('public')->exists($oldImageUrl)) {
                    Storage::disk('public')->delete($oldImageUrl);
                }
                $data['image'] = $newImageUrl;
            }

            $shirt->update($data);

            return redirect()->route('admin.shirt.index')->with('success', 'Cập nhật thành công');
        } catch (\Throwable $th) {
            return redirect()->route('admin.shirt.index')->with('error', $th->getMessage());
        }
    }
}
