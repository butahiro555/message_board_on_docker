<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::all();
	
		return view('messages.index', [
			'messages' => $messages,
		]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	    $message = new Message;

	    return view('messages.create', [
		    'message' => $message,
		]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $latestMessage = session('latest_message');
        $currentTime = now();

    if ($latestMessage && $latestMessage === $request->content) {
        $lastMessageTime = session('latest_message_time');
        
        if ($lastMessageTime && $currentTime->diffInSeconds($lastMessageTime) < 10) {
            // 同じメッセージが1分以内に送信された場合
            return redirect()->back()->withErrors(['message' => '同じメッセージは連続で投稿できません。']);
        }
    }

    // 成功した場合、最新のメッセージとその投稿時刻をセッションに保存
    session(['latest_message' => $request->content, 'latest_message_time' => $currentTime]);

    // メッセージを保存するロジック
    $message = new Message;
    $message->content = $request->content;
    $message->save();

    return redirect('/messages');    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $message = Message::findOrFail($id);

        return view('messages.show', [
			'message' => $message,
		]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $id)
    {
        $message = Message::find($id);

        return view('messages.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $message = Message::find($id);
        $message->content = $request->content;
        $message->save();

        return redirect('/messages');
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect('/messages');
    }
}
