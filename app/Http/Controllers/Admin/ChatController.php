<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class ChatController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', __('chat.title'));
        View::share('actionRoute', route('chats.create'));
        View::share('actionName', __('chat.create'));
    }

    public function index()
    {
        return view('admin.chats.index');
    }
}
