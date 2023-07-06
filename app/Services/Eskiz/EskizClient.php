<?php

namespace Modules\SmsProviders\Application\Service\Eskiz;

use App\Models\SmsProvider;
use App\Services\Intefaces\SendSmsInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class EskizClient implements SendSmsInterface
{
    private string $smsEndpoint = 'https://notify.eskiz.uz/api/message/sms/send';

    private SmsProvider|null $provider;

    public function __construct()
    {
        $this->provider = SmsProvider::eskiz()->first();
    }

    public final function sendSms(string $phone, string $message): int
    {
        if (!is_null($this->provider)) {
            $request = $this->send($phone, $message);
            $response = $request->object();
            Log::info('eskiz sms send', (array)$response);
            if ($response->status == 'token-invalid') {
                $token = EskizGetTokenService::getToken($this->provider);
                $this->provider->token = $token;
                $this->provider->save();
                $this->send($phone, $message);
            }

            return $request->status();
        }

        return 404;
    }

    private function send(string $phone, string $message): Response
    {
        return Http::withToken($this->provider->token)->post($this->smsEndpoint, [
            'mobile_phone' => Str::replace('+', '', $phone),
            'message' => $message,
            'from' => $this->provider->origin
        ]);
    }
}
