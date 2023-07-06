<?php

namespace Modules\SmsProviders\Application\Service\Eskiz;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Modules\SmsProviders\Domain\Entities\SmsProvider;

class EskizGetTokenService
{
    public static function getToken(SmsProvider $smsProvider): ?string
    {
        $request = Http::post('https://notify.eskiz.uz/api/auth/login', [
            'email' => $smsProvider->login,
            'password' => $smsProvider->password
        ])->object();
        Log::info('get token request', (array)$request);

        return $request->data->token ?? null;
    }
}
