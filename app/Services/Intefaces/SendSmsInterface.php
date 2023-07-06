<?php

namespace App\Services\Intefaces;

interface SendSmsInterface
{
    public function sendSms(string $phone, string $message): int;
}
