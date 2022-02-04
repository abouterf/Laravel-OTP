<?php

namespace Abouterf\LaravelMobileAuth\traits;

trait HasMobileAuth
{

//    this function works the same as __constructor. (initialize + trait name)
    public function initializeHasMobileAuth()
    {
        $this->fillable[] = 'phone';
        $this->fillable[] = 'attempts_left';
        $this->fillable[] = 'must_login_with_otp';
    }
}
