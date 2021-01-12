<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class SearchController extends Controller
{
    public function search($profile)
    {
        $find = User::where("username",$profile)->first();
        



        if($find){
            return redirect("/profile/" . $profile  );
        }else{
            return redirect("/");
        }
        
    }
}
