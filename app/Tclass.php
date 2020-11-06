<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tclass extends Model
{
    protected $fillable=['subject_year_id','studentyear'];

    public function homeroom(){
      return $this->belongsToMany(User::class);
    }
    public function hasUser($userId){
      return in_array($userId,$this->users->pluck('id')->toArray());
    }
}
