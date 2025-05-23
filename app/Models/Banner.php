<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'logo',
        'button_text',
        'button_link',
        'back_img'
    ];
}
