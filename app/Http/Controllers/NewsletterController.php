<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Newsletter;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function store(Newsletter $newsletter){
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added'
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for newsletter');
    }

    private function getUserFollowers(){
        $followers = User::find(auth()->user()->id)->followers;
        $followerMails = [];
        foreach($followers as $follower){
            array_push($followerMails, $follower->email);
        }
        return $followerMails;
    }
}
