<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'description',
        'course_id',
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function subtitles(){
        return $this->hasMany(SubTitle::class,'title_id');
    }
}
