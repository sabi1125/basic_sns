<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Storage;
class ProfilesController extends Controller
{



    public function index(User $user)
    {
        return view("welcome");
    }




    public function show(User $user)
    {




        if(auth()->user()){
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        if(auth()->user()->profile == null){
            return view("profiles.create",compact("user"));
        }else{
            return view('profiles.show',compact("user","follows"));
        }
        }else{
            return view("auth.login");
        }
    }



    public function create(User $user)
    {
        return view("profiles.create",compact("user"));
    }


    public function store(){
        
        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            "images"=>["","image"]
        ]);
      


        $check = request("images");

        
        if($check !== null){

            $img= request("images")->store("uploads","s3");

            $imagePath = Storage::disk("s3")->url($img);
    
    
            auth()->user()->profile()->create([
                
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"],
                "images"=>$imagePath
            ]);
    
    
            return redirect("/profile/" . auth()->user()->id);
        }else{
            
    
            auth()->user()->profile()->create([
              
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"]
                            ]);
    
            return redirect("/profile/" . auth()->user()->id);
    
        }
    }



    
    
    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);
        return view("profiles.edit",compact("user"));

    }


    public function update(User $user)
    {
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            "images"=>["","image"]
        ]);


        $check = request("images");

        
        if($check !== null){

            $img= request("images")->store("uploads","s3");

            $imagePath = Storage::disk("s3")->url($img);
    
    
            auth()->user()->profile()->update([
                
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"],
                "images"=>$imagePath
            ]);
    
    
            return redirect("/profile/" . auth()->user()->id);
        }else{
            
    
            auth()->user()->profile()->update([
              
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"]
            ]);
    
            return redirect("/profile/" . auth()->user()->id);
    
        }        return redirect("/profile/{$user->id}");
    }

    


    
}
