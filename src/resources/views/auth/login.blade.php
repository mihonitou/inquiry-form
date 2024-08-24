@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection


@section('title', 'ログイン')

@section('content')
<div class="login-page">
<div class="login-container">
<h2 class="login-logo">Login</h2>

        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" placeholder="例: text@example.com" id="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" placeholder="例: coachtech1106" id="password" required>
            </div>

            <button type="submit">ログイン</button>
        </form>
    </div>
@endsection
