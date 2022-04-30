<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivacyController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('mypage.privacy.privacy', compact('user'));
    }
}
