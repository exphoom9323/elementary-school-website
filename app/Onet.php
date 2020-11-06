<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onet extends Model
{
    protected $fillable=['thai','eng','mathematics','science','allthai','alleng','allmathematics','allscience','subject_year_id'];
}
