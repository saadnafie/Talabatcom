<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;

    public function getTypeAttribute($value) {
        return $this->{'type_' . App::getLocale()};
    }
}
