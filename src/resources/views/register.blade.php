@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('button')
<div class="head-button">
    <button class="head-button-login" type="button" onclick="location.href='/login'">login</button>
</div>
@endsection

@section('content')
<div class="register-form-content">
    <div class="register-form-heading">
        <h2 class="register-form-title">Register</h2>
    </div>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="form-area">
            <div class="form-group">
                <div class="form-group-title form-group-title-name">お名前</div>
                <div class="form-group-content">
                    <div class="form-input-text">
                        <input class="form-input-name" type="text" name="name" placeholder="例:山田　太郎" />
                    </div>
                    <div class="form-error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-title form-group-title-email">メールアドレス</div>
                <div class="form-group-content">
                    <div class="form-input-text">
                        <input class="form-input-email" type="email" name="email" placeholder="例:test@example.com" />
                    </div>
                    <div class="form-error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-group-title form-group-title-password">パスワード</div>
                <div class="form-group-content">
                    <div class="form-input-text">
                        <input class="form-input-password" type="password" name="password" placeholder="例:coachtech1106" />
                    </div>
                    <div class="form-error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-button">
                <button class="form-button-submit" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection