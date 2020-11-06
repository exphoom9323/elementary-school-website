<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
  protected $fillable=['title','description','content','image','category_id']; //FK ห้ามมี s ตมมหลัง

  public function deleteImage(){
      Storage::delete($this->image);
  }
  public function category(){
    return $this->belongsTo(Category::class); //Categort.php PK (One - One) 1บทความมีได้ 1 ประเภท
  }
  public function tags(){
    return $this->belongsToMany(Tag::class);
  }
  public function postimages(){
    return $this->hasMany(PostImage::class);
  }
  public function hasTag($tagId){
    return in_array($tagId,$this->tags->pluck('id')->toArray());
  }
}
