@extends('layouts.app')

@section('content')
    <h1>id = {{ $message->id }} のメッセージ詳細ページ</h1>

    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <td>{{ $message->id }}</td>
        </tr>
        <tr>
            <th>メッセージ</th>
            <td>{{ $message->content }}</td>
        </tr>
    </table>
    <a href="/messages/{{ $message->id }}/edit" class="btn btn-light">このメッセージを編集</a>

    <form action="/messages/{{ $message->id }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">削除</button>
    </form>
@endsection

