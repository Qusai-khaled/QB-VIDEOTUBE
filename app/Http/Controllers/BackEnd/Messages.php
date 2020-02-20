<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackEnd\Messages\Store;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Messages extends Controller
{
    public function index()
    {
        $messages = Message::Paginate(5);
        return view('back-end.messages.index')->with('messages', $messages);
    }
    public function show($id)
    {
        $messages = Message::findOrFail($id);
        return view('back-end.messages.show')->with('messages', $messages);
    }

    public function replay($id, Store $request)
    {
        $message = Message::findOrFail($id);
        Mail::send(new ReplayContact($message, $request->message));
        return redirect(route('messages.index'));
    }

    public function destroy($id)
    {
        Message::findOrFail($id)->delete();
        return redirect(route('messages.index'));
    }
}
