<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\InstadeckPost;

class InstadeckPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('instadeck.auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('instadeck_profiles.user_id');

        $posts = InstadeckPost::whereIn('user_id', $users)->with('user')->orderBy('created_at', 'DESC')->get(); // or paginate(number) to paginate

        return view('/index', compact('posts'));
    }
    
    public function create()
    {
        return view('/create');
    }

    public function store()
    {
        $dhsData = request()->validate([
            'image' => 'required|image',
            'caption' => 'required',
        ]);

        $dhsImagePath = request('image')->store('uploads', 'public');

        $dhsImage = Image::make(public_path("/storage/{$dhsImagePath}"))->fit(1200, 1200);
        $dhsImage->save();
        
        auth()->user()->posts()->create([
            'image' => $dhsImagePath,
            'caption' => $dhsData['caption'],
        ]);

        return redirect('/profile/' . auth()->user()->username);
    }

    public function show(InstadeckPost $post)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($post->user->id) : false;

        return view('/show', compact('post', 'follows'));
    }
}