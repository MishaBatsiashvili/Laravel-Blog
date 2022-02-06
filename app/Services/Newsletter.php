<?php

namespace App\Services;

/*
Interface defines a contract to which any implementers of this
interface must conform.
*/
interface Newsletter {
    public function subscribe(string $email, string $list = null);

    public function getClient();
}


