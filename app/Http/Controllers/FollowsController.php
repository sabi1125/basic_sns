<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class FollowsController extends Controller
{
    
/*
setting up the toggle for follows         
*/
        
    public function store(User $user)
    {

        return auth()->user()->following()->toggle($user->profile);

    }
}
