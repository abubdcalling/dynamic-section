<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurComprehensiveService extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'title1', 'content1', 'img1',
        'title2', 'content2', 'img2',
        'title3', 'content3', 'img3',
        'title4', 'content4', 'img4',
        'title5', 'content5', 'img5',
    ];
}
