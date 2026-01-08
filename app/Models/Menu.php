<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;
    protected $fillable = [
        'title',
        'sub_title',
        'description',
    ];
}
