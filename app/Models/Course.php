<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'slug',
        'description',
        'coursefeatures',
        'image',
        'rating',
        'lectures',
        'price',
        'offer',
        'explanation_video',
        'review_video',
        'category_id',
        'status'
    ];
    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function titles(){
        return $this->hasMany(Title::class,'course_id');
    }
    public function orders(){
        return $this->hasMany(Order::class,'course_id');
    }
    public function faqs(){
        return $this->hasMany(Faq::class,'course_id');
    }
    public function reviews(){
        return $this->hasMany(Review::class,'course_id');
    }
    public function cards(){
        return $this->hasMany(Card::class,'course_id');
    }
}
