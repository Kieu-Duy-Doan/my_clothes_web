<?php

namespace App\Http\Controllers\admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreuserByAdminRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', '=', 'user')->paginate(10);
        return view('admins.users.index', compact('users'));
    }

    public function create()
    {
        return view('admins.users.create');
    }

    public function store(StoreuserByAdminRequest $request)
    {
        try {
            $data = $request->safe()->except(['avatar']);
            $avatarUrl = null;
            if ($request->hasFile('avatar')) {
                $avatarUrl = $request->file('avatar')->store('users', 'public');
            }

            $data['avatar'] = $avatarUrl;

            User::create($data);

            return redirect()->route('admin.user.index')->with('success', 'Tạo tài khoản thành công!');
        } catch (\Throwable $th) {
            if ($avatarUrl && Storage::disk('public')->exists($avatarUrl)) {
                Storage::disk('public')->delete($avatarUrl);
            }
            return back()->withInput()->with('error', 'Không thể tạo tài khoản mới do: ' . $th->getMessage());
        }
    }
}
