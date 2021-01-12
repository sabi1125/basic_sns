<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        "username",
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function profile()
    {
         /*
            Every user has one profile
            -- setting up one to one relation
        */
        return $this->hasOne(Profile::class);

    }

    public function posts()
    {

         /*
            Every user can have many posts
            -- setting up one to many relation 
         */
        return $this->hasMany(Post::class)->orderBy("created_at","DESC");
    }

    public function following()
    {

        
         /*
            Every user can follow multiple profiles and vise versa
            -- setting up many to many relation 
         */


        return $this->belongsToMany(Profile::class);
    }
}
