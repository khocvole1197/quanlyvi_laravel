<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function profile()
    {
        return view('/profile/profile');
    }
    //thay doi thong tin user
    public function updateInfo(Profile $request)
    {
        $userName = $request->name;
        $pass = $request->password;
        $passWord = Hash::make($pass);
        $user = Auth::user();
        $user->name = $userName;
        $user->password = $passWord;
        $user->save();
        return redirect()->route('profile')->with('success', 'Sửa thông tin thành công');
    }
}
