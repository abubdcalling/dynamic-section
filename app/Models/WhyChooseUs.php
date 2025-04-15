<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'left_side_main_title',
        'left_side_icon',
        'left_side_comments',
        'left_side_key_title',
        'left_side_content',
        'middle_side_main_title',
        'middle_side_icon',
        'middle_side_comments',
        'middle_side_key_title',
        'middle_side_content',
        'right_side_img',
        'right_side_icon',
    ];
    
}
