<?php

namespace App\Sms;

interface SmsInterface
{
    public function sendSms($to, $from, $message);
}