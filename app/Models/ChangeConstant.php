<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeConstant extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'enrollnow',
        'title_section_content',
        'title_video1',
        'title_video2',
        'title_section_review',
        'title_form',
        'title_form_offer',
        'submit_form',
        'title_card'
    ];
}
