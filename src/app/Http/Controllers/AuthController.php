<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('class_name', 'password');

        if (Auth::attempt($credentials)) {
            // 認証成功
            $user = Auth::user();

            // 管理者かどうか判定
            if ($user->class_name === 'admin') {
                return redirect('/admin/index');
            }

            // 一般ユーザー
            return redirect('/user/resister');
        } else {
            // 認証失敗
            return back()->withErrors(['message' => 'ユーザーIDまたはパスワードが間違っています。']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

