@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection


@section('title', 'サンクスページ')

@section('content')
    <h2>お問い合わせありがとうございました</h2>
    <a href="{{ route('contact.create') }}">HOME</a>
@endsection
