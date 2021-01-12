<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Storage;
use Image;
class ProfilesController extends Controller
{



    public function index(User $user)
    {
        if(auth()->user()->profile == null){
            return view("profiles.create",compact("user"));
        }else{
            $user = auth()->user();
            return view("welcome",compact("user"));
        }
    }




    public function show($profile)
    {


/*
checking if the searched profile is followed or not and showing the profiles
*/

$user=User::where("username",$profile)->first();



        if(auth()->user()){
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;



/*
making sure that the profiles established before the user can browse other pages         
*/
        

        if(auth()->user()->profile == null){                                                                    
            return view("profiles.create",compact("user"));
        }else{
            return view('profiles.show',compact("user","follows"));
        }
        }else{

            
/*
redirect        
*/
        
            return view("auth.login");
        }
    }



    public function create(User $user)
    {
        
        return view("profiles.create",compact("user"));
    }


    public function store(){
    
 
/*
passing the data of the profile to the database        
*/
               

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            "images"=>["","image"]
        ]);
      


        $check = request("images");

        
        if($check !== null){

            $img= request("images")->store("uploads","s3");

/*
storing the images in amazons3        
*/
        
            $imagePath = Storage::disk("s3")->url($img);
    
    
            auth()->user()->profile()->create([
                
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"],
                "images"=>$imagePath
            ]);
    
    
            return redirect("/" );
        }else{
            
    
            auth()->user()->profile()->create([
              
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"]
                            ]);
    
            return redirect("/" );
    
        }
    }



    
    
    public function edit($profile)
    {
        $user=User::where("username",$profile)->first();
        $this->authorize('update',$user->profile);
        return view("profiles.edit",compact("user"));

    }


    public function update($profile)
    {
        $user = User::where("username",$profile)->first();

        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'url'=>'url',
            "images"=>["","image"]
        ]);


        $check = request("images");

  
/*
checking if the images section is filled        
*/
              
        if($check !== null){

            $img= request("images")->store("uploads","s3");

            $imagePath = Storage::disk("s3")->url($img);
    
    
            auth()->user()->profile()->update([
                
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"],
                "images"=>$imagePath
            ]);
    
    
            return redirect("/profile/" . auth()->user()->username);
        }else{
            
    
            auth()->user()->profile()->update([
              
                "title"=>$data["title"],
                "description"=>$data["description"],
                "url"=>$data["url"]
            ]);
    
            return redirect("/profile/" . auth()->user()->username);
    
        }        return redirect("/profile/{$user->username}");
    }



        


    
}
