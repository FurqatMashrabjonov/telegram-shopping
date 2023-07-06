<?php

namespace Modules\SmsProviders\Application\Service\Playmobile;

use App\Models\SmsProvider;
use App\Services\Intefaces\SendSmsInterface;
use Illuminate\Support\Facades\Http;

class PlayMobileClient implements SendSmsInterface
{
    private SmsProvider|null $provider;
    private string $baseUrl = 'http://91.204.239.44/broker-api/send';

    public function __construct()
    {
        $this->provider = SmsProvider::playMobile()->first();
    }

    public final function sendSms(string $phone, string $message): int
    {
        if (!is_null($this->provider)) {
            $data = [
                'messages' => [
                    'recipient' => $phone,
                    'message-id' => (string)random_int(10000, 99999),
                ],
                'sms' => [
                    'originator' => $this->provider->origin,
                    'content' => [
                        'text' => $message
                    ]
                ]
            ];
            $sendSms = Http::withHeaders([
                'Content-type' => 'application/json',
                'charset' => 'UTF-8'
            ])->withBasicAuth($this->provider->login, $this->provider->password)
                ->post($this->baseUrl, $data);

            return $sendSms->status();
        }

        return 404;
    }
}
