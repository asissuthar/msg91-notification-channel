<?php

namespace Illuminate\Notifications;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;
use Msg91\OtpClient;
use Msg91\SmsClient;

class Msg91ChannelServiceProvider extends ServiceProvider
{
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('otp', function ($app) {
                return new Channels\Msg91OtpChannel($this->app->make(OtpClient::class));
            });

            $service->extend('sms', function ($app) {
                return new Channels\Msg91SmsChannel($this->app->make(SmsClient::class));
            });
        });
    }
}
