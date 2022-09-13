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
        'answer',
        'course_id',
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');;
    }
}
