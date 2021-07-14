<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }

    public function cities(){
        return $this->hasMany('App\Models\City', 'country_id');
    }
}

