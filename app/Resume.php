<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'name','profession','about', 'image','email','phoneNo','birthday' ,'county','facebook','twitter','insta' ,
            'resumeContent','school','qualification','dateFromEd','dateToEd','employer','position','from',
            'to','skill1','skill2','skill3', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
