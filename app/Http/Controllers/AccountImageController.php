<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AccountImageController extends Controller
{
    public function store(Request $request){
        $attr = $request->validate([
            'image' => 'required|image'
        ]);

        $attr['image'] = $attr['image']->store('profile_images');

        $flashed = [];
        User::where('id', $request->user()->id)->update($attr);
        $flashed = [
            'success' => [
                'primary' => 'Picture Saved',
                'secondary' => 'Your profile picture has been updated'
            ]
        ];
        try{
        }
        catch (Exception $e) {
            //
            dd($e);
        }

        return redirect(route('account.index'))->with($flashed);
    }
}
