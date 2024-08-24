@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/airbnb.css">
@endsection

@section('title', '管理画面')

@section('content')
<div class="admin-container">
    <h1 class="admin-logo">Admin</h1>

    <form method="GET" action="{{ route('categories.index') }}">
        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="名前やメールアドレスを入力してください" value="{{ request('name') }}">
            <select name="gender" id="gender">
                <option value="">性別</option>
                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
            </select>
            <select name="category_id" id="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
            <input type="text" name="date" id="date" placeholder="年/月/日" value="{{ request('date') }}">
            <button type="submit" class="search-button">検索</button>
            <a href="{{ route('categories.index') }}" class="reset-button">リセット</a>
        </div>

        <div class="form-actions">
            <button type="button" class="export-button" onclick="exportData()">エクスポート</button>
            <div class="pagination">
                {{ $contacts->links() }}
            </div>
        </div>
    </form>

    <table class="results-table">
        <thead>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>性別</th>
                <th>お問い合わせの種類</th>
                <th>詳細</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->gender_label }}</td>
                <td>{{ $contact->category->name }}</td>
                <td>
                    <button type="button" class="detail-button" onclick="showDetails({{ $contact->id }})">詳細</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="detailsModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modal-body"></div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection
