<?php


use App\Http\Telegram\Handle;
use Illuminate\Support\Facades\Route;

Route::prefix('telegram')->group(function (){
    Route::post('/{token}/webhook', Handle::class);
});
