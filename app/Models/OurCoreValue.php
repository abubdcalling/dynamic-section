<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurCoreValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_title',
        'big_img_right_side',
        'side_img1',
        'side_img1_title',
        'side_img1_content',
        'side_img2',
        'side_img2_title',
        'side_img2_content',
        'side_img3',
        'side_img3_title',
        'side_img3_content',
        'side_img4',
        'side_img4_title',
        'side_img4_content',
    ];
}
