<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbumImage extends Model
{
  protected $fillable=['album_id','image'];

   public function albums(){
     return $this->belongsTo(Album::class);
   }
}
