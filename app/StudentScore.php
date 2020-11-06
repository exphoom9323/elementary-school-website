<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentScore extends Model
{
    protected $fillable=['student_years_id','subject_id','score','user_id'];

    public function studentyear(){
      return $this->belongsTo(StudentYear::class);
    }
}
