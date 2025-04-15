<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Possible extends Model
{
    use HasFactory;

    protected $fillable = [
        'img',
        'title1',
        'title1_content',
        'title2',
        'title2_content',
    ];
}
