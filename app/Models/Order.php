<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name', 
        'phone',
        'email',
        'city',
        'educational_qualification',
        'course_id'
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');;
    }
}
