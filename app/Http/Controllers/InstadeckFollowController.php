<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class InstadeckFollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('instadeck.auth');
    }
    
    public function store(User $user)
    {
        return auth()->user()->following()->toggle($user->profile);
    }
}