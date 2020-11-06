<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable=['name'];

    public function albumimages(){
      return $this->hasMany(AlbumImage::class);
    }
}
