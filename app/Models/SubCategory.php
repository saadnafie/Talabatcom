<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function parent()
{
    return $this->belongsTo(Category::class, 'parent_id');
}

}
