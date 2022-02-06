<?php

namespace App\Services;

class ConvertKitNewsletter implements Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        // subscribe user with ConvertKit specific
        // api requests.
    }
}

