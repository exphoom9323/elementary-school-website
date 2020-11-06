<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable=['post_id','image'];

     public function posts(){
       return $this->belongsTo(Post::class);
     }

}
