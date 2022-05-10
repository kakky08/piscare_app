<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function show($name)
    {
        $user = User::where('name', $name)->first();
        $posts = $user->postRecipe->sortByDesc('created_at');
        return view('mypage.profile.show', compact('user', 'posts'));
    }

    public function likes($name)
    {
        $user = User::where('name', $name)->first();
        $posts = $user->postLikes->sortByDesc('created_at');
        return view('mypage.profile.likes', compact('user', 'posts'));
    }

    public function followings($name)
    {
        $user = User::where('name', $name)->first();
        $followings = $user->followers->sortByDesc('created_at');
        return view('mypage.profile.followings', compact('user', 'followings'));
    }

    public function followers($name)
    {
        $user = User::where('name', $name)->first();
        $followers = $user->followers->sortByDesc('created_at');
        return view('mypage.profile.followers', compact('user', 'followers'));
    }
}
