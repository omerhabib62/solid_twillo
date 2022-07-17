<?php

namespace App\Sms;

use Twilio\Rest\Client;

class TwilioSms implements SmsInterface
{
    protected $client;

    public function __construct($sid, $authToken)
    {
        $this->client = new Client($sid, $authToken);
    }

    public function sendSms($to, $from, $message)
    {
        $message = $this->client->messages->create($to, [
            'from' => $from,
            'body' => $message,
        ]);
        return $message->sid;
    }
}
