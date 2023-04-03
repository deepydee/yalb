<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormMessage;

class MainController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showMessages()
    {
        $messages = FormMessage::orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    public function showMessage($id)
    {
        $message = FormMessage::findOrFail($id);

        return view('admin.messages.single', compact('message'));
    }

    public function deleteMessage($id)
    {
        if (FormMessage::destroy($id)) {
            return redirect()->route('admin.messages.index')
                ->with('success', 'Сообщение удалено');
        }
    }
}
