<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['user_id','birthday','race','nationality','cult','disease','HomeID','moo','village','road','parish','district',
    'province','zipcode','father','father_tel','father_job','mother','mother_tel','mother_job','guardian','guardian_tel','guardian_job'];
}
