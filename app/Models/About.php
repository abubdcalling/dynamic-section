<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'img1',
        'img2',
        'first_paragraph_subtitle',
        'first_paragraph_content',
        'second_paragraph_subtitle',
        'second_paragraph_content',
        'name',
        'link'
    ];
    
}
