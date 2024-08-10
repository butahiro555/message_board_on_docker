@extends('layouts.app')
 
@section('content')
 
    <h1>メッセージ新規作成ページ</h1>

    <!-- エラーメッセージの表示 -->
    @if ($errors->has('message'))
        <div class="alert alert-danger">
            {{ $errors->first('message') }}
        </div>
    @endif

    <div class="row">
        <div class="col-6">
            <form action="{{ route('messages.store') }}" method="POST">
                @csrf  <!-- CSRFトークンを挿入します -->
    
                <div class="form-group">
                    <label for="content">メッセージ:</label>
                    <input type="text" id="content" name="content" class="form-control" value="{{ old('content') }}" required>
                </div>
    
                <button type="submit" class="btn btn-primary">投稿</button>
            </form>
        </div>
    </div>
 
@endsection
