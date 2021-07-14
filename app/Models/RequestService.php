<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestService extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');

    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');

    }

    public function job_type(){
        return $this->belongsTo(JobType::class, 'job_type_id');

    }
    public function stat(){
        return $this->belongsTo(RequestStatus::class, 'status');

    }
}
