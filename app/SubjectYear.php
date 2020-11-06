<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectYear extends Model
{
    protected $fillable=['years','k1','k2','k3','p1','p2','p3','p4','p5','p6','setting'];

    public function subjects(){
      return $this->hasMany(Subject::class);
    }
    public function studentyear(){
      return $this->hasMany(StudentYear::class);
    }
}
