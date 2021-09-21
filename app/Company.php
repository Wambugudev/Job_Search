<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
            'tagline',
            'category',
            'ceo',
            'image',
            'website',
            'email',
            'employees',
            'facebook',
            'twitter',
            'instagram',
            'about',
            'description',
            'phone',
            'user_id',
    ];
}
