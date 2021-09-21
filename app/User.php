<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'account'
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // check if user
    public function isCandidate(){
        return $this->account === 'candidate';
    }
    public function isAdmin(){
        return $this->account === 'admin';
    }
    public function isEmployer(){
        return $this->account === 'employer';
    }


   public function resume()
   {
       return $this->hasOne('App\Resume');
   }

   public function applications()
   {
       return $this->hasMany('App\Applicaton');
   }

   public function jobs()
   {
       return $this->belongsToMany(Job::Class);
   }
}
