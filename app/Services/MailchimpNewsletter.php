<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    public function __construct(protected ApiClient $client){

    }

    public function subscribe(string $email, string $list = null){
        $list = $list ?? config('services.mailchimp.lists.subscribers');
        $mailchimp = $this->client;

        return $mailchimp->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed'
        ]);
    }

    public function getClient(){
        return $this->client;
    }
}

