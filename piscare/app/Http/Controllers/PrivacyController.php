<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivacyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mypage.privacy.app', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::where('id', $request->user_id)->first();
        if (isset($request->email))
        {
            $user->email = $request->email;
            $user->update();
        }

        return redirect()->route('privacy.index');
    }
}
