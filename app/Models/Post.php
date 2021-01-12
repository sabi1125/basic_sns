<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
 /*

   every post has only one user
   -- setting up one to one relation
 */
        return $this->belongsTo(User::class);

    }
}
