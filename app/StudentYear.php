<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentYear extends Model
{
    protected $fillable=['subject_year_id','studentyear','user_id','result','GPA'];

    public function studentcriteria(){
        return $this->hasMany(StudentCriteria::class);
      }
      public function studentscore(){
          return $this->hasMany(StudentScore::class);
      }
      public function user(){
        return $this->belongsTo(User::class);
      }
      public function subjectyear(){
        return $this->belongsTo(SubjectYear::class);
      }

}
