@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="{{ asset('js/index.js') }}"></script>
@endsection

@section('content')
<div class="contact-form-content">
    <div class="contact-form-heading">
        <h2 class="contact-form-title">Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label-item">お名前</span>
                <span class="form-label-required">※</span>
            </div>
            <div class="form-group-content">
                <div class="form-input-text">
                    <input class="form-input-name-last_name" type="text" name="last_name" placeholder="例:山田" />
                    <input class="form-input-name-first_name" type="text" name="first_name" placeholder="例:太郎" />
                </div>
                <div class="form-error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label-item">性別</span>
                <span class="form-label-required">※</span>
            </div>
            <div class="form-group-content">
                <div class="form-input-radio">
                    <label>
                        <input type="radio" id="man" name="gender" value="1" />
                        <span class="form-input-radio-span">男性</span>
                    </label>
                    <label>
                        <input type="radio" id="woman" name="gender" value="2" />
                        <span class="form-input-radio-span">女性</span>
                    </label>
                    <label>
                        <input type="radio" id="others" name="gender" value="3" />
                        <span class="form-input-radio-span">その他</span>
                    </label>
                </div>
                <div class="form-error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label-item">メールアドレス</span>
                <span class="form-label-required">※</span>
            </div>
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
            <div class="form-group-title">
                <span class="form-label-item">電話番号</span>
                <span class="form-label-required">※</span>
            </div>
            <div class="form-group-content">
                <div class="form-input-text">
                    <input class="form-input-tel" type="tel" name="tel-before" placeholder="080" />
                    <span class="form-input-tel-span">-</span>
                    <input class="form-input-tel" type="tel" name="tel-center" placeholder="1234" />
                    <span class="form-input-tel-span">-</span>
                    <input class="form-input-tel" type="tel" name="tel-after" placeholder="5678" />
                </div>
                <div class="form-error">
                    @error('tel-before')
                    {{ $message }}
                    @enderror
                    @error('tel-center')
                    {{ $message }}
                    @enderror
                    @error('tel-after')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label-item">住所</span>
                <span class="form-label-required">※</span>
            </div>
            <div class="form-group-content">
                <div class="form-input-text">
                    <input class="form-input-address" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" />
                </div>
                <div class="form-error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label-item">建物名</span>
            </div>
            <div class="form-group-content">
                <div class="form-input-text">
                    <input class="form-input-building" type="text" name="building" placeholder="例:千駄ヶ谷マンション101" />
                </div>
                <div class="form-error"></div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label-item">お問い合わせの種類</span>
                <span class="form-label-required">※</span>
            </div>
            <div class="form-group-content">
                <div class="form-select">
                    <select class="form-select-category" name="category" onchange="changeColor(this)">
                        <option class="form-select-category-option" value="category0" disabled selected>選択してください</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-error">
                    @error('category')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form-group-title">
                <span class="form-label-item">お問い合わせ内容</span>
                <span class="form-label-required">※</span>
            </div>
            <div class="form-group-content">
                <div class="form-textarea">
                    <textarea class="form-textarea-detail" name="detail" rows="4" placeholder="お問い合わせ内容をご記載ください"></textarea>
                </div>
                <div class="form-error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection