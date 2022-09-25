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
        'phone2',
        'email',
        'educational_qualification',
        'city_id',
        'course_id'
    ];
    public function courses(){
        return $this->belongsTo(Course::class,'course_id');
    }
    public function cities(){
        return $this->belongsTo(City::class,'city_id');
    }
}
