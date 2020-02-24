<?php

namespace Illuminate\Notifications\Messages;

class Msg91SmsMessage
{
    public $route;
    public $country;
    public $message;
    public $to;
    
    public function __construct($message)
    {
        $this
            ->setMessage($message);
    }

    public function setRoute(string $route): Msg91SmsMessage
    {
        $this->route = $route;
        return $this;
    }

    public function setCountry(string $country): Msg91SmsMessage
    {
        $this->country = $country;
        return $this;
    }

    public function setMessage($message): Msg91SmsMessage
    {
        $this->message = $message;
        return $this;
    }

    public function setTo($to): Msg91SmsMessage
    {
        $this->to = $to;
        return $this;
    }
}