<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'review_video',
        'review_image',
        'course_id',
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
