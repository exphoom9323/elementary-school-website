<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'studentcode', 'idcard', 'titlename', 'firstname', 'lastname', 'password' , 'studentyear', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];
    public function isA(){
      return $this->type=='admin';
    }
    public function isT(){
      return $this->type=='teacher';
    }
    public function isS(){
      return $this->type=='student';
    }
    public function studentyear(){
        return $this->hasMany(StudentYear::class);
    }

    public function homeroom(){
      return $this->belongsToMany(Tclass::class);
    }
    public function hasUser($userId){
      return in_array($userId,$this->Tclass->pluck('id')->toArray());
    }



}
