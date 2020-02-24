<?php

namespace Illuminate\Notifications\Messages;

class Msg91OtpMessage
{
    public $extraParams;
    public $mobile;
    public $invisible;
    public $otp;
    public $userIP;
    public $email;
    public $otpLength;
    public $otpExpiry;

    public function __construct($otp)
    {
        $this
            ->setOTP($otp);

    }

    public function setExtraParams(array $extraParams): Msg91OtpMessage
    {
        $this->extraParams = json_encode($extraParams);
        return $this;
    }

    public function setMobile(int $mobile): Msg91OtpMessage
    {
        $this->mobile = $mobile;
        return $this;
    }

    public function setInvisible(bool $invisible): Msg91OtpMessage
    {
        $this->invisible = $invisible ? 1 : 0;
        return $this;
    }

    public function setOTP(int $otp): Msg91OtpMessage
    {
        $this->otp = $otp;
        return $this;
    }

    public function setUserIP(string $userIP): Msg91OtpMessage
    {
        $this->userIP = $userIP;
        return $this;
    }

    public function setEmail(string $email): Msg91OtpMessage
    {
        $this->email = $email;
        return $this;
    }

    public function setOTPLength(int $otpLength): Msg91OtpMessage
    {
        $this->otpLength = $otpLength;
        return $this;
    }

    public function setOTPExpiry(int $otpExpiry): Msg91OtpMessage
    {
        $this->otpExpiry = $otpExpiry;
        return $this;
    }
}