@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('title', '確認画面')

@section('content')
<div class="confirm-page">
    <div class="confirm-container">
    <h2 class="confirm-logo">Confirm</h2>


        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <table class="confirm-table">
                <tr>
                    <th>お名前</th>
                    <td>{{ $data['last_name'] }} {{ $data['first_name'] }}</td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>{{ $data['gender'] == 1 ? '男性' : ($data['gender'] == 2 ? '女性' : 'その他') }}</td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td>{{ $data['tell'] }}</td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td>{{ $data['address'] }}</td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td>{{ $data['building'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td>{{ $data['category_name'] }}</td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>{{ $data['detail'] }}</td>
                </tr>
            </table>

            <button type="submit">送信</button>
            <a href="{{ route('contact.create') }}" class="edit-link">修正</a>
        </form>
    </div>
</div>
@endsection
