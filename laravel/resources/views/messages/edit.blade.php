@extends('layouts.app')

@section('content')
    <h1>id: {{ $message->id }} のメッセージ編集ページ</h1>
    <div class="row">
        <div class="col-6">
            <form action="{{ route('messages.update', $message->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="content">メッセージ:</label>
                    <input type="text" id="content" name="content" class="form-control" value="{{ old('content', $message->content) }}" required>
                </div>
    
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </div>
    </div>
@endsection
