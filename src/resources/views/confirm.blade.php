@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm-form-content">
    <div class="confirm-form-heading">
        <h2 class="confirm-form-title">Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table-inner">
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">お名前</td>
                    <td class="confirm-table-text">
                        <input readonly type="text" name="name" value="{{ $contact['last_name']. '　'. $contact['first_name'] }}" />
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">性別</td>
                    <td class="confirm-table-text">
                        <input readonly type="text" name="gender-display" value="{{ ($contact['gender'] == '1' ? '男' : ($contact['gender'] == '2' ? '女' : 'その他')) }}" />
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">メールアドレス</td>
                    <td class="confirm-table-text">
                        <input readonly type="email" name="email" value="{{ $contact['email'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">電話番号</td>
                    <td class="confirm-table-text">
                        <input readonly type="tel" name="tel" value="{{$contact['tel-before']. $contact['tel-center']. $contact['tel-after'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">住所</td>
                    <td class="confirm-table-text">
                        <input readonly type="text" name="address" value="{{ $contact['address'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">建物名</td>
                    <td class="confirm-table-text">
                        <input readonly type="text" name="building" value="{{ $contact['building'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">お問い合わせの種類</td>
                    <td class="confirm-table-text">
                        @foreach($categories as $category)
                        @if ($category->id == $contact['category'])
                        <input readonly type="text" name="category-display" value="{{ $category->content }}" />
                        <input type="hidden" name="category_id" value="{{ $contact['category'] }}" />
                        @endif
                        @endforeach
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <td class="confirm-table-header">お問い合わせ内容</td>
                    <td class="confirm-table-text">
                        <textarea readonly class="confirm-table-text-detail" name="detail" rows="4">{{ $contact['detail'] }}</textarea>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form-button">
            <button class="form-button-submit" type="submit">送信</button>
            <a class="form-button-fix" href="javascript:history.back();">修正</a>
        </div>
    </form>
</div>
@endsection