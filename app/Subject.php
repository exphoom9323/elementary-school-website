<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable=['subject_year_id','studentyear','name','type','credit'];

    public function subjectyears(){
      return $this->belongsTo(SubjectYear::class);
    }

}
