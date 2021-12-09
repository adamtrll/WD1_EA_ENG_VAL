<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->paginate(10);
        return view('user.show', compact('user', 'posts'));
    }

    public function follow(User $user)
    {
        if ($user == Auth::user() && Auth::user()->isFollowing($user)) {
            return back();
        }

        $user->followers()->attach(Auth::user());

        return back()->with('success', __('User followed successfully'));
    }

    public function unfollow(User $user)
    {
        if ($user == Auth::user() || !Auth::user()->isFollowing($user)) {
            return back();
        }

        $user->followers()->detach(Auth::user());

        return back()->with('success', __('User unfollowed successfully'));
    }
}
