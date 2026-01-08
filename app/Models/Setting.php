<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
     use SoftDeletes;
    protected $table = 'settings';  
    protected $fillable = [
        'title', 'email', 'phone', 'facebook', 'telegram',
        'instagram', 'youtube', 'logo', 'description'
    ];
}
