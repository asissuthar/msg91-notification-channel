<?php

namespace Illuminate\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Msg91\SmsClient;

class Msg91SmsChannel
{
    protected $smsClient;

    public function __construct(SmsClient $smsClient)
    {
        $this->smsClient = $smsClient;
    }

    public function send($notifiable, Notification $notification)
    {
        if (!$to = $notifiable->routeNotificationFor('sms', $notification)) {
            return;
        }

        if (!method_exists($notification, 'toSms')) {
            return;
        }

        $message = $notification->toSms($notifiable);

        $this->smsClient
            ->setTo($to)
            ->setMessage($message->message);

        if (isset($message->route)) {
            $this->smsClient->setRoute($message->route);
        }

        if (isset($message->country)) {
            $this->smsClient->setCountry($message->country);
        }

        if (isset($message->country)) {
            $this->smsClient->setCountry($message->country);
        }

        return $this->smsClient->send();
    }
}
