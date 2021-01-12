<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Storage;

class PostsController extends Controller
{


/*

authentication for the pages 

*/
    public function __construct(){
        $this->middleware("auth");
    }
    public function create()
    {
        return view("posts.create");
    }

    public function store()
    {
        $data = request()->validate(
            [
            "post"=>"required",
            "images"=>["","image"]
            ]
        );

        $check = request("images");

        
/*
checking and saving the images and post data        
*/
        
        
        if($check !== null){

            $img= request("images")->store("uploads","s3");

            $imagePath = Storage::disk("s3")->url($img);
    
    
            auth()->user()->posts()->create([
                
                "post"=>$data["post"],
                "images"=>$imagePath
            ]);
    
    
            return redirect("/profile/" . auth()->user()->username);
        }else{
            
    
            auth()->user()->posts()->create([
              
                "post"=>$data["post"]
            ]);
    
    
            return redirect("/profile/" . auth()->user()->username);
        }
    }


    public function index()
    {
        
        $users = auth()->user()->following()->pluck("profiles.user_id");
        $posts = Post::whereIn("user_id",$users)->orderBy("created_at","DESC")->get();
        $user = auth()->user();
        return view("posts.index",compact("posts","user"));

        
    }
    public function show(Post $post)
    {

        return view("posts.show",compact("post"));
    }




}
