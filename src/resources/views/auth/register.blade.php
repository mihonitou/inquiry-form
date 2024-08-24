@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection


@section('title', 'ユーザー登録')

@section('content')
<div class="register-page">
    <div class="register-container">
    <h2 class="register-logo">Register</h2>


        @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)


                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name">お名前</label>
                <input type="text" name="name" placeholder="例: 山田太郎" id="name" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" placeholder="例: text@example.com" id="email" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" placeholder="例: coachtech1106" id="password" required>
            </div>

            <button type="submit">登録</button>
        </form>
        </>
        @endsection









        