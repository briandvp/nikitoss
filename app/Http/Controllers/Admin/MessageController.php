<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     */
    public function index()
    {
        $messages = Message::latest()->get();
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified message.
     * Marks the message as read if it isn't already.
     */
    public function show(Message $message)
    {
        if (!$message->read) {
            $message->update(['read' => true]);
        }
        return view('admin.messages.show', compact('message'));
    }

    /**
     * Remove the specified message from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
