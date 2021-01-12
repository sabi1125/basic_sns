<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class SearchController extends Controller
{
    public function search(User $user,$uname)
    {
        
        $usename=[$uname];
        $collection =collect($user->where("username",$usename)->pluck("id"));
        $id=$collection->implode("",",");
        return redirect("/profile/" . $id );

    }
}
