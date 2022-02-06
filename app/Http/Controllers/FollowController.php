<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function store(User $user){
        Follow::create([
            'follower_id' => auth()->user()->id,
            'following_id' => $user->id
        ]);
        return back();
    }

    public function destroy(User $user){
        $followRecord = Follow::where('following_id', $user->id)
            ->where('follower_id', auth()->user()->id)
            ->first();

        $followRecord->delete();

        return back();
    }
}
