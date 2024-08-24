<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // ユーザー登録フォームを表示するメソッド
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // ユーザー登録処理を行うメソッド
    public function register(RegisterRequest $request)
    {
        // フォームリクエストによるバリデーション済みデータを使用してユーザーを登録
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // ユーザーをログインさせる
        Auth::login($user);

        // ホームページへリダイレクト
        return redirect()->route('home');
    }

    // ログインフォームを表示するメソッド
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログイン処理を行うメソッド
    public function login(Request $request)
    {
        // 手動でのバリデーション
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // ログインの試行
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }

        // ログイン失敗時にエラーメッセージを表示
        return back()->withErrors([
            'email' => '提供された資格情報は登録されていません。',
        ]);
    }

    // ログアウト処理を行うメソッド
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login');
    }
}