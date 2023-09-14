{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')
@section('title', '日記の新規作成')

{{-- admin.blade.phpの@yield('title')に'プロフィール入力画面'を埋め込む --}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>乗馬日記新規作成</h2>
            <form action="{{ route('admin.news.create') }}" method="post" enctype="multipart/form-data">
                
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2">タイトル</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>
                <div class="form-group row">
                    {{-- 騎乗馬プルダウンを追加 --}}
                    <label class="col-md-2">騎乗馬</label>
                    <div class="col-md-4">
                        <select name= "horse">
                            @foreach($horses as $horse)
                                <option value ={{ $horse->name }} >{{ $horse->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">本文</label>
                    <div class="col-md-10">
                    <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                　　</div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2">画像</label>
                    <div class="col-md-10">
                        <input type="file" class="form-control-file" name="image">
                    </div>
                </div>
                @csrf
                <input type="submit" class="btn btn-primary" value="更新">
            </form>    
        </div>
    </div>
</div>
@endsection
