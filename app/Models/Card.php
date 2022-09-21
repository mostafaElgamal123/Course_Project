<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'url',
        'image',
        'rating',
        'course_id'
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }
}
