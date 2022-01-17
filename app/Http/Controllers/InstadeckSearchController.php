<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstadeckPost;
use App\Models\User;
use App\Models\InstadeckProfile;

class InstadeckSearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('instadeck.auth');
    }

    public function index()
    {
        $posts = InstadeckPost::all();

        return view('/explore', compact('posts'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $data = User::join('instadeck_profiles', 'users.id', '=', 'instadeck_profiles.user_id')
                    ->where('users.username', 'like', "%{$search}%")
                    ->where('instadeck_profiles.title', 'like', "%{$search}%")
                    ->orwhere('users.fullname', 'like', "%{$search}%")
                    ->where('instadeck_profiles.title', 'like', "%{$search}%")
                    ->with('profile')->get();

        $user = json_decode($data);

        return view('/explore', compact('user'));
    }
}