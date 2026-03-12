@extends('admin')
@section('links')
<div class="pagination-right">
    {{ $contacts->links() }}
</div>
@endsection
@section('results')
@foreach ($contacts as $contact)
<tr class="contact-table-row">
    <td class="contact-table-item">
        <span class="results-item results-item-name">{{ $contact->last_name. '　'. $contact->first_name }}</span>
        <span class="results-item results-item-gender">
            {{ ($contact->gender == '1' ? '男' : ($contact->gender == '2' ? '女' : 'その他')) }}
        </span>
        <span class="results-item results-item-email">{{ $contact->email }}</span>
        <span class="results-item results-item-category">{{ $contact->category->content }}</span>
        <form action="/admin/search" method="get">
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <span class="detail-button">
                <button class="detail-button-submit" type="submit">詳細</button>
            </span>
        </form>
    </td>
</tr>
@endforeach
@if(isset($contactDetail))

<div class="modal">
    <div class="modal-content">
        <form class="modal-content-form" action="/admin" method="get">
            <button class="close-button" type="submit">×</button>
        </form>
        <div class="modal-content-header">
            <span class="modal-content-header-title">お名前</span>
            <span class="modal-content-header-item">{{ $contactDetail->last_name }} {{ $contactDetail->first_name }}</span>
        </div>
        <div class="modal-content-header">
            <span class="modal-content-header-title">性別</span>
            <span class="modal-content-header-item">{{ $contactDetail->gender }}</span>
        </div>
        <div class="modal-content-header">
            <span class="modal-content-header-title">メールアドレス</span>
            <span class="modal-content-header-item">{{ $contactDetail->email }}</span>
        </div>
        <div class="modal-content-header">
            <span class="modal-content-header-title">電話番号</span>
            <span class="modal-content-header-item">{{ $contactDetail->tel }}</span>
        </div>
        <div class="modal-content-header">
            <span class="modal-content-header-title">住所</span>
            <span class="modal-content-header-item">{{ $contactDetail->address }}</span>
        </div>
        <div class="modal-content-header">
            <span class="modal-content-header-title">住所</span>
            <span class="modal-content-header-item">{{ $contactDetail->building }}</span>
        </div>
        <div class="modal-content-header">
            <span class="modal-content-header-title">お問い合わせの種類</span>
            <span class="modal-content-header-item">{{ $contactDetail->category->content }}</span>
        </div>
        <div class="modal-content-header">
            <span class="modal-content-header-title">お問い合わせ内容</span>
            <span class="modal-content-header-item">{{ $contactDetail->detail }}</span>
        </div>
        <form action="/admin/delete" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $contactDetail->id }}">

            <button class="delete-button">削除</button>
        </form>
    </div>
</div>

@endif
@endsection