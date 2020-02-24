<?php

namespace Illuminate\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Msg91\OtpClient;

class Msg91OtpChannel
{
    protected $otpClient;

    public function __construct(OtpClient $otpClient)
    {
        $this->otpClient = $otpClient;
    }

    public function send($notifiable, Notification $notification)
    {
        if (!$mobile = $notifiable->routeNotificationFor('otp', $notification)) {
            return;
        }

        if (!method_exists($notification, 'toOtp')) {
            return;
        }

        $message = $notification->toOtp($notifiable);

        $this->otpClient->setMobile($mobile);

        if (isset($message->invisible)) {
            $this->otpClient->setInvisible($message->invisible);
        }

        if (isset($message->otp)) {
            $this->otpClient->setOTP($message->otp);
        }

        if (isset($message->userIP)) {
            $this->otpClient->setUserIP($message->userIP);
        }

        if (isset($message->email)) {
            $this->otpClient->setEmail($message->email);
        }

        if (isset($message->otpLength)) {
            $this->otpClient->setOTPLength($message->otpLength);
        }

        if (isset($message->otpExpiry)) {
            $this->otpClient->setOTPExpiry($message->otpExpiry);
        }

        return $this->otpClient->send();
    }
}
