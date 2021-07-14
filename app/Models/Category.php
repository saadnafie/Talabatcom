<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }

    public function child()
{

    return $this->hasMany(Category::class, 'parent_id');

}

    public function parent()
{

    return $this->belongsTo(Category::class, 'parent_id');

}

}
