<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\User;

class InstadeckProfileController extends Controller
{
    public function index(Request $request, $username)
    {
        $user = User::whereUsername($username)->firstOrFail();

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        // Using Illuminate\Support\Facades\Cache
        // $postsCount = Cache::remember('count.posts.' . $user->id, now()->addSeconds(30), function () use ($user) {
        //     return $user->posts->count();
        // });
        // $followersCount = Cache::remember('count.followers.' . $user->id, now()->addSeconds(30), function () use ($user) {
        //     return $user->profile->followers->count();
        // });
        // $followingCount = Cache::remember('count.following.' . $user->id, now()->addSeconds(30), function () use ($user) {
        //     return $user->following->count();
        // });
        $postsCount = $user->posts->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        // WITHOUT using App\User
        // $user = User::findOrFail($user);
        // return view('/index', [
        //     'user' => $user,
        // ]);
        return view('/profile', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    public function edit(Request $request, $username)
    {
        $user = User::whereUsername($username)->firstOrFail();

        $this->authorize('update', $user->profile);

        return view('/edit', compact('user'));
    }

    public function update(Request $request, $username)
    {
        $user = User::whereUsername($username)->firstOrFail();

        $this->authorize('update', $user->profile);

        $dhsData = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => 'image',
        ]);
        
        if (request('image')) {
            if ($user->profile->image != 'profile/default_user.png') {
                $dhsImageDestroy = public_path("storage/{$user->profile->image}");
                unlink($dhsImageDestroy);
            }
            
            $dhsImagePath = request('image')->store('profile', 'public');
            $dhsImage = Image::make(public_path("storage/{$dhsImagePath}"))->fit(800, 800);
            $dhsImage->save();

            auth()->user()->profile()->update(array_merge(
                $dhsData,
                ['image' => $dhsImagePath]
            ));
        } else {
            auth()->user()->profile()->update($dhsData);
        }

        return redirect("/profile/{$username}");
    }
}