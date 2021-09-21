<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable =[
        'user_id', 'company_id', 'title', 'type', 'description', 'location', 'image', 'requirements'
    ];

    public function applications()
    {
        return $this->belongsToMany(Application::Class);
    }

    public function users()
    {
        return $this->belongsToMany(User::Class);
    }
}
