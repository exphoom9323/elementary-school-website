<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCriteria extends Model
{
    protected $fillable=['student_years_id','subject_id','criteria','user_id'];

    public function studentyear(){
      return $this->belongsTo(StudentYear::class);
    }
}
