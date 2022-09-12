<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'question',
        'slug',
        'answer',
        'course_id',
        'status'
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');;
    }
}
