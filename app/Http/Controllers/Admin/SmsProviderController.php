<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SmsProviderController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', __('sms-provider.title'));
        View::share('actionRoute', route('sms-providers.create'));
        View::share('actionName', __('sms-provider.create'));
    }

    public function index()
    {
        return view('admin.sms-providers.index');
    }
}
