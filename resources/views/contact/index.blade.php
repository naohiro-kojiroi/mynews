@extends('layouts.front')
@section('title', '問い合わせフォーム')

@section('content' )
<div class="container">
<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf
    
    <div class="row">
    <label>メールアドレス(mailaddress)</label>
    <input
        name="email"
        value="{{ old('email') }}"
        type="text">
    @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
    @endif
    </div>
    
    <div class="row">
    <label>タイトル(title)</label>
    <input
        name="title"
        value="{{ old('title') }}"
        type="text">
    @if ($errors->has('title'))
        <p class="reeor-message">{{ $errors->first('title') }}</p>
    @endif
    </div>
    
    <div class="row">
    <label>お問い合わせ内容(Content of inquiry)</label>
    <input
        name="body"
        value="{{ old('body') }}"
        type="text">
    @if ($errors->has('body'))
        <p class="error-message">{{ $errors->first('body') }}</p>
    @endif
    </div>
    
    <div class="row">
    <button type="submit">入力内容確認(Input content confirmation)</button>
    </div>
</form>
</div>
@endsection
