<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatDetail;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function userChat($chat_id)
    {
        $chat = Chat::findOrFail($chat_id);
        if (Auth::id() !== $chat->user_id && Auth::id() !== $chat->driver_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses ke chat ini.');
        }

        $messages = ChatDetail::where('chat_id', $chat->chat_id)
            ->orderBy('date_time', 'asc')
            ->get();

        return view('pengguna.chat.index', compact('messages', 'chat'));
    }

    // ini masih kena celah
    // public function driverChat($chat_id)
    // {
    //     $chat = Chat::findOrFail($chat_id);
    //     if (Auth::id() !== $chat->user_id && Auth::id() !== $chat->driver_id) {
    //         return redirect()->back()->with('error', 'Anda tidak memiliki akses ke chat ini.');
    //     }

    //     $messages = ChatDetail::where('chat_id', $chat->chat_id)
    //         ->orderBy('date_time', 'asc')
    //         ->get();
    //     $pickupId = request('pickup_id');

    //     return view('driver.chat.index', compact('messages', 'chat','pickupId'));
    // }

    public function driverChat($chat_id)
{
    $chat = Chat::findOrFail($chat_id);

    // Cek apakah user login adalah driver (role 3)
    if (Auth::user()->role !== 3) {
        return abort(403, 'Hanya driver yang dapat mengakses halaman ini.');
    }

    // Pastikan driver hanya bisa akses chat miliknya
    if (Auth::id() !== $chat->driver_id) {
        return abort(403, 'Anda tidak memiliki akses ke chat ini.');
    }

    $messages = ChatDetail::where('chat_id', $chat->chat_id)
        ->orderBy('date_time', 'asc')
        ->get();

    $pickupId = request('pickup_id');

    return view('driver.chat.index', compact('messages', 'chat', 'pickupId'));
}



    // Kirim pesan
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'chat_id' => 'required|exists:chats,chat_id',
        ]);

        ChatDetail::create([
            'chat_id' => $request->chat_id,
            'user_id' => Auth::id(),
            'detail_chat' => $request->message,
            'photos' => '',
            'date_time' => now(),
        ]);

        return response()->json(['status' => 'success']);
    }

    // Ambil pesan
    public function getMessages(Request $request)
    {
        // $messages = ChatDetail::with('user')
        //     ->where('chat_id', $request->chat_id)
        //     ->orderBy('date_time', 'asc')
        //     ->get();

        // return response()->json($messages);
        $messages = ChatDetail::with('user')
            ->where('chat_id', $request->chat_id)
            ->orderBy('date_time', 'asc')
            ->get()
            ->map(function ($msg) {
                return [
                    'user_id' => $msg->user_id,
                    'detail_chat' => $msg->detail_chat,
                    'date_time' => $msg->date_time->toIso8601String(), // ⬅ ini yang bikin jamnya konsisten
                    'user' => [
                        'name' => optional($msg->user)->name
                    ]
                ];
            });

        return response()->json($messages);
    }

    public function driverChatList()
    {
        $driverId = Auth::id(); // Ambil ID driver yang sedang login

        $chats = Chat::with(['user']) // relasi user buat nampilin nama user
            ->where('driver_id', $driverId)
            ->orderBy('date_time_created', 'desc')
            ->get();

        return view('driver.chat.list', compact('chats'));
    }

}
