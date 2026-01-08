<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'menu_id',
        'title',
        'sub_title',
        'slug',
        'content',
        'description',
        'image',
    ];
    function menu () {
      return $this->belongsTo(Menu::class, 'menu_id');

    }
}
