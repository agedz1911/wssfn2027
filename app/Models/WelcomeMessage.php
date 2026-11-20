<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeMessage extends Model
{
    
    protected $fillable = [
        'name',
        'title',
        'image',
        'name2',
        'title2',
        'image2',
        'description',
        'is_active',
        'no_urut',
        'name3',
        'title3',
        'image3',
    ];
}
