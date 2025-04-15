<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title_from_1st_section',
        'icon_from_1st_section',
        'content_from_1st_section',
        'key_title_from_1st_section',
        'sub_content_from_1st_section',
    
        'main_title_from_2nd_section',
        'icon_from_2nd_section',
        'content_from_2nd_section',
        'key_title_from_2nd_section',
        'sub_content_from_2nd_section',
    
        'main_title_from_3rd_section',
        'icon_from_3rd_section',
        'content_from_3rd_section',
        'key_title_from_3rd_section',
        'sub_content_from_3rd_section',
    
        'main_title_from_4th_section',
        'icon_from_4th_section',
        'content_from_4th_section',
        'key_title_from_4th_section',
        'sub_content_from_4th_section',
    
        'main_title_from_5th_section',
        'icon_from_5th_section',
        'content_from_5th_section',
        'key_title_from_5th_section',
        'sub_content_from_5th_section',
    ];
    
}
