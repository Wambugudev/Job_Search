<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    public $fillable=[
        'user_id','job_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
