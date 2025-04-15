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
        '1st_paragraph_subtitle',
        '1st_paragraph_content',
        '2nd_paragraph_subtitle',
        '2nd_paragraph_content',
        'name',
        'link'
    ];
    
}
