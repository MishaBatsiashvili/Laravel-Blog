<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(){
        $user = request()->user();
        return view('account.index', compact('user'));
    }

    public function update(Request $request){
        $attr = $request->validate([
            'name' => 'string|unique:users,name'
        ]);

        User::find($request->user()->id)->update($attr);

        return redirect(route('account.index'))->with([
            'success' => [
                'primary' => 'Profile name updated'
            ]
        ]);
    }
}
