@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css') }}">
@endsection


@section('title', 'お問い合わせ')

@section('content')
<div class="contact-page">
    <div class="contact-container">
    <h2 class="contact-logo">Contact</h2>

        @if ($errors->any())

        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('contact.confirm') }}" method="POST">
            @csrf

            <div class="form-group name-area">
                <label for="last_name">姓<span style="color: red;">※</span></label>
                <input type="text" name="last_name" placeholder="例: 山田" id="last_name" value="{{ old('last_name') }}" required>

                <label for="first_name">名<span style="color: red;">※</span></label>
                <input type="text" name="first_name" placeholder="例: 太朗" id="first_name" value="{{ old('first_name') }}" required>
            </div>

            <div class="form-group gender-area">
                <label for="gender">性別<span style="color: red;">※</span></label>
                <label>
                    <input type="radio" name="gender" value="1" {{ old('gender', 1) == 1 ? 'checked' : '' }}> 男性
                </label>
                <label>
                    <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> 女性
                </label>
                <label>
                    <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}> その他
                </label>
            </div>

            <div class="form-group email-area">
                <label for="email">メールアドレス<span style="color: red;">※</span></label>
                <input type="email" name="email" placeholder="例: text@example.com" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group tel-area">
                <label for="tel">電話番号<span style="color: red;">※</span></label>
                <input type="tel" name="tel" placeholder="例: 080-1234-5678" id="tel" value="{{ old('tel') }}" required>
            </div>

            <div class="form-group address-area">
                <label for="address">住所<span style="color: red;">※</span></label>
                <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" id="address" value="{{ old('address') }}" required>
            </div>

            <div class="form-group building-area">
                <label for="building">建物名</label>
                <input type="text" name="building" placeholder="千駄ヶ谷マンション101" id="building" value="{{ old('building') }}">
            </div>

            <div class="form-group category-area">
                <label for="category_id">お問い合わせ種類<span style="color: red;">※</span></label>
                <select name="category_id" id="category_id" required>
                    <option value="">選択してください</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->content }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group detail-area">
                <label for="detail">お問い合わせ内容<span style="color: red;">※</span></label>
                <textarea name="detail" id="detail" maxlength="120" placeholder="お問い合わせ内容を入力してください" required>{{ old('detail') }}</textarea>
            </div>

            <button type="submit">確認画面</button>
        </form>
    </div>
</div>
@endsection