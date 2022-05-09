<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function showChangePasswordGet() {
        return view('auth.change-password');
    }
    public function changePasswordPost(Request $request)
    {
        $user = Auth::user();

        $userPassword = $user->password;
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);
        if (!Hash::check($request->current_password, $userPassword)) {
            return back()->with('error','Mật khẩu hiện tại không đúng');
        }

        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success','Đổi mật khẩu thánh công');
    }
}
