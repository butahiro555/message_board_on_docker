@extends('layouts.app')

@section('content')

    <h1>message list</h1>

    @if (count($messages) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $message)
                <tr>
                    <td><a href="{{ url('messages/' . $message->id) }}">{{ $message->id }}</a></td>
		    	    <td>{{ $message->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
	@endif
	<a href="{{ route('messages.create') }}" class="btn btn-primary">新規メッセージの投稿</a>
@endsection

