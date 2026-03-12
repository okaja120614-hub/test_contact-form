@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/search.css') }}">
@endsection

@section('button')
<form action="/logout" method="post">
    @csrf
    <div class="head-button">
        <button class="head-button-logout" type="submit">logout</button>
    </div>
</form>
@endsection

@section('content')
<div class="admin-form-content">
    <div class="admin-form-heading">
        <h2 class="admin-form-title">Admin</h2>
    </div>
    <form class="form" action="/search" method="get">
        <div class="form-group">
            <div class="form-group-content">
                <input class="form-input-name-email" type="text" name="name-email" placeholder="名前やメールアドレスを入力してください" />
                <div class="form-select">
                    <select class="form-select-gender" name="gender">
                        <option class="form-select-gender-option" value="0" disabled selected>性別</option>
                        <option value="0">全て</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                        <option value="3">その他</option>
                    </select>
                </div>
                <div class="form-select">
                    <select class="form-select-category" name="category">
                        <option class="form-select-category-option" value="0" disabled selected>お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-select-date">
                    <input class="form-select-date-input" type="date" id="date" name="date" value="年/月/日">
                </div>
                <div class="form-button">
                    <button class="form-button-search" type="submit">検索</button>
                </div>
                <div class="form-button">
                    <button class="form-button-reset" type="button" onclick="window.location.reload();">リセット</button>
                </div>
            </div>
        </div>
    </form>
    @yield('links')
    <div class="contact-table">
        <table class="contact-table-inner">
            <tr class="contact-table-row">
                <th class="contact-table-header">
                    <span class="contact-table-header-span">お名前</span>
                    <span class="contact-table-header-span">性別</span>
                    <span class="contact-table-header-span">メールアドレス</span>
                    <span class="contact-table-header-span contact-table-header-span-category">お問い合わせの種類</span>
                    <span class="contact-table-header-span"></span>
                </th>
            </tr>
            @yield('results')
        </table>
    </div>
</div>
@endsection