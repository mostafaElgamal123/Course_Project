<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTitle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'title_id',
    ];
    public function titles(){
        return $this->belongsTo(Title::class,'title_id');
    }
}
