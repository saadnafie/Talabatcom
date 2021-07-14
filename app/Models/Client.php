<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function getNameAttribute($value) {
        return $this->{'name_' . App::getLocale()};
    }

    public function user()
{

    return $this->belongsTo(User::class, 'user_id');

}
    public function city()
{

    return $this->belongsTo(City::class, 'city_id');

}

    public function nationality()
{

    return $this->belongsTo(Nationality::class, 'nationality_id');

}

}
