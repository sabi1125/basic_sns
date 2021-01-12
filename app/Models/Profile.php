<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    


    protected $guarded = [];
    public function user()
    {
         /*
         every profile must only have one user    
         -- setting up one to one relation 
        */
        
        return $this->belongsTo(User::class);

    }

    public function followers()

    {

         /*
        profiles can be followed by many other profiles 
        -- setting up many to many relation    
        */
        return $this->belongsToMany(User::class);
    }
}
