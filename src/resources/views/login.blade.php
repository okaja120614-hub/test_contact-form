@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
<div class="head-button">
    <button class="head-button-register" type="button" onclick="location.href='/register'">register</button>
</div>
@endsection

@section('content')
<div class="login-form-content">
    <div class="login-form-heading">
        <h2 class="login-form-title">Login</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf
        <div class="form-area">
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
                <button class="form-button-submit" type="submit">ログイン</button>
            </div>
        </div>
    </form>
</div>
@endsection